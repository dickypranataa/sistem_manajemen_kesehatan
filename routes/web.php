<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\PeriksaPasienController;
use App\Http\Controllers\Admin\DokterController;
use App\Http\Controllers\Admin\PoliController;
use App\Http\Controllers\Admin\PasienController;
use App\Http\Controllers\Admin\ObatController;
use App\Http\Controllers\Dokter\JadwalPeriksaController;
use App\Http\Controllers\Dokter\PeriksaController as DokterPeriksaController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//untuk ke halaman dokter


Route::get('/dokter', [HomeController::class, 'dokter'])->name('dokter');

Route::middleware(['auth', 'role:dokter'])->prefix('dokter')->as('dokter.')->group(function () {
    Route::resource('periksa', DokterPeriksaController::class);
    Route::get('/jadwal', [JadwalPeriksaController::class, 'index'])->name('jadwal.index');
    Route::get('/jadwal/create', [JadwalPeriksaController::class, 'create'])->name('jadwal.create');
    Route::post('/jadwal', [JadwalPeriksaController::class, 'store'])->name('jadwal.store');
    Route::get('/jadwal/{id}/edit', [JadwalPeriksaController::class, 'edit'])->name('jadwal.edit');
    Route::put('/jadwal/{id}', [JadwalPeriksaController::class, 'update'])->name('jadwal.update');
});

Route::middleware(['auth', 'role:pasien'])->prefix('pasien')->name('pasien.')->group(function () {
    Route::get('/periksa', [PeriksaPasienController::class, 'index'])->name('periksa.index');
    Route::get('/periksa/create', [PeriksaPasienController::class, 'create'])->name('periksa.create');
    Route::post('/periksa', [PeriksaPasienController::class, 'store'])->name('periksa.store');
    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat.index');
    Route::get('/pasien/periksa/jadwal', [PeriksaPasienController::class, 'getJadwal'])->name('pasien.periksa.jadwal');
});




Route::middleware(['auth', 'role:admin'])->prefix('admin')->as('admin.')->group(function () {
    Route::resource('dokter', DokterController::class);
    Route::resource('poli', PoliController::class);
    Route::resource('pasien', PasienController::class);
    Route::resource('obat', ObatController::class);
});


Auth::routes();


