<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\DestinasiWisataController;
use App\Http\Controllers\HomestayController;
use App\Http\Controllers\KamarHomestayController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

// 🔥 Tambahkan ini saja!
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/', [AuthController::class, 'index'])->name('auth.index');
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::resource('/warga', WargaController::class);
Route::resource('/destinasi-wisata', DestinasiWisataController::class);

Route::resource('warga', WargaController::class);
Route::resource('destinasi', DestinasiWisataController::class);

Route::resource('homestay', HomestayController::class);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('homestay', HomestayController::class);
Route::resource('kamar', KamarHomestayController::class);
