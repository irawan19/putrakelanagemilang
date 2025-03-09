<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController as Beranda;

use App\Http\Controllers\Admin\DashboardController as Dashboard;
use App\Http\Controllers\Admin\AkunController as Akun;
use App\Http\Controllers\Admin\SlideshowController as Slideshow;
use App\Http\Controllers\Admin\SosialMediaController as SosialMedia;
use App\Http\Controllers\Admin\KontakController as Kontak;
use App\Http\Controllers\Admin\PesanController as Pesan;
use App\Http\Controllers\Admin\AdminController as Admin;
use App\Http\Controllers\Admin\AplikasiController as Aplikasi;

Route::get('/', [Beranda::class, 'index']);
Route::get('/beranda', [Beranda::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::group(['prefix' => 'dashboard'], function() {
        Route::get('/', [Dashboard::class, 'index']);

        Route::group(['prefix' => 'akun'], function() {
            Route::get('/', [Akun::class, 'index']);
            Route::patch('/prosesedit', [Akun::class, 'prosesedit']);
        });

        Route::group(['prefix' => 'slideshow'], function(){
            Route::get('/', [Slideshow::class, 'index']);
            Route::get('/tambah', [Slideshow::class, 'tambah']);
            Route::post('/prosestambah', [Slideshow::class, 'prosestambah']);
            Route::get('/edit/{id}', [Slideshow::class, 'edit']);
            Route::patch('/prosesedit/{id}', [Slideshow::class, 'prosesedit']);
            Route::delete('/hapus/{id}', [Slideshow::class, 'hapus']);
        });

        Route::group(['prefix' => 'sosial-media'], function() {
            Route::get('/', [SosialMedia::class, 'index']);
            Route::get('/tambah', [SosialMedia::class, 'tambah']);
            Route::post('/prosestambah', [SosialMedia::class, 'prosestambah']);
            Route::get('/edit/{id}', [SosialMedia::class, 'edit']);
            Route::patch('/prosesedit/{id}', [SosialMedia::class, 'prosesedit']);
            Route::delete('/hapus/{id}', [SosialMedia::class, 'hapus']);
        });

        Route::group(['prefix' => 'kontak'], function() {
            Route::get('/', [Kontak::class, 'index']);
            Route::patch('/prosesedit', [Kontak::class, 'prosesedit']);
        });

        Route::group(['prefix' => 'pesan'], function() {
            Route::get('/', [Pesan::class, 'index']);
            Route::get('/baca/{id}', [Pesan::class, 'baca']);
        });

        Route::group(['prefix' => 'admin'], function() {
            Route::get('/', [Admin::class, 'index']);
            Route::get('/tambah', [Admin::class, 'tambah']);
            Route::post('/prosestambah', [Admin::class, 'prosestambah']);
            Route::get('/edit/{id}', [Admin::class, 'edit']);
            Route::patch('/prosesedit/{id}', [Admin::class, 'prosesedit']);
            Route::delete('/hapus/{id}', [Admin::class, 'hapus']);
        });

        Route::group(['prefix' => 'aplikasi'], function() {
            Route::get('/', [Aplikasi::class, 'index']);
            Route::patch('/prosesedit', [Aplikasi::class, 'prosesedit']);
            Route::patch('/proseseditlogo', [Aplikasi::class, 'prosesedit']);
            Route::patch('/proseseditlogotext', [Aplikasi::class, 'proseseditlogotext']);
            Route::patch('/prosesediticon', [Aplikasi::class, 'prosesediticon']);
        });

        Route::get('/logout', [Dashboard::class, 'logout']);
    });
});
