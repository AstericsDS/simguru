<?php

use App\Livewire\Form;
use App\Livewire\Debug;
use App\Livewire\Login;
use App\Livewire\Homepage;
use App\Livewire\ModelBinding;
use Illuminate\Support\Facades\Route;

Route::get('/', Homepage::class)->name('homepage');
Route::get('/login', Login::class)->name('login');
Route::get('/form', Form::class)->name('form');

Route::get('/debug', Debug::class)->name('debug');
Route::get('/buildings/{building}', ModelBinding::class)->name('model');