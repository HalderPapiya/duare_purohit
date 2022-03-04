<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    // return $request->user();
    // Route::post('storeBlog', 'Api\BlogController@store');
    Route::post('/user/register', [App\Http\Controllers\Api\UserController::class, 'registerApi']);
});

Route::post('/user/register', [App\Http\Controllers\Api\UserController::class, 'register']);
Route::post('/user/login', [App\Http\Controllers\Api\UserController::class, 'login']);
Route::post('/user/social/login', [App\Http\Controllers\Api\UserController::class, 'socialLogin']);
Route::get('/user/details/{id}', [App\Http\Controllers\Api\UserController::class, 'show']);
Route::post('/user/update', [App\Http\Controllers\Api\UserController::class, 'update']);
Route::post('/user/change-password', [App\Http\Controllers\Api\UserController::class, 'changePassword']);

// --------------category-----------

Route::get('/category/list', [App\Http\Controllers\Api\CategoryController::class, 'index']);
Route::get('/category/details/{id}', [App\Http\Controllers\Api\CategoryController::class, 'show']);

// --------------puja-----------
Route::get('/puja/list', [App\Http\Controllers\Api\PujaController::class, 'index']);
Route::get('/puja/list/{categoryId}', [App\Http\Controllers\Api\PujaController::class, 'categoryWisePujaList']);
Route::get('/puja/show', [App\Http\Controllers\Api\PujaController::class, 'allCategoryWiseAllPujaList']);
Route::get('/puja/service/{id}', [App\Http\Controllers\Api\PujaController::class, 'show']);


Route::post('/booking', [App\Http\Controllers\Api\BookingController::class, 'booking']);
Route::get('/booking/list', [App\Http\Controllers\Api\BookingController::class, 'index']);
Route::get('/booking/list/{userId}', [App\Http\Controllers\Api\BookingController::class, 'userWiseBookingList']);
Route::get('/booking/{bookingId}/details/{userId}', [App\Http\Controllers\Api\BookingController::class, 'show']);

// ------------Banner-----------

Route::get('/banner/list', [App\Http\Controllers\Api\BannerController::class, 'index']);


// --------------Service-------------

Route::get('/service/list', [App\Http\Controllers\Api\ServiceController::class, 'index']);