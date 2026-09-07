<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LayananController;

Route::get('/login', [AdminController::class, 'login'])
    ->name('login');

Route::post('/login', [AdminController::class, 'loginProcess'])
    ->name('login.process');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::post('/logout', [AdminController::class, 'logout'])
    ->name('logout');

Route::resource('layanan', LayananController::class);