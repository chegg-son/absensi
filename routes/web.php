<?php

use App\Http\Controllers\Rekap;
use App\Http\Controllers\UserController;
use App\Livewire\Absensi;
use App\Livewire\AdminPanel;
use App\Livewire\UserTable;
use Illuminate\Support\Facades\Route;

Route::middleware(['isLogin'])->group(function () {
    Route::get('/rekap', [Rekap::class, 'index'])->name('rekap');
    Route::get('/actionlogout', [UserController::class, 'actionLogout'])->name('action.logout');
    Route::get('/users', [UserController::class, 'index'])->name('users');
});

Route::get('/', Absensi::class)->name('dashboard');
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('actionlogin', [UserController::class, 'actionLogin'])->name('action.login');
