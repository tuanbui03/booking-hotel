<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.homepage');
})->name('homepage');

// routes/web.php
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
