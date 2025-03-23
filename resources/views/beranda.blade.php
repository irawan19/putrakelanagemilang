@extends('layouts.front.app')
@section('content')

    <div class="header-carousel owl-carousel">
        @foreach($slideshows as $slideshow)
            <div class="header-carousel-item bg-primary">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row g-4 align-items-center">
                            <div class="col-lg-7 animated fadeInLeft">
                                <div class="text-sm-center text-md-start">
                                    <h4 class="text-white text-uppercase fw-bold mb-4">{{ $slideshow->judul_slideshows }}</h4>
                                    <h1 class="display-1 text-white mb-4">{{ $slideshow->text1_slideshows }}</h1>
                                    <p class="mb-5 fs-5">
                                        {{ $slideshow->text2_slideshows }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-5 animated fadeInRight">
                                <div class="calrousel-img" style="object-fit: cover;">
                                    <img src="{{URL::asset('storage/'.$slideshow->gambar_slideshows) }}" class="img-fluid w-100" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Feature Start -->
    <div class="container-fluid feature bg-light py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Tentang Kami</h4>
                <h1 class="display-4 mb-4">{{ $tentang_kami->text1_tentang_kamis }}</h1>
                <p class="mb-0">{{ $tentang_kami->text2_tentang_kamis }}</p>
            </div>
            <div class="row g-4">
                @foreach($tentang_kami_details as $tentang_kami_detail)
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="feature-item p-4 pt-0">
                            <div class="feature-icon p-4 mb-4">
                                <i class="far fa-{{$tentang_kami_detail->icon_tentang_kami_details}} fa-3x"></i>
                            </div>
                            <h4 class="mb-4">{{ $tentang_kami_detail->judul_tentang_kami_details }}</h4>
                            <p class="mb-4">{!! nl2br($tentang_kami_detail->konten_tentang_kami_details) !!}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Feature End -->

    <!-- About Start -->
    <div class="container-fluid bg-light about pb-5">
        <div class="container pb-5">
            <div class="row g-5">
                <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.2s">
                    <div class="bg-white rounded p-5 h-100">
                        <div class="row g-4 justify-content-center">
                            <div class="col-12">
                                <div class="rounded bg-light">
                                    <img src="{{URL::asset('storage/'.$tentang_kami->gambar_tentang_kamis) }}" class="img-fluid rounded w-100" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="about-item-content bg-white rounded p-5 h-100">
                        <h4 class="text-primary">Tentang {{ $aplikasi->nama_aplikasis }}</h4>
                        <p>{!! nl2br($tentang_kami->konten_sekilas_tentang_kamis) !!}
                        </p>
                        <div style="text-align:center; padding-top:20px">
                            <a class="btn btn-primary rounded-pill py-3 px-5" href="{{ URL('/tentang-kami') }}">Kenali Kami Lebih Jauh</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Service Start -->
    <div class="container-fluid service py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Layanan</h4>
                <h1 class="display-4 mb-4">{{ $layanan->text1_layanans }}</h1>
                <p class="mb-0">{{ $layanan->text2_layanans }}</p>
            </div>
            <div class="row g-4 justify-content-center">
                @foreach($layanan_details as $layanan_detail)
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="service-item">
                            <div class="service-img">
                                <img src="{{URL::asset('storage/'.$layanan_detail->gambar_layanan_details) }}" class="img-fluid rounded-top w-100" alt="">
                                <div class="service-icon p-3">
                                    <i class="fa fa-{{$layanan_detail->icon_layanan_details}} fa-2x"></i>
                                </div>
                            </div>
                            <div class="service-content p-4">
                                <div class="service-content-inner">
                                    <a href="#" class="d-inline-block h4 mb-4">{{ $layanan_detail->judul_layanan_details }}</a>
                                    <p class="mb-4">{!! nl2br($layanan_detail->konten_layanan_details) !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Service End -->

    <!-- FAQs Start -->
    <div class="container-fluid faq-section bg-light py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="h-100">
                        <div class="mb-5">
                            <h4 class="text-primary">Pertanyaan</h4>
                            <h1 class="display-4 mb-0">Pertanyaan Umum Yang Sering Diajukan</h1>
                        </div>
                        <div class="accordion" id="accordionExample">
                            @foreach($pertanyaan_umums as $pertanyaan_umum)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button border-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            P: {{ $pertanyaan_umum->pertanyaan_pertanyaan_umums }}
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show active" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body rounded">
                                            J: {!! nl2br($pertanyaan_umum->jawaban_pertanyaan_umums) !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.4s">
                    <img src="{{URL::asset('template/front/img/faq.png') }}" class="img-fluid w-100" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- FAQs End -->

    <!-- Katalog Start -->
    <div class="container-fluid team py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Katalog</h4>
            <h1 class="display-4 mb-4">Produk Terbaru Dari Kami</h1>
            <p class="mb-0">Berikut beberapa produk terbaru yang kami jual</p>
        </div>
        <div class="row g-4 justify-content-center">
            @foreach($katalogs->data as $katalog)
                <div class="col-md-2 col-lg-2 col-xl-2 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="team-item">
                        <a data-fancybox="gallery" href="{{URL::asset('storage/'.$aplikasi->logo_text_aplikasis)}}" data-caption="{{$katalog->nama_barangs}}">
                            <div class="team-img">
                                @if($katalog->foto_barangs == '')
                                    <img src="{{URL::asset('storage/'.$aplikasi->logo_text_aplikasis) }}" class="img-fluid rounded-top w-100" alt="">
                                @else
                                    <img src="{{URL::asset('https://penawaran.putrakelanagemilang.com/storage/'.$katalog->foto_barangs) }}" class="img-fluid rounded-top w-100" alt="">
                                @endif
                            </div>
                        </a>
                        <div class="team-title p-4">
                            <h4 class="mb-0">{{ $katalog->nama_barangs }}</h4>
                            <p class="mb-0" style="color:#c2c2c2">Merk&nbsp;: {{ $katalog->nama_merks }}</p>
                            <p class="mb-0" style="color:#c2c2c2">Tipe&nbsp;&nbsp;: {{ $katalog->nama_tipes }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
            <div style="text-align:center; padding-top:20px">
                <a class="btn btn-primary rounded-pill py-3 px-5" href="{{ URL('/katalog') }}">Lihat semua produk</a>
            </div>
        </div>
    </div>
    <!-- Katalog End -->

    <!-- Testimonial Start -->
    <div class="container-fluid testimonial pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Testimonial</h4>
                <h1 class="display-4 mb-4">Apa Kata Mereka</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.2s">
                @foreach($testimonials as $testimonial)
                    <div class="testimonial-item bg-light rounded">
                        <div class="row g-0">
                            <div class="col-4  col-lg-4 col-xl-3">
                                <div class="h-100">
                                    @if($testimonial->gambar_testimonials != 'template/front/img/testimonial.png')
                                        <img src="{{URL::asset('storage/'.$testimonial->gambar_testimonials) }}" class="img-fluid h-100 rounded" style="object-fit: cover;" alt="">
                                    @else
                                        <img src="{{URL::asset('template/front/img/testimonial.png') }}" class="img-fluid h-100 rounded" style="object-fit: cover;" alt="">
                                    @endif                                
                                </div>
                            </div>
                            <div class="col-8 col-lg-8 col-xl-9">
                                <div class="d-flex flex-column my-auto text-start p-4">
                                    <h4 class="text-dark mb-0">{{ $testimonial->nama_testimonials }}</h4>
                                    <p class="mb-3">{{ $testimonial->jabatan_testimonials }}</p>
                                    <p class="mb-0">{!! nl2br($testimonial->konten_testimonials) !!}</p>
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