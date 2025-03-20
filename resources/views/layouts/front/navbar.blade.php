
<div class="container-fluid nav-bar px-0 px-lg-4 py-lg-0">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light"> 
            <a href="{{ URL('/') }}" class="navbar-brand p-0">
                <img src="{{ URL::asset('storage/'.$aplikasi->logo_aplikasis) }}" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-0 mx-lg-auto">
                    @php($active_beranda = '')
                    @php($active_tentang_kami = '')
                    @php($active_layanan = '')
                    @php($active_katalog = '')
                    @php($active_kontak = '')
                    @php($active_lowongan_kerja = '')
                    @if(Request::segment(1) == '' || Request::segment(1) == 'beranda')
                        @php($active_beranda = 'active')
                        @php($active_tentang_kami = '')
                        @php($active_layanan = '')
                        @php($active_katalog = '')
                        @php($active_kontak = '')
                        @php($active_lowongan_kerja = '')
                    @elseif(Request::segment(1) == 'tentang-kami')
                        @php($active_beranda = '')
                        @php($active_tentang_kami = 'active')
                        @php($active_layanan = '')
                        @php($active_katalog = '')
                        @php($active_kontak = '')
                        @php($active_lowongan_kerja = '')
                    @elseif(Request::segment(1) == 'layanan')
                        @php($active_beranda = '')
                        @php($active_tentang_kami = '')
                        @php($active_layanan = 'active')
                        @php($active_katalog = '')
                        @php($active_kontak = '')
                        @php($active_lowongan_kerja = '')
                    @elseif(Request::segment(1) == 'katalog')
                        @php($active_beranda = '')
                        @php($active_tentang_kami = '')
                        @php($active_layanan = '')
                        @php($active_katalog = 'active')
                        @php($active_kontak = '')
                        @php($active_lowongan_kerja = '')
                    @elseif(Request::segment(1) == 'kontak')
                        @php($active_beranda = '')
                        @php($active_tentang_kami = '')
                        @php($active_layanan = '')
                        @php($active_katalog = '')
                        @php($active_kontak = 'active')
                        @php($active_lowongan_kerja = '')
                    @elseif(Request::segment(1) == 'lowongan')
                        @php($active_beranda = '')
                        @php($active_tentang_kami = '')
                        @php($active_layanan = '')
                        @php($active_katalog = '')
                        @php($active_kontak = '')
                        @php($active_lowongan_kerja = 'active')
                    @endif
                    <a href="{{ URL('/') }}" class="nav-item nav-link {{$active_beranda}}">Beranda</a>
                    <a href="{{ URL('/tentang-kami') }}" class="nav-item nav-link {{$active_tentang_kami}}">Tentang</a>
                    <a href="{{ URL('/layanan') }}" class="nav-item nav-link {{$active_layanan}}">Layanan</a>
                    <a href="{{ URL('/katalog') }}" class="nav-item nav-link {{$active_katalog}}">Katalog</a>
                    <a href="{{ URL('/kontak') }}" class="nav-item nav-link {{$active_kontak}}">Kontak</a>
                    <a href="{{ URL('/lowongan-kerja') }}" class="nav-item nav-link {{$active_lowongan_kerja}}">Lowongan</a>
                    <div class="nav-btn px-3">
                        <a href="https://wa.me/{{$kontak->telepon_kontaks}}?text=Hi saya ingin mendapatkan penawaran untuk produk anda" class="btn btn-primary rounded-pill py-2 px-4 ms-3 flex-shrink-0"> Dapatkan Penawaran</a>
                    </div>
                </div>
            </div>
            <div class="d-none d-xl-flex flex-shrink-0 ps-4">
                <a href="https://wa.me/{{$kontak->telepon_kontaks}}" class="btn btn-light btn-lg-square rounded-circle position-relative wow tada" data-wow-delay=".9s">
                    <i class="fa fa-phone-alt fa-2x"></i>
                    <div class="position-absolute" style="top: 7px; right: 12px;">
                        <span><i class="fa fa-comment-dots text-secondary"></i></span>
                    </div>
                </a>
                <div class="d-flex flex-column ms-3">
                    <span>Hubungi Kami</span>
                    <a href="https://wa.me/{{$kontak->telepon_kontaks}}"><span class="text-dark">{{$kontak->telepon_kontaks}}</span></a>
                </div>
            </div>
        </nav>
    </div>
</div>