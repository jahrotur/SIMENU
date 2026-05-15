<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// =======================
// HALAMAN LOGIN
// =======================

Route::get('/login', function () {
    return view('auth.login');
})->name('login');


// =======================
// PROSES LOGIN
// =======================

Route::post('/login', function (Request $request) {

    // nanti bisa tambah validasi database

    return redirect('/dashboard');

})->name('login.post');


// =======================
// HALAMAN DASHBOARD
// =======================

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


// =======================
// HALAMAN AWAL
// =======================

Route::get('/', function () {
    return redirect('/login');
});
Route::get('/', fn() => view('dashboard'))->name('dashboard');

Route::resource('pasien', PasienController::class);
Route::resource('users', UserController::class);
Route::resource('menu', MenuController::class)->except(['show']);

Route::get('/input', fn() => view('input.index'))->name('input.index');
Route::get('/status-menu', fn() => view('menu.status'))->name('menu.status');
Route::get('/cetak-label', fn() => view('label.index'))->name('label.index');
Route::get('/laporan', fn() => view('laporan.index'))->name('laporan.index');
Route::get('/pengaturan', fn() => view('pengaturan.index'))->name('pengaturan.index');
