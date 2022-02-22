<?php

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
    return view('admin/dashboard');
});

// ----------------category--------------

Route::group(['prefix' => 'category'], function () {
    Route::get('/', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin.category.index');
    Route::get('/create', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/store', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::post('/update/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin.category.update');
    Route::post('/updateStatus', [App\Http\Controllers\Admin\CategoryController::class, 'updateStatus'])->name('admin.category.updateStatus');
    Route::get('/delete/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('admin.category.delete');
});

//----------------puja-------------- 

Route::group(['prefix' => 'puja'], function () {
    Route::get('/', [App\Http\Controllers\Admin\PujaController::class, 'index'])->name('admin.puja.index');
    Route::get('/create', [App\Http\Controllers\Admin\PujaController::class, 'create'])->name('admin.puja.create');
    Route::post('/store', [App\Http\Controllers\Admin\PujaController::class, 'store'])->name('admin.puja.store');
    Route::get('/edit/{id}', [App\Http\Controllers\Admin\PujaController::class, 'edit'])->name('admin.puja.edit');
    Route::post('/update/{id}', [App\Http\Controllers\Admin\PujaController::class, 'update'])->name('admin.puja.update');
    Route::post('/updateStatus', [App\Http\Controllers\Admin\PujaController::class, 'updateStatus'])->name('admin.puja.updateStatus');
    Route::get('/delete/{id}', [App\Http\Controllers\Admin\PujaController::class, 'destroy'])->name('admin.puja.delete');
});

// ------------------puja-service-----------------

Route::group(['prefix' => 'puja-service'], function () {
    Route::get('/', [App\Http\Controllers\Admin\PujaServiceController::class, 'index'])->name('admin.puja-service.index');
    Route::get('/create', [App\Http\Controllers\Admin\PujaServiceController::class, 'create'])->name('admin.puja-service.create');
    Route::post('/store', [App\Http\Controllers\Admin\PujaServiceController::class, 'store'])->name('admin.puja-service.store');
    Route::get('/edit/{id}', [App\Http\Controllers\Admin\PujaServiceController::class, 'edit'])->name('admin.puja-service.edit');
    Route::post('/update/{id}', [App\Http\Controllers\Admin\PujaServiceController::class, 'update'])->name('admin.puja-service.update');
    Route::post('/updateStatus', [App\Http\Controllers\Admin\PujaServiceController::class, 'updateStatus'])->name('admin.puja-service.updateStatus');
    Route::get('/delete/{id}', [App\Http\Controllers\Admin\PujaServiceController::class, 'destroy'])->name('admin.puja-service.delete');
});

// -------------------banner-----------------

Route::group(['prefix' => 'banner'], function () {
    Route::get('/', [App\Http\Controllers\Admin\BannerController::class, 'index'])->name('admin.banner.index');
    Route::get('/create', [App\Http\Controllers\Admin\BannerController::class, 'create'])->name('admin.banner.create');
    Route::post('/store', [App\Http\Controllers\Admin\BannerController::class, 'store'])->name('admin.banner.store');
    Route::get('/edit/{id}', [App\Http\Controllers\Admin\BannerController::class, 'edit'])->name('admin.banner.edit');
    Route::post('/update/{id}', [App\Http\Controllers\Admin\BannerController::class, 'update'])->name('admin.banner.update');
    Route::post('/updateStatus', [App\Http\Controllers\Admin\BannerController::class, 'updateStatus'])->name('admin.banner.updateStatus');
    Route::get('/delete/{id}', [App\Http\Controllers\Admin\BannerController::class, 'destroy'])->name('admin.banner.delete');
});

// --------------------content------------------

Route::group(['prefix' => 'content'], function () {
    Route::get('/', [App\Http\Controllers\Admin\ContentController::class, 'index'])->name('admin.content.index');
    Route::get('/create', [App\Http\Controllers\Admin\ContentController::class, 'create'])->name('admin.content.create');
    Route::post('/store', [App\Http\Controllers\Admin\ContentController::class, 'store'])->name('admin.content.store');
    Route::get('/edit/{id}', [App\Http\Controllers\Admin\ContentController::class, 'edit'])->name('admin.content.edit');
    Route::post('/update/{id}', [App\Http\Controllers\Admin\ContentController::class, 'update'])->name('admin.content.update');
    Route::post('/updateStatus', [App\Http\Controllers\Admin\ContentController::class, 'updateStatus'])->name('admin.content.updateStatus');
    Route::get('/delete/{id}', [App\Http\Controllers\Admin\ContentController::class, 'destroy'])->name('admin.content.delete');
});

// ------------------customer-------------

Route::group(['prefix' => 'customer'], function () {
    Route::get('/', [App\Http\Controllers\Admin\CustomerController::class, 'index'])->name('admin.customer.index');
    Route::get('/create', [App\Http\Controllers\Admin\CustomerController::class, 'create'])->name('admin.customer.create');
    Route::post('/store', [App\Http\Controllers\Admin\CustomerController::class, 'store'])->name('admin.customer.store');
    Route::get('/edit/{id}', [App\Http\Controllers\Admin\CustomerController::class, 'edit'])->name('admin.customer.edit');
    Route::post('/update/{id}', [App\Http\Controllers\Admin\CustomerController::class, 'update'])->name('admin.customer.update');
    Route::post('/updateStatus', [App\Http\Controllers\Admin\CustomerController::class, 'updateStatus'])->name('admin.customer.updateStatus');
    Route::get('/delete/{id}', [App\Http\Controllers\Admin\CustomerController::class, 'destroy'])->name('admin.customer.delete');
});

// -------------------Booking---------

Route::group(['prefix' => 'booking'], function () {
    Route::get('/', [App\Http\Controllers\Admin\BookingController::class, 'index'])->name('admin.booking.index');
    Route::get('/details/{id}', [App\Http\Controllers\Admin\BookingController::class, 'show'])->name('admin.booking.details');

    // Route::get('/create', [App\Http\Controllers\Admin\CustomerController::class, 'create'])->name('admin.customer.create');
    // Route::post('/store', [App\Http\Controllers\Admin\CustomerController::class, 'store'])->name('admin.customer.store');
    // Route::get('/edit/{id}', [App\Http\Controllers\Admin\CustomerController::class, 'edit'])->name('admin.customer.edit');
    // Route::post('/update/{id}', [App\Http\Controllers\Admin\CustomerController::class, 'update'])->name('admin.customer.update');
    // Route::post('/updateStatus', [App\Http\Controllers\Admin\CustomerController::class, 'updateStatus'])->name('admin.customer.updateStatus');
    // Route::get('/delete/{id}', [App\Http\Controllers\Admin\CustomerController::class, 'destroy'])->name('admin.customer.delete');


});