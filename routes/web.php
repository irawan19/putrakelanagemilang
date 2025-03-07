<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController as Beranda;

use App\Http\Controllers\Admin\DashboardController as Dashboard;

Route::get('/', [Beranda::class, 'index']);
Route::get('/beranda', [Beranda::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::group(['prefix' => 'dashboard'], function() {
        Route::get('/', [Dashboard::class, 'index']);
    });
});
