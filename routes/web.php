<?php

use App\Livewire\Login;
use App\Livewire\Campus;
use App\Livewire\Gedung;
use App\Livewire\Kampus;
use App\Livewire\Content;
use App\Livewire\Dashboard;
use App\Livewire\DetailAll;
use App\Livewire\EditKampus;
use App\Livewire\TambahRuang;
use App\Livewire\Rekapitulasi;
use App\Livewire\TambahGedung;
use App\Livewire\TambahKampus;
use App\Livewire\PerubahanData;
use App\Livewire\VerifikasiNew;
use App\Livewire\VerifikasiData;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('admin')->group(function(){
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/content', Content::class)->name('content');
    Route::get('/kampus', Kampus::class)->name('kampus');
    Route::get('/gedung', Gedung::class)->name('gedung');
    Route::get('/tambah-kampus', TambahKampus::class)->name('tambah-kampus');
    Route::get('/tambah-gedung', TambahGedung::class)->name('tambah-gedung');
    Route::get('/tambah-ruang', TambahRuang::class)->name('tambah-ruang');
    Route::get('/edit-kampus', EditKampus::class)->name('edit-kampus');
    Route::get('/detail-all', DetailAll::class)->name('detail-all');
    Route::get('/perubahan-data', PerubahanData::class)->name('perubahan-data');
    Route::get('/verifikasi-data', VerifikasiData::class)->name('verifikasi-data');
    Route::get('/rekapitulasi', Rekapitulasi::class)->name('rekapitulasi');
    Route::get('/campus', Campus::class)->name('campus');
    // Route::get('/verifikasi/new', VerifikasiNew::class)->name('verifikasi-new');
});

Route::get('/login', Login::class)->name('login');
