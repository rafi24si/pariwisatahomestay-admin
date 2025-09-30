<?php

use App\Http\Controllers\AdminController;

Route::get('/data', [AdminController::class, 'index']);
Route::get('/data/{nama}', [AdminController::class, 'data']);
Route::get('/data/{nama?}', [AdminController::class, 'showData']);
