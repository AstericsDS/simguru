<?php

use App\Livewire\Form;
use App\Livewire\Login;
use App\Livewire\Homepage;
use Illuminate\Support\Facades\Route;

Route::get('/', Homepage::class)->name('homepage');
Route::get('/login', Login::class)->name('login');
Route::get('/form', Form::class)->name('form');