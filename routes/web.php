<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\register_controller;

Route::get('/', function () {
    return view('index');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/service-details', function () {
    return view('service-details');
});

Route::get('/starter-page', function () {
    return view('service-details');
});
Route::get('/portofolio-page', function () {
    return view('portofolio-details');
});

Route::get('/starter-page', function () {
    return view('starter-page');
});
Route::get('/registrasi', [register_controller::class, 'showForm'])->name('register');

Route::post('/registrasi', [register_controller::class, 'store'])->name('register');