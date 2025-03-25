<?php

use App\Livewire\Login;
use Illuminate\Support\Facades\Route;

Route::get('/login', Login::class)->name('login');

Route::get('/', function(){
    return view('welcome');
});
