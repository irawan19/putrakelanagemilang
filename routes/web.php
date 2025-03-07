<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController as Beranda;

use App\Http\Controllers\Admin\DashboardController as Dashboard;
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
