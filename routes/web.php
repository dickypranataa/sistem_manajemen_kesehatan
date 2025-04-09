<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PeriksaController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\PeriksaPasienController;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//untuk ke halaman dokter


Route::get('/dokter', [HomeController::class, 'dokter'])->name('dokter');

Route::prefix('dokter')->group(function () {
    Route::resource('obat', ObatController::class);
    Route::resource('periksa', PeriksaController::class);
});

Route::prefix('pasien')->group(function () {
    Route::get('/periksa', [PeriksaPasienController::class, 'index'])->name('periksa.index');
    Route::get('/periksa/create', [PeriksaPasienController::class, 'create'])->name('periksa.create');
    Route::post('/periksa', [PeriksaPasienController::class, 'store'])->name('periksa.store');
    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat.index');
});

Auth::routes();


