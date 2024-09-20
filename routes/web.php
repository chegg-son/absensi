<?php

use App\Http\Controllers\Rekap;
use App\Http\Controllers\UserController;
use App\Livewire\Absensi;
use App\Livewire\AdminPanel;
use Illuminate\Support\Facades\Route;

Route::middleware(['isLogin'])->group(function () {
    Route::get('/admin', [Rekap::class, 'index'])->name('admin.panel');
    Route::get('actionlogout', [UserController::class, 'actionLogout'])->name('action.logout');
});

Route::get('/', Absensi::class)->name('dashboard');
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('actionlogin', [UserController::class, 'actionLogin'])->name('action.login');
