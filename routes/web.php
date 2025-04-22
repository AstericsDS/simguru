<?php

use App\Livewire\Gedung;
use App\Livewire\Login;
use App\Livewire\Homepage;
use App\Livewire\Kampus;
use App\Livewire\Lantai;
use App\Livewire\Ruang;
use Illuminate\Support\Facades\Route;

Route::get('/', Homepage::class)->name('homepage');
Route::get('/login', Login::class)->name('login');
Route::get('/kampus', Kampus::class)->name('kampus');
Route::get('/gedung', Gedung::class)->name('gedung');
Route::get('/lantai', Lantai::class)->name('lantai');
Route::get('/ruang', Ruang::class)->name('ruang');