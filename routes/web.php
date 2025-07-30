<?php

use App\Livewire\Dashboard;
use App\Livewire\Admin\EditKampus;
use App\Livewire\Gedung;
use App\Livewire\Form;
use App\Livewire\Debug;
use App\Livewire\Login;
use App\Livewire\Campus;
use App\Livewire\Kampus;
use App\Livewire\Content;
use App\Livewire\DetailAll;
use App\Livewire\TambahRuang;
use App\Livewire\Rekapitulasi;
use App\Livewire\TambahGedung;
use App\Livewire\TambahKampus;
use App\Livewire\PerubahanData;
use App\Livewire\VerifikasiNew;
use App\Livewire\VerifikasiData;
use Illuminate\Support\Facades\Route;
use App\Livewire\ListKampus;
use App\Livewire\Ruang;
use App\Livewire\Homepage;
use App\Livewire\ModelBinding;

// Admin
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

// Auth
Route::get('/login', Login::class)->name('login');
// Route::get('/login', Login::class)->name('login');

// Debug API
Route::get('/form', Form::class)->name('form');
Route::get('/debug', Debug::class)->name('debug');

// Public
Route::get('/', Homepage::class)->name('homepage');
Route::get('/kampus', ListKampus::class)->name('listKampus');
Route::get('/buildings/{building}', ModelBinding::class)->name('model');
Route::get('/kampus/{campus}', Kampus::class)->name('kampus');
Route::get('/gedung/{building}', Gedung::class)->name('gedung');
Route::get('/ruang/{room}', Ruang::class)->name('ruang');
// Route::get('/admin/tambahgedung', TambahGedung::class)->name('admin.tambah-gedung');
// Route::get('/admin/edit', EditKampus::class)->name('edit-kampus');
// Route::get('/admin/dashboard', Dashboard::class)->name('admin.dashboard');

