<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use Illuminate\Support\Facades\Auth;

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

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['guest:admin'])->group(function () {
        Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
        Route::post('/login', [LoginController::class, 'login'])->name('login');
    });
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::get('dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

        // ----------------category--------------

        Route::group(['prefix' => 'category'], function () {
            Route::get('/', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('category.index');
            Route::get('/create', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('category.create');
            Route::post('/store', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('category.store');
            Route::get('/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('category.edit');
            Route::post('/update/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('category.update');
            Route::post('/updateStatus', [App\Http\Controllers\Admin\CategoryController::class, 'updateStatus'])->name('category.updateStatus');
            Route::get('/delete/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('category.delete');
        });

        //----------------puja-------------- 

        Route::group(['prefix' => 'puja'], function () {
            Route::get('/', [App\Http\Controllers\Admin\PujaController::class, 'index'])->name('puja.index');
            Route::get('/create', [App\Http\Controllers\Admin\PujaController::class, 'create'])->name('puja.create');
            Route::post('/store', [App\Http\Controllers\Admin\PujaController::class, 'store'])->name('puja.store');
            Route::get('/edit/{id}', [App\Http\Controllers\Admin\PujaController::class, 'edit'])->name('puja.edit');
            Route::post('/update/{id}', [App\Http\Controllers\Admin\PujaController::class, 'update'])->name('puja.update');
            Route::post('/updateStatus', [App\Http\Controllers\Admin\PujaController::class, 'updateStatus'])->name('puja.updateStatus');
            Route::get('/delete/{id}', [App\Http\Controllers\Admin\PujaController::class, 'destroy'])->name('puja.delete');
        });

        // ------------------puja-service-----------------

        Route::group(['prefix' => 'puja-service'], function () {
            Route::get('/', [App\Http\Controllers\Admin\PujaServiceController::class, 'index'])->name('puja-service.index');
            Route::get('/create', [App\Http\Controllers\Admin\PujaServiceController::class, 'create'])->name('puja-service.create');
            Route::post('/store', [App\Http\Controllers\Admin\PujaServiceController::class, 'store'])->name('puja-service.store');
            Route::get('/edit/{id}', [App\Http\Controllers\Admin\PujaServiceController::class, 'edit'])->name('puja-service.edit');
            Route::post('/update/{id}', [App\Http\Controllers\Admin\PujaServiceController::class, 'update'])->name('puja-service.update');
            Route::post('/updateStatus', [App\Http\Controllers\Admin\PujaServiceController::class, 'updateStatus'])->name('puja-service.updateStatus');
            Route::get('/delete/{id}', [App\Http\Controllers\Admin\PujaServiceController::class, 'destroy'])->name('puja-service.delete');
        });

        // -------------------banner-----------------

        Route::group(['prefix' => 'banner'], function () {
            Route::get('/', [App\Http\Controllers\Admin\BannerController::class, 'index'])->name('banner.index');
            Route::get('/create', [App\Http\Controllers\Admin\BannerController::class, 'create'])->name('banner.create');
            Route::post('/store', [App\Http\Controllers\Admin\BannerController::class, 'store'])->name('banner.store');
            Route::get('/edit/{id}', [App\Http\Controllers\Admin\BannerController::class, 'edit'])->name('banner.edit');
            Route::post('/update/{id}', [App\Http\Controllers\Admin\BannerController::class, 'update'])->name('banner.update');
            Route::post('/updateStatus', [App\Http\Controllers\Admin\BannerController::class, 'updateStatus'])->name('banner.updateStatus');
            Route::get('/delete/{id}', [App\Http\Controllers\Admin\BannerController::class, 'destroy'])->name('banner.delete');
        });

        // --------------------content------------------

        Route::group(['prefix' => 'content'], function () {
            Route::get('/', [App\Http\Controllers\Admin\ContentController::class, 'index'])->name('content.index');
            Route::get('/create', [App\Http\Controllers\Admin\ContentController::class, 'create'])->name('content.create');
            Route::post('/store', [App\Http\Controllers\Admin\ContentController::class, 'store'])->name('content.store');
            Route::get('/edit/{id}', [App\Http\Controllers\Admin\ContentController::class, 'edit'])->name('content.edit');
            Route::post('/update/{id}', [App\Http\Controllers\Admin\ContentController::class, 'update'])->name('content.update');
            Route::post('/updateStatus', [App\Http\Controllers\Admin\ContentController::class, 'updateStatus'])->name('content.updateStatus');
            Route::get('/delete/{id}', [App\Http\Controllers\Admin\ContentController::class, 'destroy'])->name('content.delete');
        });

        // ------------------customer-------------

        Route::group(['prefix' => 'customer'], function () {
            Route::get('/', [App\Http\Controllers\Admin\CustomerController::class, 'index'])->name('customer.index');
            Route::get('/create', [App\Http\Controllers\Admin\CustomerController::class, 'create'])->name('customer.create');
            Route::post('/store', [App\Http\Controllers\Admin\CustomerController::class, 'store'])->name('customer.store');
            Route::get('/edit/{id}', [App\Http\Controllers\Admin\CustomerController::class, 'edit'])->name('customer.edit');
            Route::post('/update/{id}', [App\Http\Controllers\Admin\CustomerController::class, 'update'])->name('customer.update');
            Route::post('/updateStatus', [App\Http\Controllers\Admin\CustomerController::class, 'updateStatus'])->name('customer.updateStatus');
            Route::get('/delete/{id}', [App\Http\Controllers\Admin\CustomerController::class, 'destroy'])->name('customer.delete');
        });

        // -------------------Booking---------

        Route::group(['prefix' => 'booking'], function () {
            Route::get('/', [App\Http\Controllers\Admin\BookingController::class, 'index'])->name('booking.index');
            Route::get('/details/{id}', [App\Http\Controllers\Admin\BookingController::class, 'show'])->name('booking.details');

            // Route::get('/create', [App\Http\Controllers\Admin\CustomerController::class, 'create'])->name('customer.create');
            // Route::post('/store', [App\Http\Controllers\Admin\CustomerController::class, 'store'])->name('customer.store');
            // Route::get('/edit/{id}', [App\Http\Controllers\Admin\CustomerController::class, 'edit'])->name('customer.edit');
            // Route::post('/update/{id}', [App\Http\Controllers\Admin\CustomerController::class, 'update'])->name('customer.update');
            // Route::post('/updateStatus', [App\Http\Controllers\Admin\CustomerController::class, 'updateStatus'])->name('customer.updateStatus');
            // Route::get('/delete/{id}', [App\Http\Controllers\Admin\CustomerController::class, 'destroy'])->name('customer.delete');


        });
    });

    // Route::get('/', function () {
    //     return view('admin/dashboard');
    // });


});