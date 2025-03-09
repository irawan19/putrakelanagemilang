
<div class="container-fluid nav-bar px-0 px-lg-4 py-lg-0">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light"> 
            <a href="#" class="navbar-brand p-0">
                <!-- <h1 class="text-primary mb-0"><i class="fab fa-slack me-2"></i> LifeSure</h1> -->
                <img src="{{ URL::asset('storage/'.$aplikasi->logo_aplikasis) }}" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-0 mx-lg-auto">
                    <a href="index.html" class="nav-item nav-link active">Beranda</a>
                    <a href="about.html" class="nav-item nav-link">Tentang</a>
                    <a href="service.html" class="nav-item nav-link">Layanan</a>
                    <a href="blog.html" class="nav-item nav-link">Katalog</a>
                    <a href="contact.html" class="nav-item nav-link">Kontak</a>
                    <div class="nav-btn px-3">
                        <a href="#" class="btn btn-primary rounded-pill py-2 px-4 ms-3 flex-shrink-0"> Dapatkan Penawaran</a>
                    </div>
                </div>
            </div>
            <div class="d-none d-xl-flex flex-shrink-0 ps-4">
                <a href="#" class="btn btn-light btn-lg-square rounded-circle position-relative wow tada" data-wow-delay=".9s">
                    <i class="fa fa-phone-alt fa-2x"></i>
                    <div class="position-absolute" style="top: 7px; right: 12px;">
                        <span><i class="fa fa-comment-dots text-secondary"></i></span>
                    </div>
                </a>
                <div class="d-flex flex-column ms-3">
                    <span>Hubungi Kami</span>
                    <a href="tel:{{$kontak->telepon_kontaks}}"><span class="text-dark">{{$kontak->telepon_kontaks}}</span></a>
                </div>
            </div>
        </nav>
    </div>
</div>