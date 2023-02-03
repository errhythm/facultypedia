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

Route::get('/faculties/{page?}', function ($page = 1) {
    $perPage = 8;
    $total = User::where('role', 'faculty')->count();
    $pageCount = ceil($total / $perPage);
    $listings = User::where('role', 'faculty')->paginate($perPage, ['*'], 'page', $page);
    return view('faculties', [
        'total' => $total,
        'page' => $page,
        'page_count' => $pageCount,
        'listings' => $listings,
        'facultyCourses' => \App\Models\Faculties::all(),
    ]);
});

// user profile
Route::get('/profile/{user}', function (User $user) {
    return view('profile', [
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
