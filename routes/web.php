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
use App\Http\Controllers\ConsultationController;

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

// api to get the available consultation slots of a faculty of that date, the date is in the format of YYYY-MM-DD
Route::get('/fpapi/getslot/{faculty_id?}&{date?}', [ConsultationController::class, 'fp_slot_available_api']);

//  faculty index
Route::get('/faculties/{page?}', [FacultyController::class, 'index'])->name('faculties');

// user profile
Route::get('/profile/{user}', [UserController::class, 'show'])->name('profile');

// Profile Redirect
Route::get('/profile', [UserController::class, 'profileRedirect'])->name('profileRedirect');

// show all courses
Route::get('/courses', function () {
    return view('courses', [
        'heading' => 'Courses',
        'courses' => \App\Models\Courses::all(),
    ]);
});

// show Register/Sign Up form
Route::get('/register', [UserController::class, 'create'])->name('register');

// show Login form
Route::get('/login', [UserController::class, 'login'])->name('login');

// create new user
Route::post('/registeruser', [UserController::class, 'store']);

// verify user email
Route::post('/verifyOTP', [UserController::class, 'verifyOTP']);

// resend OTP
Route::get('/resendOTP', [UserController::class, 'sendOTP']);

// verify user email page
Route::get('/verify', [UserController::class, 'verifyPage']);

// user onboarding page
Route::get('/onboarding', [UserController::class, 'onboardingPage']);

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

// user onboarding page
Route::get('/onboarding', [UserController::class, 'onboardingPage'])->name('onboarding');

// user onboarding save
Route::post('/onboarding-complete', [UserController::class, 'onboardingStore'])->name('onboardingSave');

// Log User Out
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

// create review in ReviewsController
Route::post('/createreview', [ReviewsController::class, 'store']);

// create consultation in ConsultationController
Route::post('/createconsultation', [ConsultationController::class, 'createConsultation'])->name('NewConsultation');

// create a route group named dashboard
Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    // show admin dashboard
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    // create a route subgroup where the user role must be admin
    Route::group(['middleware' => 'admin'], function () {
        // show all reviews
        Route::get('/reviews', [AdminController::class, 'reviews'])->name('reviews');

        // show pending reviews
        Route::get('/reviews/pending/{page?}', [AdminController::class, 'pendingReviews'])->name('pendingReviews');

        // approve pending reviews
        Route::post('/reviews/approve/{id}', [AdminController::class, 'approveReview']);

        // delete pending reviews
        Route::post('/reviews/delete/{id}', [AdminController::class, 'deleteReview']);

        // show all users
        Route::get('/users', [AdminController::class, 'users'])->name('allUsers');

        // show all faculties
        Route::get('/faculties', [AdminController::class, 'faculties'])->name('allFaculties');

        // show all students
        Route::get('/students', [AdminController::class, 'students'])->name('allStudents');

        // edit a user
        Route::get('/users/edit/{id}', [AdminController::class, 'editUser'])->name('editUser');
        Route::post('/users/edit/{id}', [AdminController::class, 'editUserStore'])->name('editUserStore');

        // delete a user
        Route::post('/users/delete/{id}', [AdminController::class, 'deleteUser'])->name('deleteUser');

        // show all courses
        Route::get('/courses', [AdminController::class, 'courses'])->name('allCourses');

        // add a course POST
        Route::post('/courses/add', [AdminController::class, 'addCourse'])->name('addCourse');

        // edit a course POST
        Route::post('/courses/edit/{id}', [AdminController::class, 'editCourse'])->name('editCourse');

        // delete a course POST
        Route::post('/courses/delete/{id}', [AdminController::class, 'deleteCourse'])->name('deleteCourse');
    });

    // create a route subgroup where the user role must be student
    Route::group(['prefix' => 'student', 'middleware' => 'student'], function () {
        // delete review
        Route::post('/reviews/delete/{id}', [UserController::class, 'deleteReview'])->name('studentDeleteReview');

        // show all reviews
        Route::get('/reviews', [UserController::class, 'showAllReviews'])->name('studentReviews');
    });

    // create a route subgroup where the user role must be faculty
    Route::group(['prefix' => 'faculty', 'middleware' => 'faculty'], function () {
        // show all reviews
        Route::get('/reviews', [UserController::class, 'showAllReviews'])->name('facultyReviews');

        // create consultation slot page
        Route::get('/consultation/slot', [ConsultationController::class, 'create'])->name('createConsultation');

        // add consultation slot
        Route::post('/consultation/slot', [ConsultationController::class, 'store'])->name('addConsultation');

        // show all consultations
        Route::get('/consultation', [ConsultationController::class, 'index'])->name('showAllConsultations');

        // pending consultations
        Route::get('/consultation/pending', [ConsultationController::class, 'pending'])->name('pendingConsultations');

        // approved consultation
        Route::get('/consultation/approved', [ConsultationController::class, 'approved'])->name('approvedConsultations');

        // reject consultation
        Route::post('/consultation/reject/{id}', [ConsultationController::class, 'reject'])->name('rejectConsultation');

        // approve consultation
        Route::post('/consultation/approve/{id}', [ConsultationController::class, 'approve'])->name('approveConsultation');

        // view consultation details
        Route::get('/consultation/{id}', [ConsultationController::class, 'show'])->name('showConsultation');
    });
});
