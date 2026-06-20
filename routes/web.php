<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\SubKriteriaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RiwayatController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Landing Page
Route::get('/', function () {
    return view('landing');
})->name('landing');


// =====================
// AUTH (Guest Only)
// =====================

Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.post');

    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register'])
        ->name('register.post');

});


// =====================
// ADMIN ROUTES
// =====================

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'adminDashboard'])
        ->name('admin.dashboard');

    // Kelola Kriteria
    Route::resource('kriteria', KriteriaController::class);

    // Kelola Sub Kriteria
    Route::resource('sub-kriteria', SubKriteriaController::class);

    // Kelola Alternatif
    Route::resource('alternatif', AlternatifController::class);

    // Manajemen User
    Route::resource('user', UserController::class);

    // Profil Admin
    Route::get('/profil', [ProfilController::class, 'show'])
        ->name('admin.profil');

    Route::put('/profil', [ProfilController::class, 'update'])
        ->name('admin.profil.update');

});


// =====================
// USER ROUTES
// =====================

Route::middleware(['auth', 'user'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'userDashboard'])
        ->name('user.dashboard');

    // Input Penilaian
    Route::get('/penilaian', [PenilaianController::class, 'index'])
        ->name('penilaian.index');

    Route::get('/penilaian/create', [PenilaianController::class, 'create'])
        ->name('penilaian.create');

    Route::post('/penilaian', [PenilaianController::class, 'store'])
        ->name('penilaian.store');

    Route::get('/penilaian/{alternatif}/edit', [PenilaianController::class, 'edit'])
        ->name('penilaian.edit');

    Route::put('/penilaian/{alternatif}', [PenilaianController::class, 'update'])
        ->name('penilaian.update');

    Route::delete('/penilaian/{alternatif}', [PenilaianController::class, 'destroy'])
        ->name('penilaian.destroy');

    // Perhitungan MAUT
    Route::get('/perhitungan', [PerhitunganController::class, 'index'])
        ->name('perhitungan');

    // Lihat Ranking
    Route::get('/ranking', function () {
        return view('ranking');
    })->name('ranking');

    // Lihat Riwayat
    Route::get('/riwayat', [RiwayatController::class, 'index'])
        ->name('riwayat');

});


// =====================
// SHARED (All authenticated users)
// =====================

Route::middleware('auth')->group(function () {

    Route::get('/about', function () {
        return view('about');
    })->name('about');

    Route::get('/pengembang', function () {
        return view('pengembang');
    })->name('pengembang');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

});