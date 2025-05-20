<?php

use App\Livewire\Content;
use App\Livewire\Dashboard;
use App\Livewire\Login;
use App\Livewire\Homepage;
use Illuminate\Support\Facades\Route;

Route::get('/', Dashboard::class)->name('homepage');
Route::get('/login', Login::class)->name('login');
Route::get('/content', Content::class)->name('content');
// Route::get('/dashboard', Dashboard::class)->name('dashboard');