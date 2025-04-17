<?php

use App\Livewire\Login;
use App\Livewire\Homepage;
use App\Livewire\Kampus;
use Illuminate\Support\Facades\Route;

Route::get('/', Homepage::class)->name('homepage');
Route::get('/login', Login::class)->name('login');
Route::get('/kampus', Kampus::class)->name('kampus');