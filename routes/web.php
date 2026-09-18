<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LayananController;

// LOGIN
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

// DASHBOARD
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// LAYANAN
Route::resource('layanan', LayananController::class);

// LOGOUT
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');