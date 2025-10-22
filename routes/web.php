<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/auth', [AuthController::class, 'index'])->name('auth.index');    //GET → tampilkan form login
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login'); // POST → proses login
Route::get('/dashboard', [DashboardController::class, 'index']);
