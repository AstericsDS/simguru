<?php

use App\Http\Controllers\SsoController;
use App\Http\Middleware\EnsureMicrosoftSession;
use App\Livewire\Form;
use App\Livewire\Debug;
use App\Livewire\Login;
use App\Livewire\LoginAdmin;
use App\Livewire\Ruang;
use App\Livewire\Campus;
use App\Livewire\Gedung;
use App\Livewire\Kampus;
use App\Livewire\Content;
use App\Livewire\Homepage;
use App\Livewire\ListKampus;
use App\Livewire\ListGedung;
use App\Livewire\ListRuang;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\DetailAll;
use App\Livewire\Admin\EditKampus;
use App\Livewire\Admin\EditGedung;
use App\Livewire\Admin\EditRuang;
use App\Livewire\Admin\DaftarRuang;
use App\Livewire\Admin\DaftarGedung;
use App\Livewire\Admin\DaftarKampus;
use App\Livewire\Admin\Rekapitulasi;
use App\Livewire\Admin\PerubahanData;
use App\Livewire\Admin\ViewKampus;
use App\Livewire\Admin\ViewGedung;
use App\Livewire\Admin\ViewRuang;
use App\Livewire\Admin\VerifikasiData;
use App\Livewire\Admin\PeminjamanRuang;
use App\Livewire\Admin\ReservasiRuang;
use App\Livewire\Admin\VerifikasiJadwal;
use App\Livewire\Admin\ManajemenUser;
use App\Livewire\Admin\ViewUser;
use Illuminate\Support\Facades\Route;

// Admin
Route::middleware(EnsureMicrosoftSession::class)->prefix('admin')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/content', Content::class)->name('content');
    Route::get('/kampus', Kampus::class)->name('kampus');
    Route::get('/gedung', Gedung::class)->name('gedung');
    Route::get('/daftar-kampus', DaftarKampus::class)->name('daftar-kampus');
    Route::get('/edit-kampus/{id}', EditKampus::class)->name('edit-kampus');
    Route::get('/daftar-gedung', DaftarGedung::class)->name('daftar-gedung');
    Route::get('/edit-gedung/{id}', EditGedung::class)->name('edit-gedung');
    Route::get('/daftar-ruang', DaftarRuang::class)->name('daftar-ruang');
    Route::get('/edit-ruang/{id}', EditRuang::class)->name('edit-ruang');
    Route::get('/detail-all', DetailAll::class)->name('detail-all');
    Route::get('/perubahan-data', PerubahanData::class)->name('perubahan-data');
    Route::get('/verifikasi-data', VerifikasiData::class)->name('verifikasi-data');
    Route::get('/rekapitulasi', Rekapitulasi::class)->name('rekapitulasi');
    Route::get('/campus', Campus::class)->name('campus');
    Route::get('/peminjaman-ruang', PeminjamanRuang::class)->name('peminjaman-ruang');
    Route::get('/reservasi-ruang/{room}', ReservasiRuang::class)->name('reservasi-ruang');
    Route::get('/verifikasi-jadwal', VerifikasiJadwal::class)->name('verifikasi-jadwal');
    Route::get('/kampus/{id}', ViewKampus::class)->name('view-kampus');
    Route::get('/gedung/{id}', ViewGedung::class)->name('view-gedung');
    Route::get('/ruang/{id}', ViewRuang::class)->name('view-ruang');
    Route::get('/manajemen-user', ManajemenUser::class)->name('manajemen-user');
    Route::get('/user/{user}', ViewUser::class)->name('view-user');
});

// Auth
Route::get('/login', Login::class)->name('login');
Route::get('/login/admin', LoginAdmin::class)->name('login-admin');

// SSO
Route::get('/sso/silent-login', [SsoController::class, 'redirectToProviderSilent'])->name('sso.silent-login');
Route::get('/sso/login', [SsoController::class, 'redirectToProvider'])->name('sso.login');
Route::get('/sso/callback', [SsoController::class, 'handleProviderCallback'])->name('sso.callback');

// Debug API
Route::get('/form', Form::class)->name('form');
Route::get('/debug', Debug::class)->name('debug');

// Public
Route::get('/', Homepage::class)->name('homepage');
Route::get('/kampus', ListKampus::class)->name('listKampus');
Route::get('/gedung', ListGedung::class)->name('listGedung');
Route::get('/ruang', ListRuang::class)->name('listRuang');
Route::get('/kampus/{campus:slug}', Kampus::class)->name('kampus');
Route::get('/gedung/{building:slug}', Gedung::class)->name('gedung');
Route::get('/ruang/{room:slug}', Ruang::class)->name('ruang');
