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

// Profile Redirect
Route::get('/profile', [UserController::class, 'profileRedirect']);

// show all courses
Route::get('/courses', function () {
    return view('courses', [
        'heading' => 'Courses',
        'courses' => \App\Models\Courses::all(),
    ]);
});

// create route group for login register
Route::group(['middleware' => 'guest'], function () {

    // show Register/Sign Up form
    Route::get('/register', [UserController::class, 'create'])->name('register');

    // show Login form
    Route::get('/login', [UserController::class, 'login'])->name('login');

    // create new user
    Route::post('/registeruser', [UserController::class, 'store']);

    // verify user email
    Route::post('/verifyOTP', [UserController::class, 'verifyOTP']);

    // resend OTP
    Route::get(
        '/resendOTP',
        [UserController::class, 'sendOTP']
    );

    // verify user email page
    Route::get('/verify', [UserController::class, 'verifyPage']);

    // forgot password page
    Route::get('/recover', [UserController::class, 'forgetPassword']);

    // forgot password page OTP
    Route::post('/recover/1', [UserController::class, 'sendOTPForgetPassword']);

    // verify otp for forgot password
    Route::get('/recover/2', [UserController::class, 'verifyOTPForgetPassword']);

    // check if otp is correct
    Route::post('/recover/2', [UserController::class, 'checkOTPForgetPassword']);

    // set recover password page
    Route::get('/recover/3', [UserController::class, 'changePasswordForgetPassword']);

    // set recover password
    Route::post('/recover/4', [UserController::class, 'changePasswordForgetPasswordStore']);

    // Log User In
    Route::post('/loginuser', [UserController::class, 'loginUser']);
});


// Log User Out
Route::get('/logout', [UserController::class, 'logout']);

// create review in ReviewsController
Route::post('/createreview', [ReviewsController::class, 'store']);

// create a route group named dashboard
Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {

    // show admin dashboard
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    // show all reviews
    Route::get('/reviews', [AdminController::class, 'reviews'])->name('reviews');

    // show pending reviews
    Route::get('/reviews/pending/{page?}', [AdminController::class, 'pendingReviews'])->name('pendingReviews');

    // approve pending reviews
    Route::post('/reviews/approve/{id}', [AdminController::class, 'approveReview']);

    // delete pending reviews
    Route::post('/reviews/delete/{id}', [AdminController::class, 'deleteReview']);
});
