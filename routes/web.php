<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[AuthController::class,'index'])->name('login-page');
Route::post('/login',[AuthController::class,'login'])->name('login');


Route::group(['prefix' => 'dashboard', 'as' => 'dashboard::'], function() {
    Route::get('/panel',[DashboardController::class,'index'])->name('dashboard');
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');

    Route::group(['prefix' => 'vehicles', 'as' => 'vehicles::'], function () {
        Route::get('/', [VehicleController::class, 'index'])->name('index');
        Route::get('/create', [VehicleController::class, 'create'])->name('create');
        Route::post('/', [VehicleController::class, 'store'])->name('store');
        Route::get('/{vehicle}', [VehicleController::class, 'show'])->name('show');
        Route::get('/{vehicle}/edit', [VehicleController::class, 'edit'])->name('edit');
        Route::put('/{vehicle}', [VehicleController::class, 'update'])->name('update');

        Route::get('/{vehicle}/monitoring/create', [VehicleController::class, 'monitoringCreate'])->name('monitoring-create');
        Route::post('/{vehicle}/monitoring/create', [VehicleController::class, 'monitoringStore'])->name('monitoring-store');
    });

    Route::group(['prefix' => 'branches', 'as' => 'branches::'], function () {
        Route::get('/', [BranchController::class, 'index'])->name('index');
        Route::get('/create', [BranchController::class, 'create'])->name('create');
        Route::post('/', [BranchController::class, 'store'])->name('store');
        Route::get('/{branch}', [BranchController::class, 'show'])->name('show');
        Route::get('/{branch}/edit', [BranchController::class, 'edit'])->name('edit');
        Route::put('/{branch}', [BranchController::class, 'update'])->name('update');
        Route::delete('/{branch}', [BranchController::class, 'destroy'])->name('destroy');

        Route::group(['prefix' => '{branch}/sites', 'as' => 'sites::'], function () {
            Route::get('/', [SiteController::class, 'index'])->name('index');
            Route::get('/create', [SiteController::class, 'create'])->name('create');
            Route::post('/', [SiteController::class, 'store'])->name('store');
            Route::get('/{site}', [SiteController::class, 'show'])->name('show');
            Route::get('/{site}/edit', [SiteController::class, 'edit'])->name('edit');
            Route::put('/{site}', [SiteController::class, 'update'])->name('update');
            Route::delete('/{site}', [SiteController::class, 'destroy'])->name('destroy');
        });
    });

    Route::group(['prefix' => 'bookings', 'as' => 'bookings::'], function () {
        Route::get('/', [BookingController::class, 'index'])->name('index');
        Route::get('/create', [BookingController::class, 'create'])->name('create');
        Route::post('/', [BookingController::class, 'store'])->name('store');
        Route::get('/{booking}', [BookingController::class, 'show'])->name('show');
        Route::get('/{booking}/approve', [BookingController::class, 'approve'])->name('approve');
    });

    Route::group(['prefix' => 'drivers', 'as' => 'drivers::'], function () {
        Route::get('/', [DriverController::class, 'index'])->name('index');
        Route::get('/create', [DriverController::class, 'create'])->name('create');
        Route::post('/', [DriverController::class, 'store'])->name('store');
        Route::get('/{driver}', [DriverController::class, 'show'])->name('show');
        Route::get('/{driver}/edit', [DriverController::class, 'edit'])->name('edit');
        Route::put('/{driver}', [DriverController::class, 'update'])->name('update');
        Route::delete('/{driver}', [DriverController::class, 'destroy'])->name('destroy');
    });


});
