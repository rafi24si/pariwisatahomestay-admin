<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\HomestayController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UlasanWisataController;
use App\Http\Controllers\KamarHomestayController;
use App\Http\Controllers\BookingHomestayController;
use App\Http\Controllers\DestinasiWisataController;

// Redirect "/" ke login
Route::redirect('/', '/login');


// =========================
// ROUTE UNTUK TAMU (BELUM LOGIN)
// =========================
Route::middleware('guest.only')->group(function () {

    Route::get('/login', [AuthController::class, 'loginForm'])->name('login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');

    Route::get('/register', [AuthController::class, 'registerForm'])->name('register.form');
    Route::post('/register', [AuthController::class, 'register'])->name('register.process');
});


// =========================
// ROUTE WAJIB LOGIN
// =========================
Route::middleware('checkLogin')->group(function () {

    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    // -------------------------
    // CRUD USERS
    // -------------------------
    Route::resource('user', UserController::class);

    Route::get('/user/check-email', [UserController::class, 'checkEmail'])
        ->name('user.checkEmail');


    // -------------------------
    // CRUD WARGA
    // -------------------------
    Route::resource('warga', WargaController::class);

    Route::get('/warga/check-ktp', [WargaController::class, 'checkKTP'])
        ->name('warga.checkKTP');

    Route::get('/warga/check-email', [WargaController::class, 'checkEmail'])
        ->name('warga.checkEmail');


    // -------------------------
    // CRUD DESTINASI WISATA
    // -------------------------
    Route::resource('destinasi', DestinasiWisataController::class);

    Route::get('/destinasi/check-name', [DestinasiWisataController::class, 'checkName'])
        ->name('destinasi.checkName');

    Route::delete('/destinasi/media/{media_id}', [DestinasiWisataController::class, 'deleteImage'])
        ->name('destinasi.deleteImage');


    // -------------------------
    // CRUD HOMESTAY
    // -------------------------
    Route::resource('homestay', HomestayController::class);

    Route::get('/homestay/check-name', [HomestayController::class, 'checkName'])
        ->name('homestay.checkName');

    Route::delete('/homestay/media/{media_id}', [HomestayController::class, 'deleteImage'])
        ->name('homestay.deleteImage');


    // -------------------------
    // CRUD KAMAR HOMESTAY
    // -------------------------
    Route::resource('kamar', KamarHomestayController::class);

    Route::get('/kamar/check-name', [KamarHomestayController::class, 'checkName'])
        ->name('kamar.checkName');

    Route::delete('/kamar/media/{media_id}', [KamarHomestayController::class, 'deleteImage'])
        ->name('kamar.deleteImage');


    // =====================================================
    // 🔥 CRUD BOOKING HOMESTAY (FULL & FIX)
    // =====================================================
    Route::resource('booking', BookingHomestayController::class);

    // Ambil kamar berdasarkan homestay → untuk form booking
    Route::get('/booking/get-kamar/{homestay_id}',
        [BookingHomestayController::class, 'getKamar']
    )->name('booking.getKamar');

    // Booking calendar — mengambil tanggal tidak tersedia
    Route::get('/booking/calendar/{kamar_id}',
        [BookingHomestayController::class, 'calendar']
    )->name('booking.calendar');

    Route::patch('/booking/{id}/toggle-lunas',
    [BookingHomestayController::class, 'toggleLunas']
)->name('booking.toggleLunas');

// -------------------------
// CRUD ULASAN WISATA
// -------------------------

Route::resource('ulasan', UlasanWisataController::class);

// (Opsional) AJAX check — jika nanti ingin validasi rating / komentar
Route::get('/ulasan/check', [UlasanWisataController::class, 'check'])
    ->name('ulasan.check');



    // LOGOUT
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

});
