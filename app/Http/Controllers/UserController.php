<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Reviews;
use App\Mail\MyTestMail;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\ConsultationSlots;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

class UserController extends Controller
{
    // show user profile
    public function show(User $user)
    {
        // get consultation slots model for the user
        $consultationSlots = ConsultationSlots::where('faculty_id', $user->id)->get();
        return view('user.show', [
            'heading' => 'Profile',
            'user' => $user,
            'consultationSlots' => $consultationSlots,
        ]);
    }

    // profile redirect
    public function profileRedirect()
    {
        if (auth()->check()) {
            // check for any messages and keep it on the redirect page as well
            if (session()->has('message')) {
                return redirect('/profile/' . auth()->user()->id)->with('message', session()->get('message'));
            } else {
                return redirect('/profile/' . auth()->user()->id);
            }
        } else {
            return redirect('/login')->with('message', 'Please login to view your profile.');
        }
    }

    // show user profile registration form
    public function create()
    {
        return view('user.create', [
            'heading' => 'Register to FacultyPedia',
        ]);
    }

    // send user email with 4 digit OTP
    public function sendOTP(Request $request)
    {
        // get the user logged in by auth middleware
        $user = Auth::user();

        // update user updated_at to current time
        $user->updated_at = now();
        /** @var \App\Models\User $user **/
        $user->save();


        // get first 4 digits from the md5 of created_at to make the OTP, make it capital
        $otp = strtoupper(substr(md5($user->updated_at), 0, 4));

        // send email
        $details = [
            'title' => 'Verify your email',
            'body' => 'Your email is ' . $user->email . '. Your OTP is ' . $otp . '.',
        ];

        Mail::send('emails.myTestMail', array('user' => $user, 'details' => $details), function ($message) use ($user) {
            $message->to($user->email, $user->name)->subject('Your OTP for FacultyPedia');
        });
    }
    // verify user email with 4 digit OTP
    public function verifyOTP(Request $request)
    {
        $otp_received = $request->otp1 . $request->otp2 . $request->otp3 . $request->otp4;
        $user = Auth::user();

        // get first 4 digits from the md5 of created_at to make the OTP, make it capital
        $otp = strtoupper(substr(md5($user->updated_at), 0, 4));

        // check the received OTP with $otp if it matches, then verify the user by inputting time in email_verified_at
        if ($otp_received == $otp) {
            $user->email_verified_at = now();
            /** @var \App\Models\User $user **/
            $user->save();
            return redirect('/onboarding')->with('message', 'Email verified successfully. Please fill in the details below to complete your registration.');
        } else {
            return redirect('/verify')->with('message', 'Invalid OTP. Actual OTP is ' . $otp . '. Please try again.');
        }
    }

    // verify user email page
    public function verifyPage()
    {
        return view('user.verification', [
            'heading' => 'Verify Email',
        ]);
    }

    // user onboarding page
    public function onboardingPage()
    {
        $user = Auth::user();
        return view('user.onboarding', [
            'heading' => 'User Onboarding',
            'user' => $user,
        ]);
    }

    // store user onboarding data
    public function onboardingStore(Request $request)
    {
        $user = Auth::user();
        $user->university_id = $request->university_id;
        $user->department = $request->department;
        $user->updated_at = now();
        /** @var \App\Models\User $user **/
        $user->save();
        return redirect('/profile/' . $user->id);
    }

    // forget password page
    public function forgetPassword()
    {
        return view('user.forgetPassword', [
            'heading' => 'Forget Password',
        ]);
    }

    // send otp for forget password
    public function sendOTPForgetPassword(Request $request)
    {
        // get user from form email
        $user = User::where('email', $request->email)->first();

        // if user is not found, return back with error
        if (!$user) {
            return back()->withErrors([
                'message' => 'The provided email is not registered.',
            ]);
        }

        // update user updated_at to current time
        $user->updated_at = now();
        /** @var \App\Models\User $user **/
        $user->save();

        // get first 4 digits from the md5 of created_at to make the OTP, make it capital
        $otp = strtoupper(substr(md5($user->updated_at), 0, 4));

        // send email
        $details = [
            'title' => 'Verify your email',
            'body' => 'Your email is ' . $user->email . '. Your OTP is ' . $otp . '.',
        ];

        Mail::send('emails.myTestMail', array('user' => $user, 'details' => $details), function ($message) use ($user) {
            $message->to($user->email, $user->name)->subject('Your OTP for FacultyPedia');
        });

        // send the email by request to /recover/2 page with email
        return redirect('/recover/2')->with('email', $user->email);
    }

    // verify otp for forget password
    public function checkOTPForgetPassword(Request $request)
    {
        $otp_received = $request->otp1 . $request->otp2 . $request->otp3 . $request->otp4;
        $user = User::where('email', $request->email)->first();

        // get first 4 digits from the md5 of created_at to make the OTP, make it capital
        $otp = strtoupper(substr(md5($user->updated_at), 0, 4));

        // check the received OTP with $otp if it matches, then verify the user by inputting time in email_verified_at
        if ($otp_received == $otp) {
            $user->email_verified_at = now();
            $user->save();
            return redirect('/recover/3')->with('email', $user->email);
        } else {
            return redirect('/recover/2')->with('message', 'Invalid OTP. Actual OTP is ' . $otp . '. Please try again.');
        }
    }

    // change password page for recover
    public function changePasswordForgetPassword()
    {
        return view('user.changePasswordForgetPassword', [
            'heading' => 'Change Password',
        ]);
    }

    // change password for recover
    public function changePasswordForgetPasswordStore(Request $request)
    {
        // validate data
        $data = request()->validate([
            'password' => 'required|min:8|max:255',
        ]);

        $user = User::where('email', $request->email)->first();
        // get password from request and bcrypt
        $user->password = bcrypt($data['password']);
        $user->save();

        return redirect('/login');
    }


    // verifyOTPForgetPassword page
    public function verifyOTPForgetPassword()
    {
        return view('user.verifyOTPForgetPassword', [
            'heading' => 'Verify OTP',
        ]);
    }



    // create new user
    public function store()
    {
        // validate data
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email|ends_with:@bracu.ac.bd,@g.bracu.ac.bd',
            'password' => 'required|confirmed|min:8|max:255',
        ]);

        // if user is found in that same email check if the email is verified or not
        $user = User::where('email', $data['email'])->first();
        if ($user) {
            if ($user->email_verified_at) {
                return back()->withErrors([
                    'message' => 'The provided email is already registered.',
                ]);
            } else {
                // delete user reviews given by that user from reviews table where user_id is user id of that user
                Reviews::where('user_id', $user->id)->delete();
                $user->delete();
            }
        }

        $data['password'] = bcrypt($data['password']);

        // check email domain for role
        if (str_ends_with($data['email'], '@bracu.ac.bd')) {
            $data['role'] = 'faculty';
        } else {
            $data['role'] = 'student';
        }

        $user = User::create($data);
        auth()->login($user);
        $this->sendOTP(request());

        return redirect('/verify')->with('message', 'OTP sent to your email');
    }



    // show Login form
    public function login()
    {
        return view('user.login', [
            'heading' => 'Login to FacultyPedia',
        ]);
    }

    // Log User In
    public function loginUser()
    {
        // validate data
        $data = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($data)) {
            if (auth()->user()->email_verified_at) {
                return redirect('/profile/' . auth()->user()->id);
            } else {
                return redirect('/verify')->with('message', 'Please verify your email first');
            }
        }

        // if the user is not found, return back with error
        return back()->with([
            'message' => 'The provided credentials do not match our records.',
        ]);
    }

    // Log User Out
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Logged out successfully');
    }

    // delete own review
    public function deleteReview($id)
    {
        $review = Reviews::find($id);
        if ($review->user_id != auth()->user()->id) {
            return redirect('/profile/' . auth()->user()->id)->with('message', 'You are not authorized to delete this review');
        }
        $review->isDeleted = 1;
        $review->save();
        return redirect(route('dashboard'))->with('message', 'Review deleted successfully');
    }

    // show all reviews
    public function showAllReviews()
    {

        $user = auth()->user();
        $role = $user->role;

        // if the role is student
        if ($role == 'student') {
            $reviews = Reviews::where('isDeleted', 0)
                ->where('user_id', auth()->user()->id)
                ->orderBy('created_at', 'desc')->paginate(10);
        } elseif ($role == 'faculty') {
            $reviews = Reviews::where('isDeleted', 0)
                ->where('faculty_id', auth()->user()->id)
                ->where('isApproved', 1)
                ->orderBy('created_at', 'desc')->paginate(10);
        }


        return view('dashboard.student.showAllReviews', [
            'heading' => 'All Reviews',
            'reviews' => $reviews,
            'role' => $role,
        ]);
    }

    // change settings
    public function settings()
    {
        $user = Auth::user();
        return view('dashboard.changeSettings', [
            'heading' => 'Change Settings',
            'user' => $user,
        ]);
    }

    /**
     * Store the user's settings.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function settingsStore(Request $request)
    {
        try {
            $user = Auth::user();
            $data = $request->validate([
                'name' => 'required',
                'university_id' => 'required',
            ]);

            $user->name = $data['name'];
            $user->university_id = $data['university_id'];
            /** @var \App\Models\User $user **/
            $user->save();

            return back()->with('message', 'Settings updated successfully');
        } catch (\Exception $e) {
            return back()->with('message', 'Something went wrong: ' . $e->getMessage());
        }
    }

    /**
     * Changes the user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changePassword(Request $request)
    {
        try {
            $data = $request->validate([
                'current_password' => 'required',
                'password' => 'required|min:8|max:255|confirmed',
            ]);

            $user = Auth::user();

            if (!$user) {
                return back()->with('message', 'User not found');
            }

            $current_password = $data['current_password'];
            $new_password = bcrypt($data['password']);

            if (!Hash::check($current_password, $user->password)) {
                return back()->with('message', 'Current password does not match');
            }

            $user->password = $new_password;
            /** @var \App\Models\User $user **/
            $user->save();

            return back()->with('message', 'Password changed successfully');
        } catch (\Exception $e) {
            return back()->with('message', 'Something went wrong: ' . $e->getMessage());
        }
    }
}
