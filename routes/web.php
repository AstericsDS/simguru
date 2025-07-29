<?php

use App\Livewire\Dashboard;
use App\Livewire\Admin\EditKampus;
use App\Livewire\Gedung;
use App\Livewire\Form;
use App\Livewire\Debug;
use App\Livewire\Login;
use App\Livewire\ListKampus;
use App\Livewire\Kampus;
use App\Livewire\Ruang;
use App\Livewire\Admin\TambahGedung;
use App\Livewire\Homepage;
use App\Livewire\ModelBinding;
use Illuminate\Support\Facades\Route;

Route::get('/', Homepage::class)->name('homepage');
Route::get('/kampus', ListKampus::class)->name('listKampus');
Route::get('/login', Login::class)->name('login');
Route::get('/form', Form::class)->name('form');

Route::get('/debug', Debug::class)->name('debug');
Route::get('/buildings/{building}', ModelBinding::class)->name('model');
Route::get('/kampus/{campus}', Kampus::class)->name('kampus');
Route::get('/gedung/{building}', Gedung::class)->name('gedung');
Route::get('/ruang/{room}', Ruang::class)->name('ruang');
Route::get('/admin/tambahgedung', TambahGedung::class)->name('admin.tambah-gedung');
Route::get('/admin/edit', EditKampus::class)->name('edit-kampus');
Route::get('/admin/dashboard', Dashboard::class)->name('admin.dashboard');

