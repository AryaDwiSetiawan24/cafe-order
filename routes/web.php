<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\MenuController;
use App\Http\Controllers\user\OrderController;

// contoh Landing Page
Route::get('/landingpage', function () {
    return view('landingpage');
});

// user
Route::view('/', 'pages.user.home');
Route::get('/menu', [MenuController::class, 'index']);
Route::get('/cart', [OrderController::class, 'cart']);

// admin
Route::prefix('admin')->group(function () {
    Route::view('/', 'pages.admin.dashboard');
});

// pegawai
Route::prefix('pegawai')->group(function () {
    Route::view('/', 'pages.pegawai.dashboard');
});
