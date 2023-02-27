<?php

use App\Models\User;
use App\Models\Courses;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\AdminController;

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

// home page
Route::get('/', function () {
    return view('home', [
        'heading' => 'Find your Faculty!',
        'subheading' => 'Search for your faculty, book a consultation, review them.',
    ]);
});

//  faculty index
Route::get('/faculties/{page?}', [FacultyController::class, 'index']);

// user profile
Route::get('/profile/{user}', [UserController::class, 'show']);

// show all courses
Route::get('/courses', function () {
    return view('courses', [
        'heading' => 'Courses',
        'courses' => \App\Models\Courses::all(),
    ]);
});

// show Register/Sign Up form
Route::get('/register', [UserController::class, 'create']);

// show Login form
Route::get('/login', [UserController::class, 'login']);

// create new user
Route::post('/registeruser', [UserController::class, 'store']);

// Log User In
Route::post('/loginuser', [UserController::class, 'loginUser']);

// Log User Out
Route::get('/logout', [UserController::class, 'logout']);

// create review in ReviewsController
Route::post('/createreview', [ReviewsController::class, 'store']);

// create a dashboard for admin, faculty and students
Route::get('/dashboard', [AdminController::class, 'index']);
