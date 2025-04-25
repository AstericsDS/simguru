<?php

use App\Livewire\EditKampus;
use App\Livewire\Gedung;
use App\Livewire\Login;
use App\Livewire\Homepage;
use App\Livewire\Kampus;
use App\Livewire\Tablelist;
use App\Livewire\TambahGedung;
use Illuminate\Support\Facades\Route;

Route::get('/', Homepage::class)->name('homepage');
Route::get('/login', Login::class)->name('login');
Route::get('/kampus', Kampus::class)->name('kampus');
Route::get('/gedung', Gedung::class)->name('gedung');
Route::get('/tambahgedung', TambahGedung::class)->name('tambah-gedung');
Route::get('/edit', EditKampus::class)->name('edit-kampus');
Route::get('/list', Tablelist::class)->name('tablelist');