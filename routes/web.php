<?php

use App\Http\Controllers\Rekap;
use App\Livewire\Absensi;
use App\Livewire\AdminPanel;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/admin', [Rekap::class, 'index'])->name('admin.panel');
Route::get('/', Absensi::class)->name('dashboard');
