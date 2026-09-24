<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\ProfilPerusahaanController;
use App\Http\Controllers\PemilikController;

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

// GALERI
Route::resource('galeri', GaleriController::class);

// PENGELOLAAN PENGGUNA - KHUSUS PEMILIK
Route::middleware('pemilik')->group(function () {
    Route::resource('pengguna', PemilikController::class);
});

// PROFIL PERUSAHAAN KHUSUS PEMILIK
Route::middleware('pemilik')->group(function () {

    Route::resource('profil', ProfilPerusahaanController::class);

});