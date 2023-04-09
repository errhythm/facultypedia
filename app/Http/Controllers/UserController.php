<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Mail\MyTestMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    // show user profile
    public function show(User $user)
    {
        return view('user.show', [
            'heading' => 'Profile',
            'user' => $user,
        ]);
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

        return redirect('/verify')->with('message', 'OTP sent to your email');
    }
    // verify user email with 4 digit OTP
    public function verifyOTP(Request $request)
    {
        $otp_received = $request->otp1 . $request->otp2 . $request->otp3 . $request->otp4;
        $user = User::where('email', $request->email)->first();

        // get first 4 digits from the md5 of created_at to make the OTP, make it capital
        $otp = strtoupper(substr(md5($user->updated_at), 0, 4));

        // check the received OTP with $otp if it matches, then verify the user by inputting time in email_verified_at
        if ($otp_received == $otp) {
            $user->email_verified_at = now();
            $user->save();
            return redirect('/profile/' . $user->id);
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



    // create new user
    public function store()
    {
        // validate data
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email|ends_with:@bracu.ac.bd,@g.bracu.ac.bd',
            'password' => 'required|confirmed|min:8|max:255',
        ]);

        $data['password'] = bcrypt($data['password']);

        // check email domain for role
        if (str_ends_with($data['email'], '@bracu.ac.bd')) {
            $data['role'] = 'faculty';
        } else {
            $data['role'] = 'student';
        }

        $user = User::create($data);
        $this->sendOTP(request());
        auth()->login($user);

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
            'email' => 'required|email|ends_with:@bracu.ac.bd,@g.bracu.ac.bd',
            'password' => 'required',
        ]);

        if (auth()->attempt($data)) {
            return redirect('/profile/' . auth()->user()->id);
        }

        return back()->withErrors([
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
}
