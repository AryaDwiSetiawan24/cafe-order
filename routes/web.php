<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/menu', function () {
    return view('menu');
});

Route::get('/cart', function () {
    return view('cart');
});


Route::get('/1', function () {
    return view('home1');
});
