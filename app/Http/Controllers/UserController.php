<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

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

        auth()->login($user);

        return redirect('/profile/' . $user->id);
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
