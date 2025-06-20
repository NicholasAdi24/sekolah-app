<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Livewire\Guru\Index as GuruIndex;
use App\Livewire\Kelas\Index as KelasIndex;
use App\Livewire\Siswa\Index as SiswaIndex;
use App\Livewire\OrangTua\Index as OrangTuaIndex;
use \App\Livewire\DataKeseluruhan as DataSiswaKeseluruhan;

Route::view('/', 'welcome');

Route::get('dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware(['auth'])->group(function () {
    Route::get('/kelas', KelasIndex::class)->name('kelas.index');
    Route::get('/guru', GuruIndex::class)->name('guru.index');
    Route::get('/siswa', SiswaIndex::class)->name('siswa.index');
    Route::get('/data-keseluruhan', DataSiswaKeseluruhan::class)->name('data-keseluruhan');
    Route::get('/orang-tua', OrangTuaIndex::class)->name('orang-tua.index');

});


require __DIR__.'/auth.php';
