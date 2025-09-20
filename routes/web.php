<?php

use App\Livewire\Form;
use App\Livewire\Debug;
use App\Livewire\Login;
use App\Livewire\Ruang;
use App\Livewire\Campus;
use App\Livewire\Gedung;
use App\Livewire\Kampus;
use App\Livewire\Content;
use App\Livewire\Homepage;
use App\Livewire\ListKampus;
use App\Livewire\ListGedung;
use App\Livewire\ListRuang;
use App\Livewire\TambahRuang;
use App\Livewire\ModelBinding;
use App\Livewire\TambahGedung;
use App\Livewire\TambahKampus;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\DetailAll;
use App\Livewire\Admin\EditKampus;
use App\Livewire\Admin\EditGedung;
use App\Livewire\Admin\EditRuang;
use App\Livewire\Admin\DaftarRuang;
use App\Livewire\Admin\DaftarGedung;
use App\Livewire\Admin\DaftarKampus;
use App\Livewire\Admin\Rekapitulasi;
use App\Livewire\Admin\PerubahanData;
use App\Livewire\Admin\ViewKampus;
use App\Livewire\Admin\ViewGedung;
use App\Livewire\Admin\ViewRuang;
// use App\Livewire\Admin\PeminjamanRuang;
use App\Livewire\Admin\ReservasiRuang;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\VerifikasiData;

// Admin
Route::middleware(['auth'])->prefix('admin')->group(function(){
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/content', Content::class)->name('content');
    Route::get('/kampus', Kampus::class)->name('kampus');
    Route::get('/gedung', Gedung::class)->name('gedung');
    // Route::get('/tambah-kampus', TambahKampus::class)->name('tambah-kampus');
    Route::get('/daftar-kampus', DaftarKampus::class)->name('daftar-kampus');
    Route::get('/edit-kampus/{campus}', EditKampus::class)->name('edit-kampus');
    // Route::get('/tambah-gedung', TambahGedung::class)->name('tambah-gedung');
    Route::get('/daftar-gedung', DaftarGedung::class)->name('daftar-gedung');
    Route::get('/edit-gedung/{building}', EditGedung::class)->name('edit-gedung');
    // Route::get('/tambah-ruang', TambahRuang::class)->name('tambah-ruang');
    Route::get('/daftar-ruang', DaftarRuang::class)->name('daftar-ruang');
    Route::get('/edit-ruang/{room}', EditRuang::class)->name('edit-ruang');
    Route::get('/detail-all', DetailAll::class)->name('detail-all');
    Route::get('/perubahan-data', PerubahanData::class)->name('perubahan-data');
    Route::get('/verifikasi-data', VerifikasiData::class)->name('verifikasi-data');
    Route::get('/rekapitulasi', Rekapitulasi::class)->name('rekapitulasi');
    Route::get('/campus', Campus::class)->name('campus');
    // Route::get('/verifikasi/new', VerifikasiNew::class)->name('verifikasi-new');
    Route::get('/kampus/{campus}', ViewKampus::class)->name('view-kampus');
    Route::get('/gedung/{building}', ViewGedung::class)->name('view-gedung');
    Route::get('/ruang/{room}', ViewRuang::class)->name('view-ruang');
    // Route::get('/peminjaman-ruang', PeminjamanRuang::class)->name('peminjaman-ruang');
    Route::get('/reservasi-ruang/{room}', ReservasiRuang::class)->name('reservasi-ruang');
});

// Auth
Route::get('/login', Login::class)->name('login');
// Route::get('/login', Login::class)->name('login');

// Debug API
Route::get('/form', Form::class)->name('form');
Route::get('/debug', Debug::class)->name('debug');
// Route::get('/buildings/{building}', ModelBinding::class)->name('model');

// Public
Route::get('/', Homepage::class)->name('homepage');
Route::get('/kampus', ListKampus::class)->name('listKampus');
Route::get('/gedung', ListGedung::class)->name('listGedung');
Route::get('/ruang', ListRuang::class)->name('listRuang');
// Route::get('/buildings/{building}', ModelBinding::class)->name('model');
Route::get('/kampus/{campus:slug}', Kampus::class)->name('kampus');
Route::get('/gedung/{building:slug}', Gedung::class)->name('gedung');
Route::get('/ruang/{room:slug}', Ruang::class)->name('ruang');
// Route::get('/admin/tambahgedung', TambahGedung::class)->name('admin.tambah-gedung');
// Route::get('/admin/edit', EditKampus::class)->name('edit-kampus');
// Route::get('/admin/dashboard', Dashboard::class)->name('admin.dashboard');

