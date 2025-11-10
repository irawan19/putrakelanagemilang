@extends('layouts.front.app')
@section('content')

    <!-- Hero Section - Elegant Medical Store -->
    <div class="header-carousel owl-carousel">
        @foreach($slideshows as $slideshow)
            <div class="header-carousel-item">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row g-5 align-items-center min-vh-90">
                            <div class="col-lg-7">
                                <div class="hero-content text-white text-center text-lg-start">
                                    <span class="hero-badge wow fadeInDown" data-wow-delay="0.2s">
                                        <i class="fas fa-certificate me-2"></i>{{ $slideshow->judul_slideshows }}
                                    </span>
                                    <h1 class="hero-title wow fadeInUp" data-wow-delay="0.3s">
                                        {{ $slideshow->text1_slideshows }}
                                    </h1>
                                    <p class="hero-subtitle wow fadeInUp" data-wow-delay="0.5s">
                                        {{ $slideshow->text2_slideshows }}
                                    </p>
                                    <div class="hero-buttons d-flex flex-wrap gap-3 mt-4 wow fadeInUp justify-content-center justify-content-lg-start" data-wow-delay="0.7s">
                                        <a href="{{ URL('/katalog') }}" class="btn btn-medical">
                                            <i class="fas fa-shopping-cart me-2"></i>Lihat Produk
                                        </a>
                                        <a href="https://wa.me/{{$kontak->telepon_kontaks}}?text=Halo, saya tertarik dengan produk alat kesehatan Anda" class="btn btn-medical-outline" target="_blank">
                                            <i class="fab fa-whatsapp me-2"></i>Konsultasi Gratis
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="hero-image-wrapper float-animation">
                                    <img src="{{URL::asset('storage/'.$slideshow->gambar_slideshows) }}" class="img-fluid rounded-4 shadow-lg" alt="{{ $slideshow->judul_slideshows }}" loading="eager" fetchpriority="high" style="border: 5px solid rgba(255,255,255,0.2);">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Feature Start - Elegant Cards -->
    <div class="container-fluid feature bg-light py-5" style="background: linear-gradient(180deg, #ffffff 0%, #f0f9ff 100%);">
        <div class="container py-5">
            <div class="section-header text-center mx-auto wow fadeInUp" data-wow-delay="0.2s">
                <span class="section-badge">
                    <i class="fas fa-star me-2"></i>Tentang Kami
                </span>
                <h1 class="section-title">{{ $tentang_kami->text1_tentang_kamis }}</h1>
                <p class="lead text-muted">{{ $tentang_kami->text2_tentang_kamis }}</p>
            </div>
            <div class="row g-4">
                @foreach($tentang_kami_details as $index => $tentang_kami_detail)
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="{{ 0.2 + ($index * 0.1) }}s">
                        <div class="feature-card">
                            <div class="feature-icon-wrapper">
                                <i class="far fa-{{$tentang_kami_detail->icon_tentang_kami_details}}"></i>
                            </div>
                            <h4 class="mb-3 fw-bold" style="color: var(--medical-dark);">{{ $tentang_kami_detail->judul_tentang_kami_details }}</h4>
                            <p class="mb-0 text-muted">{!! nl2br($tentang_kami_detail->konten_tentang_kami_details) !!}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- SEO Content untuk Alkes Magelang -->
            <div class="row mt-5">
                <div class="col-12">
                    <div class="text-center wow fadeInUp" data-wow-delay="0.4s">
                        <h2 class="h4 mb-3" style="color: var(--medical-dark);">Distributor Alkes Magelang Terpercaya</h2>
                        <p class="text-muted mb-0" style="line-height: 1.8;">
                            Sebagai <strong>distributor alkes Magelang</strong> terpercaya, PT. Putra Kelana Gemilang menyediakan berbagai macam <strong>alat kesehatan Magelang</strong> berkualitas tinggi untuk memenuhi kebutuhan rumah sakit, klinik, dan fasilitas kesehatan di <strong>Magelang, Jawa Tengah</strong>. Kami adalah <strong>supplier alat kesehatan Magelang</strong> yang telah dipercaya oleh berbagai institusi kesehatan di seluruh Indonesia.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->

    <!-- About Start - Elegant Section -->
    <div class="container-fluid bg-light about pb-5" style="background: white;">
        <div class="container pb-5">
            <div class="row g-5 align-items-center">
                <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.2s">
                    <div class="position-relative">
                        <div class="rounded-4 overflow-hidden shadow-lg">
                            <img src="{{URL::asset('storage/'.$tentang_kami->gambar_tentang_kamis) }}" class="img-fluid w-100" alt="Distributor Alkes Magelang - PT. Putra Kelana Gemilang" loading="lazy" style="transition: transform 0.6s ease;">
                        </div>
                        <div class="position-absolute top-0 start-0 m-4">
                            <div class="bg-white rounded-3 p-3 shadow" style="background: var(--medical-gradient); color: white;">
                                <i class="fas fa-award fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="ps-xl-4">
                        <span class="section-badge">
                            <i class="fas fa-info-circle me-2"></i>Tentang Kami
                        </span>
                        <h2 class="section-title text-start mb-4" style="font-size: 2.5rem;">Tentang {{ $aplikasi->nama_aplikasis }} - Distributor Alkes Magelang</h2>
                        <p class="lead text-muted mb-4" style="line-height: 1.8;">{!! nl2br($tentang_kami->konten_sekilas_tentang_kamis) !!}</p>
                        <p class="text-muted mb-4" style="line-height: 1.8;">
                            Sebagai <strong>distributor alkes Magelang</strong> yang berpengalaman, kami berkomitmen menyediakan <strong>alat kesehatan Magelang</strong> berkualitas tinggi dengan harga kompetitif. Melayani kebutuhan <strong>alkes Magelang Jawa Tengah</strong> untuk rumah sakit, klinik, puskesmas, dan fasilitas kesehatan lainnya.
                        </p>
                        <div class="d-flex flex-wrap gap-3">
                            <a class="btn btn-medical" href="{{ URL('/tentang-kami') }}">
                                <i class="fas fa-arrow-right me-2"></i>Kenali Kami Lebih Jauh
                            </a>
                            <a class="btn btn-medical-outline" href="{{ URL('/kontak') }}" style="border-color: var(--medical-primary); color: var(--medical-primary);">
                                <i class="fas fa-phone me-2"></i>Hubungi Kami
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Service Start - Modern Cards -->
    <div class="container-fluid service py-5" style="background: white;">
        <div class="container py-5">
            <div class="section-header text-center mx-auto wow fadeInUp" data-wow-delay="0.2s">
                <span class="section-badge">
                    <i class="fas fa-concierge-bell me-2"></i>Layanan Kami
                </span>
                <h1 class="section-title">{{ $layanan->text1_layanans }}</h1>
                <p class="lead text-muted">{{ $layanan->text2_layanans }}</p>
            </div>
            <div class="row g-4 justify-content-center">
                @foreach($layanan_details as $index => $layanan_detail)
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="{{ 0.2 + ($index * 0.1) }}s">
                        <div class="service-card-medical">
                            <div class="service-image-medical">
                                <img src="{{URL::asset('storage/'.$layanan_detail->gambar_layanan_details) }}" class="img-fluid w-100 h-100" style="object-fit: cover;" alt="{{ $layanan_detail->judul_layanan_details }}" loading="lazy">
                                <div class="service-icon-medical">
                                    <i class="fa fa-{{$layanan_detail->icon_layanan_details}}"></i>
                                </div>
                            </div>
                            <div class="p-4 pt-5">
                                <h4 class="mb-3 fw-bold" style="color: var(--medical-dark);">{{ $layanan_detail->judul_layanan_details }}</h4>
                                <p class="mb-0 text-muted">{!! nl2br($layanan_detail->konten_layanan_details) !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Service End -->

    <!-- FAQs Start - Elegant Accordion -->
    <div class="container-fluid faq-section bg-light py-5" style="background: linear-gradient(180deg, #f0f9ff 0%, #ffffff 100%);">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="h-100">
                        <div class="mb-5">
                            <span class="section-badge">
                                <i class="fas fa-question-circle me-2"></i>Pertanyaan
                            </span>
                            <h1 class="section-title text-start mb-3">Pertanyaan Umum Yang Sering Diajukan</h1>
                            <p class="lead text-muted">Temukan jawaban untuk pertanyaan yang sering ditanyakan tentang produk dan layanan kami</p>
                        </div>
                        <div class="accordion accordion-medical" id="accordionExample">
                            @foreach($pertanyaan_umums as $index => $pertanyaan_umum)
                                <div class="accordion-item border-0 mb-3 rounded-3 shadow-sm">
                                    <h2 class="accordion-header" id="heading{{ $index }}">
                                        <button class="accordion-button {{ $index === 0 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">
                                            <i class="fas fa-question-circle text-primary me-3"></i>
                                            {{ $pertanyaan_umum->pertanyaan_pertanyaan_umums }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" aria-labelledby="heading{{ $index }}" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <i class="fas fa-check-circle text-primary me-2"></i>
                                            {!! nl2br($pertanyaan_umum->jawaban_pertanyaan_umums) !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.4s">
                    <div class="text-center">
                        <img src="{{URL::asset('template/front/img/faq.png') }}" class="img-fluid rounded-4 shadow-lg float-animation" alt="FAQ" loading="lazy" style="max-width: 100%;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FAQs End -->

    <!-- Katalog Start - Elegant Product Cards -->
    <div class="container-fluid team py-5" style="background: linear-gradient(180deg, #f0f9ff 0%, #ffffff 100%);">
        <div class="container py-5">
            <div class="section-header text-center mx-auto wow fadeInUp" data-wow-delay="0.2s">
                <span class="section-badge">
                    <i class="fas fa-box me-2"></i>Produk Terbaru
                </span>
                <h1 class="section-title">Katalog Alkes Magelang - Produk Terbaru Dari Kami</h1>
                <p class="lead text-muted">Berikut beberapa produk alkes Magelang terbaru yang kami jual untuk kebutuhan medis di Magelang, Jawa Tengah</p>
            </div>
            <div class="row g-4 justify-content-center">
                @if(isset($katalogs->data) && count($katalogs->data) > 0)
                    @foreach($katalogs->data as $index => $katalog)
                        <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="{{ 0.2 + ($index * 0.1) }}s">
                            <div class="product-card-medical">
                                <a data-fancybox="gallery" href="{{ $katalog->foto_barangs != '' ? URL::asset('https://penawaran.putrakelanagemilang.com/storage/'.$katalog->foto_barangs) : URL::asset('storage/'.$aplikasi->logo_text_aplikasis) }}" data-caption="{{$katalog->nama_barangs}}">
                                    <div class="product-image-wrapper">
                                        @if($katalog->foto_barangs == '')
                                            <img src="{{URL::asset('storage/'.$aplikasi->logo_text_aplikasis) }}" class="img-fluid w-100 h-100" style="object-fit: cover;" alt="{{ $katalog->nama_barangs }}" loading="lazy">
                                        @else
                                            <img src="{{URL::asset('https://penawaran.putrakelanagemilang.com/storage/'.$katalog->foto_barangs) }}" class="img-fluid w-100 h-100" style="object-fit: cover;" alt="{{ $katalog->nama_barangs }}" loading="lazy">
                                        @endif
                                        <div class="product-overlay-medical">
                                            <i class="fas fa-search-plus"></i>
                                        </div>
                                    </div>
                                </a>
                                <div class="p-4">
                                    <h5 class="mb-2 fw-bold" style="color: var(--medical-dark);">{{ $katalog->nama_barangs }}</h5>
                                    <div class="d-flex flex-column gap-1">
                                        <small class="text-muted"><i class="fas fa-tag me-1"></i>Merk: <strong>{{ $katalog->nama_merks }}</strong></small>
                                        <small class="text-muted"><i class="fas fa-cog me-1"></i>Tipe: <strong>{{ $katalog->nama_tipes }}</strong></small>
                                    </div>
                                    <a href="https://wa.me/{{$kontak->telepon_kontaks}}?text=Halo, saya tertarik dengan produk {{ $katalog->nama_barangs }}" class="btn btn-sm btn-medical w-100 mt-3" target="_blank">
                                        <i class="fab fa-whatsapp me-2"></i>WhatsApp
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 text-center">
                        <p class="text-muted">Tidak ada produk tersedia saat ini.</p>
                    </div>
                @endif
            </div>
            <div class="text-center mt-5 wow fadeInUp" data-wow-delay="0.5s">
                <a class="btn btn-medical btn-lg px-5" href="{{ URL('/katalog') }}">
                    <i class="fas fa-th-large me-2"></i>Lihat Semua Produk
                </a>
            </div>
        </div>
    </div>
    <!-- Katalog End -->

    <!-- Testimonial Start - Elegant Cards -->
    <div class="container-fluid testimonial pb-5" style="background: white;">
        <div class="container pb-5">
            <div class="section-header text-center mx-auto wow fadeInUp" data-wow-delay="0.2s">
                <span class="section-badge">
                    <i class="fas fa-quote-left me-2"></i>Testimonial
                </span>
                <h1 class="section-title">Apa Kata Mereka</h1>
                <p class="lead text-muted">Testimoni dari pelanggan yang puas dengan layanan kami</p>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.3s">
                @foreach($testimonials as $testimonial)
                    <div class="testimonial-card-medical">
                        <div class="row g-0">
                            <div class="col-4 col-lg-4 col-xl-3">
                                <div class="testimonial-image-wrapper position-relative h-100">
                                    @if($testimonial->gambar_testimonials != 'template/front/img/testimonial.png')
                                        <img src="{{URL::asset('storage/'.$testimonial->gambar_testimonials) }}" class="img-fluid h-100 w-100" style="object-fit: cover;" alt="{{ $testimonial->nama_testimonials }}" loading="lazy">
                                    @else
                                        <img src="{{URL::asset('template/front/img/testimonial.png') }}" class="img-fluid h-100 w-100" style="object-fit: cover;" alt="{{ $testimonial->nama_testimonials }}" loading="lazy">
                                    @endif
                                    <div class="testimonial-rating-overlay">
                                        <div class="testimonial-rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-8 col-lg-8 col-xl-9">
                                <div class="d-flex flex-column h-100 p-4">
                                    <div class="mb-3">
                                        <i class="fas fa-quote-left text-primary mb-2" style="font-size: 1.5rem; opacity: 0.3;"></i>
                                    </div>
                                    <p class="mb-auto text-muted" style="line-height: 1.8;">{!! nl2br($testimonial->konten_testimonials) !!}</p>
                                    <div class="mt-3 pt-3 border-top">
                                        <h5 class="mb-1 fw-bold" style="color: var(--medical-dark);">{{ $testimonial->nama_testimonials }}</h5>
                                        <small class="text-muted"><i class="fas fa-briefcase me-1"></i>{{ $testimonial->jabatan_testimonials }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

@endsection