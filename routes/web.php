<?php

use App\Livewire\Content;
use App\Livewire\Gedung;
use App\Livewire\Login;
use App\Livewire\Dashboard;
use App\Livewire\Kampus;
use App\Livewire\TambahGedung;
use App\Livewire\TambahKampus;
use App\Livewire\TambahRuang;
use Illuminate\Support\Facades\Route;

Route::get('/', Dashboard::class)->name('dashboard');
Route::get('/login', Login::class)->name('login');
// Route::get('/content', Content::class)->name('content');
// Route::get('/kampus', Kampus::class)->name('kampus');
// Route::get('/gedung', Gedung::class)->name('gedung');
Route::get('/tambah-kampus', TambahKampus::class)->name('tambah-kampus');
Route::get('/tambah-gedung', TambahGedung::class)->name('tambah-gedung');
Route::get('/tambah-ruang', TambahRuang::class)->name('tambah-ruang');
