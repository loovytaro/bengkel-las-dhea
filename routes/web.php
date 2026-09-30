<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\ProfilPerusahaanController;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\DashboardController;

// LOGIN
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

// DASHBOARD
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

// LAYANAN
Route::resource('layanan', LayananController::class);

// LOGOUT
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

// GALERI
Route::middleware('pemilik')->group(function () {
    Route::resource('galeri', GaleriController::class);
});

// PENGELOLAAN PENGGUNA - KHUSUS PEMILIK
Route::middleware('pemilik')->group(function () {
    Route::resource('pengguna', PemilikController::class);
});

// PROFIL PERUSAHAAN KHUSUS PEMILIK
Route::middleware('pemilik')->group(function () {

    Route::get('/profil', [ProfilPerusahaanController::class, 'index'])
        ->name('profil.index');

    Route::get('/profil/edit', [ProfilPerusahaanController::class, 'edit'])
        ->name('profil.edit');

    Route::put('/profil', [ProfilPerusahaanController::class, 'update'])
        ->name('profil.update');

});