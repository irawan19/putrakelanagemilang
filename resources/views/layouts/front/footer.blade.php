@php($tentang_kami= \App\Models\Tentang_kami::first())
<div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-xl-9">
                <div class="mb-5">
                    <div class="row g-4">
                        <div class="col-md-6 col-lg-6 col-xl-5">
                            <div class="footer-item">
                                <a href="index.html" class="p-0">
                                    <h3 class="text-white"> {{ $aplikasi->nama_aplikasis }}</h3>
                                </a>
                                <p class="text-white mb-4">
                                    {!! nl2br($tentang_kami->konten_footer_tentang_kamis) !!}
                                </p>
                                <div class="footer-btn d-flex">
                                    @foreach($sosial_medias as $sosial_media)
                                        <a class="btn btn-md-square rounded-circle me-3" href="{{ $sosial_media->url_sosial_media }}" target="_blank"><i class="fab fa-{{$sosial_media->icon_sosial_medias}}"></i></a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="footer-item">
                                <h4 class="text-white mb-4">Link</h4>
                                <a href="{{ URL('/') }}"><i class="fas fa-angle-right me-2"></i> Beranda</a>
                                <a href="{{ URL('/tentang-kami') }}"><i class="fas fa-angle-right me-2"></i> Tentang</a>
                                <a href="{{ URL('/layanan') }}"><i class="fas fa-angle-right me-2"></i> Layanan</a>
                                <a href="{{ URL('/katalog') }}"><i class="fas fa-angle-right me-2"></i> Katalog</a>
                                <a href="{{ URL('/kontak') }}"><i class="fas fa-angle-right me-2"></i> Kontak</a>
                                <a href="{{ URL('/lowongan-kerja') }}"><i class="fas fa-angle-right me-2"></i> Lowongan Kerja</a>
                                <a href="{{ URL('/sitemap') }}"><i class="fas fa-angle-right me-2"></i> Sitemap</a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-4">
                            <div class="footer-item">
                                <h4 class="mb-4 text-white">Galeri</h4>
                                <div class="row g-3">
                                    @foreach($galeris as $galeri)
                                        <div class="col-4">
                                            <div class="footer-instagram rounded">
                                                <img src="{{ URL::asset('storage/'.$galeri->foto_galeris) }}" class="img-fluid w-100" alt="{{ $galeri->judul_galeris }}">
                                                <div class="footer-search-icon">
                                                    <a href="{{ URL::asset('storage/'.$galeri->foto_galeris) }}" data-lightbox="footerInstagram-1" class="my-auto"><i class="fas fa-link text-white"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pt-5" style="border-top: 1px solid rgba(255, 255, 255, 0.08);">
                    <div class="row g-0">
                        <div class="col-12">
                            <div class="row g-4">
                                <div class="col-lg-6 col-xl-4">
                                    <div class="d-flex">
                                        <div class="btn-xl-square bg-primary text-white rounded p-4 me-4">
                                            <i class="fas fa-map-marker-alt fa-2x"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-white">Alamat</h4>
                                            <p class="mb-0">{!! $kontak->alamat_kontaks !!}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-4">
                                    <div class="d-flex">
                                        <div class="btn-xl-square bg-primary text-white rounded p-4 me-4">
                                            <i class="fas fa-envelope fa-2x"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-white">Email</h4>
                                            <p class="mb-0">{{$kontak->email_kontaks}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-4">
                                    <div class="d-flex">
                                        <div class="btn-xl-square bg-primary text-white rounded p-4 me-4">
                                            <i class="fa fa-phone-alt fa-2x"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-white">Telepon</h4>
                                            <p class="mb-0">{{$kontak->telepon_kontaks}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-3">
                <div class="footer-item">
                    <h4 class="text-white mb-4">Penawaran</h4>
                    <p class="text-white mb-3">Silahkan klik tombol dibawah untuk mendapatkan penawaran terbaik dari kami atau hubungi ke no telepon kami.</p>
                    <div class="position-relative rounded-pill mb-4">
                        <a href="{{ URL('/kontak') }}" class="btn btn-primary rounded-pill text-white py-2 px-4 ms-3 flex-shrink-0"> Dapatkan Penawaran</a>
                    </div>
                    <div class="d-flex flex-shrink-0">
                        <div class="footer-btn">
                            <a href="https://wa.me/{{ $kontak->telepon_kontaks }}" class="btn btn-lg-square rounded-circle position-relative wow tada" data-wow-delay=".9s">
                                <i class="fa fa-phone-alt fa-2x"></i>
                                <div class="position-absolute" style="top: 2px; right: 12px;">
                                    <span><i class="fa fa-comment-dots text-secondary"></i></span>
                                </div>
                            </a>
                        </div>
                        <div class="d-flex flex-column ms-3 flex-shrink-0">
                            <span>Hubungi Kami</span>
                            <a href="https://wa.me/{{ $kontak->telepon_kontaks }}"><span class="text-white">{{ $kontak->telepon_kontaks }}</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>