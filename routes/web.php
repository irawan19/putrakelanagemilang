<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController as Beranda;

Route::get('/', [Beranda::class, 'index']);
Route::get('/beranda', [Beranda::class, 'index']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
