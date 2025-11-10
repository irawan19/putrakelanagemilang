<div class="container-fluid nav-bar px-0 px-lg-4 py-lg-0">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a href="{{ URL('/') }}" class="navbar-brand p-0 d-flex align-items-center">
                <img src="{{ URL::asset('storage/'.$aplikasi->logo_aplikasis) }}" alt="{{ $aplikasi->nama_aplikasis }}" loading="eager" style="max-height: 65px; transition: transform 0.3s ease;" class="logo-img">
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    @php($active_beranda = Request::segment(1) == '' || Request::segment(1) == 'beranda' ? 'active' : '')
                    @php($active_tentang_kami = Request::segment(1) == 'tentang-kami' ? 'active' : '')
                    @php($active_layanan = Request::segment(1) == 'layanan' ? 'active' : '')
                    @php($active_katalog = Request::segment(1) == 'katalog' ? 'active' : '')
                    @php($active_kontak = Request::segment(1) == 'kontak' ? 'active' : '')
                    @php($active_lowongan_kerja = Request::segment(1) == 'lowongan-kerja' ? 'active' : '')
                    
                    <a href="{{ URL('/') }}" class="nav-item nav-link {{$active_beranda}}">
                        <i class="fas fa-home me-1"></i>Beranda
                    </a>
                    <a href="{{ URL('/tentang-kami') }}" class="nav-item nav-link {{$active_tentang_kami}}">
                        <i class="fas fa-info-circle me-1"></i>Tentang
                    </a>
                    <a href="{{ URL('/layanan') }}" class="nav-item nav-link {{$active_layanan}}">
                        <i class="fas fa-concierge-bell me-1"></i>Layanan
                    </a>
                    <a href="{{ URL('/katalog') }}" class="nav-item nav-link {{$active_katalog}}">
                        <i class="fas fa-box me-1"></i>Produk
                    </a>
                    <a href="{{ URL('/lowongan-kerja') }}" class="nav-item nav-link {{$active_lowongan_kerja}}">
                        <i class="fas fa-briefcase me-1"></i>Lowongan
                    </a>
                    <a href="{{ URL('/kontak') }}" class="nav-item nav-link {{$active_kontak}}">
                        <i class="fas fa-envelope me-1"></i>Kontak
                    </a>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <a href="https://wa.me/{{$kontak->telepon_kontaks}}?text=Halo, saya tertarik dengan produk alat kesehatan Anda" class="btn btn-medical d-none d-lg-flex align-items-center gap-2 ms-lg-4" target="_blank">
                        <i class="fab fa-whatsapp"></i>
                        <span>WhatsApp</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</div>

<style>
    .logo-img:hover {
        transform: scale(1.05);
    }
</style>