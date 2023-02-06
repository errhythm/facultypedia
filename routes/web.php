<?php

use App\Http\Controllers\FacultyController;
use App\Http\Controllers\SearchController;
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

Route::get('/faculties/{page?}', [FacultyController::class, 'index']);

// user profile
Route::get('/profile/{user}', function (User $user) {
    return view('profile.show', [
        'heading' => 'Profile',
        'user' => $user,
    ]);
});

// show all courses
Route::get('/courses', function () {
    return view('courses', [
        'heading' => 'Courses',
        'courses' => \App\Models\Courses::all(),
    ]);
});

// show Register/Sign Up form
Route::get('/register', function () {
    return view('register');
});
