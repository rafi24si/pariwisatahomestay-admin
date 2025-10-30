<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\DestinasiWisataController;
use App\Http\Controllers\HomestayController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

Route::get('/', [AuthController::class, 'index'])->name('auth.index');    //GET → tampilkan form login
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login'); // POST → proses login
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::resource('/warga', WargaController::class);
Route::resource('/destinasi-wisata', DestinasiWisataController::class);
Route::resource('warga', WargaController::class);
Route::resource('destinasi', DestinasiWisataController::class);
Route::resource('homestay', HomestayController::class);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');




