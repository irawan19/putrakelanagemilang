@extends('layouts.front.app')
@section('content')

    @include('layouts.front.header', ['title' => 'Produk'])
    
    <!-- Products Section - Elegant Cards -->
    <div class="container-fluid py-5" style="background: linear-gradient(180deg, #ffffff 0%, #f0f9ff 100%);">
        <div class="container py-5">
            <div class="section-header text-center mx-auto wow fadeInUp" data-wow-delay="0.2s">
                <span class="section-badge">
                    <i class="fas fa-box me-2"></i>Produk Kami
                </span>
                <h1 class="section-title">Produk Dari Kami</h1>
                <p class="lead text-muted">Berikut beberapa produk alat kesehatan yang kami jual</p>
            </div>
            
            @if(isset($katalogs->data) && count($katalogs->data) > 0)
                <div class="row g-4 justify-content-center">
                    @foreach($katalogs->data as $index => $katalog)
                        <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="{{ 0.2 + ($index % 4 * 0.1) }}s">
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
                                    <h5 class="mb-2 fw-bold" style="color: var(--medical-dark); min-height: 48px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">{{ $katalog->nama_barangs }}</h5>
                                    <div class="d-flex flex-column gap-2 mb-3">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-tag text-primary me-2" style="width: 20px;"></i>
                                            <small class="text-muted">Merk: <strong class="text-dark">{{ $katalog->nama_merks }}</strong></small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-cog text-primary me-2" style="width: 20px;"></i>
                                            <small class="text-muted">Tipe: <strong class="text-dark">{{ $katalog->nama_tipes }}</strong></small>
                                        </div>
                                    </div>
                                    <a href="https://wa.me/{{$kontak->telepon_kontaks}}?text=Halo, saya tertarik dengan produk {{ $katalog->nama_barangs }}" class="btn btn-sm btn-medical w-100" target="_blank">
                                        <i class="fab fa-whatsapp me-2"></i>WhatsApp
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="col-12 text-center py-5">
                    <div class="bg-white rounded-4 p-5 shadow-sm">
                        <i class="fas fa-box-open fa-4x text-muted mb-4"></i>
                        <h4 class="text-muted mb-3">Tidak ada produk tersedia</h4>
                        <p class="text-muted mb-4">Produk akan segera ditambahkan. Silakan hubungi kami untuk informasi lebih lanjut.</p>
                        <a href="{{ URL('/kontak') }}" class="btn btn-medical">
                            <i class="fas fa-envelope me-2"></i>Hubungi Kami
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection