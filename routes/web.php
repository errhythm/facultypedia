<?php

use App\Models\User;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('listings', [
        'heading' => 'Faculty List',
        'listings' => User::where('role', 'faculty')->get()
    ]);
});

// user profile
Route::get('/profile/{user}', function (User $user) {
    return view('profile', [
        'heading' => 'Profile',
        'user' => $user
    ]);
});

// show Register/Sign Up form
Route::get('/register', function () {
    return view('register');
});
