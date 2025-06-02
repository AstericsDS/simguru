<?php

use App\Livewire\Content;
use App\Livewire\Dashboard;
use App\Livewire\Gedung;
use App\Livewire\Login;
use App\Livewire\Homepage;
use App\Livewire\Kampus;
use App\Livewire\Fasilitas;
use App\Livewire\Tambahgedung;
use App\Livewire\Tambahkampus;
use App\Livewire\Tambahruang;
use Illuminate\Support\Facades\Route;

Route::get('/', Homepage::class)->name('homepage');
Route::get('/login', Login::class)->name('login');
Route::get('/content', Content::class)->name('content');
Route::get('/dashboard', Dashboard::class)->name('dashboard');
Route::get('/fasilitas', Fasilitas::class)->name('fasilitas');
Route::get('/kampus', Kampus::class)->name('kampus');
Route::get('/gedung', Gedung::class)->name('gedung');
Route::get('/tambahkampus', Tambahkampus::class)->name('tambahkampus');
Route::get('/tambahgedung', Tambahgedung::class)->name('tambahgedung');
Route::get('/tambahruang', Tambahruang::class)->name('tambahruang');
