<?php

use App\Models\Pegawai;
use App\Livewire\Absensi;
use App\Livewire\UserTable;
use App\Livewire\AdminPanel;
use App\Http\Controllers\Rekap;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PegawaiController;

Route::middleware(['isLogin'])->group(function () {
    Route::get('/rekap', [Rekap::class, 'index'])->name('rekap');
    Route::get('/actionlogout', [UserController::class, 'actionLogout'])->name('action.logout');
    Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai');
    Route::get('/pegawai/{id}/show', [PegawaiController::class, 'show'])->name('pegawai.show');
    Route::put('/pegawai/{id}', [PegawaiController::class, 'edit'])->name('pegawai.action.edit');
    Route::delete('/pegawai/{id}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy.edit');
});

// Route::get('/pegawai', [UserController::class, 'create'])->name('pegawai.create');
Route::post('/pegawai', [UserController::class, 'store'])->name('pegawai.action.store');
Route::get('/', Absensi::class)->name('dashboard');
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('actionlogin', [UserController::class, 'actionLogin'])->name('action.login');
