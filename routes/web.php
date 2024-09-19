<?php

use Auth\Login;
use App\Livewire\User;
use App\Livewire\Absensi;
use App\Livewire\Auth;
use App\Http\Controllers\Rekap;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin', [Rekap::class, 'index'])->name('admin.panel');
    Route::get('/users', User\Index::class)->name('users');

    Route::get('/logout', [Auth\Logout::class, 'logout'])->name('logout');
});

Route::get('/', Absensi::class)->name('dashboard');
Route::get('/10g!n', Auth\Login::class)->name('login');
