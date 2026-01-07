<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\user\MenuController;
use App\Http\Controllers\user\OrderController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\Pegawai\PegawaiController;

// contoh Landing Page
Route::get('/landingpage', function () {
    return view('landingpage');
});

// user
Route::get('/', [HomeController::class, 'index']);
Route::get('/menu', [MenuController::class, 'index']);
Route::get('/cart', [OrderController::class, 'cart']);
// midtrans
Route::get('/checkout', [OrderController::class, 'checkout']);
Route::post('/pay', [OrderController::class, 'pay']);
Route::post('/midtrans/callback', [OrderController::class, 'callback']);

// admin
Route::prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
});

// pegawai
Route::prefix('pegawai')->group(function () {
    Route::get('/', [PegawaiController::class, 'index']);
});
