<?php

use App\Livewire\Content;
use App\Livewire\Gedung;
use App\Livewire\Login;
use App\Livewire\Dashboard;
use App\Livewire\DetailAll;
use App\Livewire\EditKampus;
use App\Livewire\Kampus;
use App\Livewire\PerubahanData;
use App\Livewire\Rekapitulasi;
use App\Livewire\TambahGedung;
use App\Livewire\TambahKampus;
use App\Livewire\TambahRuang;
use Illuminate\Support\Facades\Route;

Route::get('/admin/dashboard', Dashboard::class)->name('dashboard');
Route::get('/login', Login::class)->name('login');
Route::get('/admin/content', Content::class)->name('content');
Route::get('/admin/kampus', Kampus::class)->name('kampus');
Route::get('/admin/gedung', Gedung::class)->name('gedung');
Route::get('/admin/tambah-kampus', TambahKampus::class)->name('tambah-kampus');
Route::get('/admin/tambah-gedung', TambahGedung::class)->name('tambah-gedung');
Route::get('/admin/tambah-ruang', TambahRuang::class)->name('tambah-ruang');
Route::get('/admin/edit-kampus', EditKampus::class)->name('edit-kampus');
Route::get('/admin/detail-all', DetailAll::class)->name('detail-all');
Route::get('/admin/perubahan-data', PerubahanData::class)->name('perubahan-data');
Route::get('/admin/rekapitulasi', Rekapitulasi::class)->name('rekapitulasi');
