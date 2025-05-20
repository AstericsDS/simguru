<?php

use App\Livewire\Dashboard;
use App\Livewire\EditKampus;
use App\Livewire\Gedung;
use App\Livewire\Login;
use App\Livewire\Homepage;
use App\Livewire\Kampus;
use App\Livewire\Ruang;
// use App\Livewire\Admin\
use Illuminate\Support\Facades\Route;

Route::get('/', Homepage::class)->name('homepage');
Route::get('/login', Login::class)->name('login');
Route::get('/kampus', Kampus::class)->name('kampus');
Route::get('/gedung', Gedung::class)->name('gedung');
// Route::get('/admin/tambahgedung', TambahGedung::class)->name('admin.tambah-gedung');
// Route::get('/admin//edit', EditKampus::class)->name('edit-kampus');
Route::get('/admin/dashboard', Dashboard::class)->name('admin.dashboard');
Route::get('/ruang', Ruang::class)->name('ruang');