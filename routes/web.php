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

Route::get('/register', function () {
    return view('register');
});
Route::get('/register', [register_controller::class, 'showForm'])->name('register.form');
Route::post('/register', [register_controller::class, 'store'])->name('register.store');

Route::get('/register/edit/{id}', [register_controller::class, 'edit'])->name('register.edit'); // EDIT
Route::put('/register/update/{id}', [register_controller::class, 'update'])->name('register.update'); // UPDATE

Route::delete('/register/delete/{id}', [register_controller::class, 'destroy'])->name('register.delete'); // DELETE
Route::get('/register/data', [register_controller::class, 'showData'])->name('register.data'); // TABEL
