<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\ConsultationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// api to get reviews of a faculty with pagination of 5
Route::get('/reviews/{user}', [ReviewsController::class, 'show_faculty_api']);

// api to get slot availability of a faculty on a particular date
Route::get('/slot_availability/{user}/{date}', [ConsultationController::class, 'show_slot_availability_api'])->name('slot_availability');
