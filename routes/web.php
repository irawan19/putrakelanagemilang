<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController as Beranda;
use App\Http\Controllers\TentangKamiController as TentangKami;
use App\Http\Controllers\LayananController as Layanan;
use App\Http\Controllers\KatalogController as Katalog;
use App\Http\Controllers\KontakController as Kontak;
use App\Http\Controllers\PenawaranController as Penawaran;

use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\AkunController as AdminAkun;
use App\Http\Controllers\Admin\SlideshowController as AdminSlideshow;
use App\Http\Controllers\Admin\TentangKamiController as AdminTentangKami;
use App\Http\Controllers\Admin\LayananController as AdminLayanan;
use App\Http\Controllers\Admin\PertanyaanUmumController as AdminPertanyaanUmum;
use App\Http\Controllers\Admin\KatalogController as AdminKatalog;
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonial;
use App\Http\Controllers\Admin\SosialMediaController as AdminSosialMedia;
use App\Http\Controllers\Admin\KontakController as AdminKontak;
use App\Http\Controllers\Admin\PesanController as AdminPesan;
use App\Http\Controllers\Admin\PenawaranController as AdminPenawaran;
use App\Http\Controllers\Admin\AdminController as AdminAdmin;
use App\Http\Controllers\Admin\AplikasiController as AdminAplikasi;

Route::get('/', [Beranda::class, 'index']);
Route::get('/beranda', [Beranda::class, 'index']);
Route::get('/tentang-kami', [TentangKami::class, 'index']);
Route::get('/layanan', [Layanan::class, 'index']);
Route::get('/katalog', [Katalog::class, 'index']);
Route::get('/kontak', [Kontak::class, 'index']);
Route::post('/kirim-kontak', [Kontak::class, 'kirim']);
Route::get('/penawaran', [Penawaran::class, 'index']);
Route::post('/kirim-penawaran', [Penawaran::class, 'kirim']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::group(['prefix' => 'dashboard'], function() {
        Route::get('/', [AdminDashboard::class, 'index']);

        Route::group(['prefix' => 'akun'], function() {
            Route::get('/', [AdminAkun::class, 'index']);
            Route::patch('/prosesedit', [AdminAkun::class, 'prosesedit']);
        });

        Route::group(['prefix' => 'slideshow'], function(){
            Route::get('/', [AdminSlideshow::class, 'index']);
            Route::get('/tambah', [AdminSlideshow::class, 'tambah']);
            Route::post('/prosestambah', [AdminSlideshow::class, 'prosestambah']);
            Route::get('/edit/{id}', [AdminSlideshow::class, 'edit']);
            Route::patch('/prosesedit/{id}', [AdminSlideshow::class, 'prosesedit']);
            Route::delete('/hapus/{id}', [AdminSlideshow::class, 'hapus']);
        });

        Route::group(['prefix' => 'tentang-kami'], function(){
            Route::get('/', [AdminTentangKami::class, 'index']);
            Route::get('/tambah', [AdminTentangKami::class, 'tambah']);
            Route::post('/prosestambah', [AdminTentangKami::class, 'prosestambah']);
            Route::get('/edit/{id}', [AdminTentangKami::class, 'edit']);
            Route::patch('/prosesedit/{id}', [AdminTentangKami::class, 'prosesedit']);
            Route::delete('/hapus/{id}', [AdminTentangKami::class, 'hapus']);
        });

        Route::group(['prefix' => 'layanan'], function(){
            Route::get('/', [AdminLayanan::class, 'index']);
            Route::get('/tambah', [AdminLayanan::class, 'tambah']);
            Route::post('/prosestambah', [AdminLayanan::class, 'prosestambah']);
            Route::get('/edit/{id}', [AdminLayanan::class, 'edit']);
            Route::patch('/prosesedit/{id}', [AdminLayanan::class, 'prosesedit']);
            Route::delete('/hapus/{id}', [AdminLayanan::class, 'hapus']);
        });

        Route::group(['prefix' => 'pertanyaan-umum'], function(){
            Route::get('/', [AdminPertanyaanUmum::class, 'index']);
            Route::get('/tambah', [AdminPertanyaanUmum::class, 'tambah']);
            Route::post('/prosestambah', [AdminPertanyaanUmum::class, 'prosestambah']);
            Route::get('/edit/{id}', [AdminPertanyaanUmum::class, 'edit']);
            Route::patch('/prosesedit/{id}', [AdminPertanyaanUmum::class, 'prosesedit']);
            Route::delete('/hapus/{id}', [AdminPertanyaanUmum::class, 'hapus']);
        });

        Route::group(['prefix' => 'katalog'], function(){
            Route::get('/', [AdminKatalog::class, 'index']);
            Route::get('/tambah', [AdminKatalog::class, 'tambah']);
            Route::post('/prosestambah', [AdminKatalog::class, 'prosestambah']);
            Route::get('/edit/{id}', [AdminKatalog::class, 'edit']);
            Route::patch('/prosesedit/{id}', [AdminKatalog::class, 'prosesedit']);
            Route::delete('/hapus/{id}', [AdminKatalog::class, 'hapus']);
        });

        Route::group(['prefix' => 'testimonial'], function(){
            Route::get('/', [AdminTestimonial::class, 'index']);
            Route::get('/tambah', [AdminTestimonial::class, 'tambah']);
            Route::post('/prosestambah', [AdminTestimonial::class, 'prosestambah']);
            Route::get('/edit/{id}', [AdminTestimonial::class, 'edit']);
            Route::patch('/prosesedit/{id}', [AdminTestimonial::class, 'prosesedit']);
            Route::delete('/hapus/{id}', [AdminTestimonial::class, 'hapus']);
        });

        Route::group(['prefix' => 'sosial-media'], function() {
            Route::get('/', [AdminSosialMedia::class, 'index']);
            Route::get('/tambah', [AdminSosialMedia::class, 'tambah']);
            Route::post('/prosestambah', [AdminSosialMedia::class, 'prosestambah']);
            Route::get('/edit/{id}', [AdminSosialMedia::class, 'edit']);
            Route::patch('/prosesedit/{id}', [AdminSosialMedia::class, 'prosesedit']);
            Route::delete('/hapus/{id}', [AdminSosialMedia::class, 'hapus']);
        });

        Route::group(['prefix' => 'kontak'], function() {
            Route::get('/', [AdminKontak::class, 'index']);
            Route::patch('/prosesedit', [AdminKontak::class, 'prosesedit']);
        });

        Route::group(['prefix' => 'pesan'], function() {
            Route::get('/', [AdminPesan::class, 'index']);
            Route::get('/baca/{id}', [AdminPesan::class, 'baca']);
        });

        Route::group(['prefix' => 'penawaran'], function() {
            Route::get('/', [AdminPenawaran::class, 'index']);
            Route::get('/baca/{id}', [AdminPenawaran::class, 'baca']);
        });

        Route::group(['prefix' => 'admin'], function() {
            Route::get('/', [AdminAdmin::class, 'index']);
            Route::get('/tambah', [AdminAdmin::class, 'tambah']);
            Route::post('/prosestambah', [AdminAdmin::class, 'prosestambah']);
            Route::get('/edit/{id}', [AdminAdmin::class, 'edit']);
            Route::patch('/prosesedit/{id}', [AdminAdmin::class, 'prosesedit']);
            Route::delete('/hapus/{id}', [AdminAdmin::class, 'hapus']);
        });

        Route::group(['prefix' => 'aplikasi'], function() {
            Route::get('/', [AdminAplikasi::class, 'index']);
            Route::patch('/prosesedit', [AdminAplikasi::class, 'prosesedit']);
            Route::patch('/proseseditlogo', [AdminAplikasi::class, 'prosesedit']);
            Route::patch('/proseseditlogotext', [AdminAplikasi::class, 'proseseditlogotext']);
            Route::patch('/prosesediticon', [AdminAplikasi::class, 'prosesediticon']);
        });

        Route::get('/logout', [AdminDashboard::class, 'logout']);
    });
});
