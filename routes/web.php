<?php

use Illuminate\Support\Facades\Route;

use Carbon\Carbon;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

use App\Http\Controllers\BerandaController as Beranda;
use App\Http\Controllers\TentangKamiController as TentangKami;
use App\Http\Controllers\LayananController as Layanan;
use App\Http\Controllers\KatalogController as Katalog;
use App\Http\Controllers\KontakController as Kontak;
use App\Http\Controllers\LowonganKerjaController as LowonganKerja;

use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\AkunController as AdminAkun;
use App\Http\Controllers\Admin\SlideshowController as AdminSlideshow;
use App\Http\Controllers\Admin\TentangKamiController as AdminTentangKami;
use App\Http\Controllers\Admin\GaleriController as AdminGaleri;
use App\Http\Controllers\Admin\LayananController as AdminLayanan;
use App\Http\Controllers\Admin\PertanyaanUmumController as AdminPertanyaanUmum;
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonial;
use App\Http\Controllers\Admin\SosialMediaController as AdminSosialMedia;
use App\Http\Controllers\Admin\KontakController as AdminKontak;
use App\Http\Controllers\Admin\LowonganKerjaController as AdminLowonganKerja;
use App\Http\Controllers\Admin\PesanController as AdminPesan;
use App\Http\Controllers\Admin\AdminController as AdminAdmin;
use App\Http\Controllers\Admin\AplikasiController as AdminAplikasi;


Route::get('/storage-link', function() {
    Artisan::call('storage:link'); 
    return 'The links have been created.';
});

Route::get('/', [Beranda::class, 'index']);
Route::get('/beranda', [Beranda::class, 'index']);
Route::get('/tentang-kami', [TentangKami::class, 'index']);
Route::get('/layanan', [Layanan::class, 'index']);
Route::get('/katalog', [Katalog::class, 'index']);
Route::get('/kontak', [Kontak::class, 'index']);
Route::post('/kirim-pesan', [Kontak::class, 'kirim']);
Route::get('/lowongan-kerja', [LowonganKerja::class, 'index']);
Route::get('/lowongan-kerja/detail/{slug}', [LowonganKerja::class, 'detail']);
Route::post('/kirim-lowongan-kerja/{slug}', [LowonganKerja::class, 'kirim']);

Route::get('/sitemap', function(){
    $urlsitemap = 'https://www.putrakelanagemilang.com';
    $sitemap = SitemapGenerator::create($urlsitemap)
                                ->getSitemap()
                                ->add(Url::create('/'))
                                ->add(Url::create('/beranda'))
                                ->add(Url::create('/tentang-kami'))
                                ->add(Url::create('/layanan'))
                                ->add(Url::create('/katalog'))
                                ->add(Url::create('/kontak'))
                                ->add(Url::create('/lowongan-kerja'))
                                ->add(Url::create('/penawaran'));
    $sitemap->writeToFile(public_path('sitemap.xml'));
	return redirect('sitemap.xml');
});


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
            Route::patch('/prosesedit', [AdminTentangKami::class, 'prosesedit']);
            Route::get('/tambahdetail', [AdminTentangKami::class, 'tambahdetail']);
            Route::post('/prosestambahdetail', [AdminTentangKami::class, 'prosestambahdetail']);
            Route::get('/editdetail/{id}', [AdminTentangKami::class, 'editdetail']);
            Route::patch('/proseseditdetail/{id}', [AdminTentangKami::class, 'proseseditdetail']);
            Route::delete('/hapusdetail/{id}', [AdminTentangKami::class, 'hapusdetail']);
        });

        Route::group(['prefix' => 'galeri'], function() {
            Route::get('/', [AdminGaleri::class, 'index']);
            Route::get('/tambah', [AdminGaleri::class, 'tambah']);
            Route::post('/prosestambah', [AdminGaleri::class, 'prosestambah']);
            Route::get('/edit/{id}', [AdminGaleri::class, 'edit']);
            Route::patch('/prosesedit/{id}', [AdminGaleri::class, 'prosesedit']);
            Route::delete('/hapus/{id}', [AdminGaleri::class, 'hapus']);
        });

        Route::group(['prefix' => 'layanan'], function(){
            Route::get('/', [AdminLayanan::class, 'index']);
            Route::patch('/prosesedit', [AdminLayanan::class, 'prosesedit']);
            Route::get('/tambahdetail', [AdminLayanan::class, 'tambahdetail']);
            Route::post('/prosestambahdetail', [AdminLayanan::class, 'prosestambahdetail']);
            Route::get('/editdetail/{id}', [AdminLayanan::class, 'editdetail']);
            Route::patch('/proseseditdetail/{id}', [AdminLayanan::class, 'proseseditdetail']);
            Route::delete('/hapusdetail/{id}', [AdminLayanan::class, 'hapusdetail']);
        });

        Route::group(['prefix' => 'pertanyaan-umum'], function(){
            Route::get('/', [AdminPertanyaanUmum::class, 'index']);
            Route::get('/tambah', [AdminPertanyaanUmum::class, 'tambah']);
            Route::post('/prosestambah', [AdminPertanyaanUmum::class, 'prosestambah']);
            Route::get('/edit/{id}', [AdminPertanyaanUmum::class, 'edit']);
            Route::patch('/prosesedit/{id}', [AdminPertanyaanUmum::class, 'prosesedit']);
            Route::delete('/hapus/{id}', [AdminPertanyaanUmum::class, 'hapus']);
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

        Route::group(['prefix' => 'lowongan-kerja'], function() {
            Route::get('/', [AdminLowonganKerja::class, 'index']);
            Route::get('/tambah', [AdminLowonganKerja::class, 'tambah']);
            Route::post('/prosestambah', [AdminLowonganKerja::class, 'prosestambah']);
            Route::get('/baca/{id}', [AdminLowonganKerja::class, 'baca']);
            Route::get('/edit/{id}', [AdminLowonganKerja::class, 'edit']);
            Route::patch('/prosesedit/{id}', [AdminLowonganKerja::class, 'prosesedit']);
            Route::delete('/hapus/{id}', [AdminLowonganKerja::class, 'hapus']);
        });

        Route::group(['prefix' => 'pesan'], function() {
            Route::get('/', [AdminPesan::class, 'index']);
            Route::get('/baca/{id}', [AdminPesan::class, 'baca']);
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
            Route::patch('/proseseditheader', [AdminAplikasi::class, 'proseseditheader']);
        });

        Route::get('/logout', [AdminDashboard::class, 'logout']);
    });
});
