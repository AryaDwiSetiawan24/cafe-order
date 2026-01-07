<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    MenuController,
    OrderController,
    UserController,
    AdminController,
    PegawaiController,
    CategoryController,
    TableController,
};

// contoh Landing Page
Route::get('/landingpage', function () {
    return view('landingpage');
});

// user
Route::get('/', [UserController::class, 'index']);
Route::get('/menu', [MenuController::class, 'index']);
Route::get('/cart', [OrderController::class, 'cart']);
// midtrans
Route::get('/checkout', [OrderController::class, 'checkout']);
Route::post('/pay', [OrderController::class, 'pay']);
Route::post('/midtrans/callback', [OrderController::class, 'callback']);

// admin
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index']);
});

// pegawai
Route::prefix('pegawai')->middleware(['auth', 'role:admin,cashier'])->group(function () {
    Route::get('/', [PegawaiController::class, 'index']);
});

require __DIR__.'/auth.php';