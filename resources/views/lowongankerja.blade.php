@extends('layouts.front.app')
@section('content')

    @include('layouts.front.header', ['title' => 'Lowongan Kerja'])
    
    <!-- Lowongan Kerja Section - Elegant Cards -->
    <div class="container-fluid py-5" style="background: linear-gradient(180deg, #ffffff 0%, #f0f9ff 100%);">
        <div class="container py-5">
            <div class="section-header text-center mx-auto wow fadeInUp" data-wow-delay="0.2s">
                <span class="section-badge">
                    <i class="fas fa-briefcase me-2"></i>Lowongan Kerja
                </span>
                <h1 class="section-title">Bergabunglah Dengan Tim Kami</h1>
                <p class="lead text-muted">Kami mencari talenta terbaik untuk bergabung dalam tim PT. Putra Kelana Gemilang</p>
            </div>
            
            @if(isset($lowongan_kerjas) && count($lowongan_kerjas) > 0)
                <div class="row g-4 justify-content-center">
                    @foreach($lowongan_kerjas as $index => $lowongan_kerja)
                        <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="{{ 0.2 + ($index % 4 * 0.1) }}s">
                            <div class="job-card-medical">
                                <div class="job-image-wrapper">
                                    @if($lowongan_kerja->gambar_lowongan_kerjas != '')
                                        <img src="{{URL::asset('storage/'.$lowongan_kerja->gambar_lowongan_kerjas) }}" class="img-fluid w-100 h-100" style="object-fit: cover;" alt="{{ $lowongan_kerja->judul_lowongan_kerjas }}" loading="lazy">
                                    @else
                                        <img src="{{URL::asset('storage/'.$aplikasi->logo_text_aplikasis) }}" class="img-fluid w-100 h-100" style="object-fit: cover;" alt="{{ $lowongan_kerja->judul_lowongan_kerjas }}" loading="lazy">
                                    @endif
                                    <div class="job-overlay-medical">
                                        <i class="fas fa-briefcase fa-2x"></i>
                                    </div>
                                </div>
                                <div class="p-4">
                                    <h5 class="mb-3 fw-bold" style="color: var(--medical-dark); min-height: 56px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                        <a href="{{ URL('lowongan-kerja/detail/'.$lowongan_kerja->slug_lowongan_kerjas) }}" class="text-decoration-none" style="color: var(--medical-dark);">
                                            {{ $lowongan_kerja->judul_lowongan_kerjas }}
                                        </a>
                                    </h5>
                                    <p class="text-muted mb-3" style="line-height: 1.6; min-height: 72px; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                        {!! nl2br($lowongan_kerja->sekilas_konten_lowongan_kerjas) !!}
                                    </p>
                                    <a href="{{ URL('lowongan-kerja/detail/'.$lowongan_kerja->slug_lowongan_kerjas) }}" class="btn btn-sm btn-medical w-100">
                                        <i class="fas fa-arrow-right me-2"></i>Lihat Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <!-- Pagination -->
                @if(method_exists($lowongan_kerjas, 'links'))
                    <div class="row mt-5">
                        <div class="col-12">
                            <div class="d-flex justify-content-center">
                                {{ $lowongan_kerjas->links() }}
                            </div>
                        </div>
                    </div>
                @endif
            @else
                <div class="row">
                    <div class="col-12 text-center py-5">
                        <div class="bg-white rounded-4 p-5 shadow-sm">
                            <i class="fas fa-briefcase fa-4x text-muted mb-4"></i>
                            <h4 class="text-muted mb-3">Tidak ada lowongan tersedia</h4>
                            <p class="text-muted mb-4">Saat ini tidak ada lowongan kerja yang tersedia. Silakan hubungi kami untuk informasi lebih lanjut atau kunjungi kembali halaman ini di lain waktu.</p>
                            <a href="{{ URL('/kontak') }}" class="btn btn-medical">
                                <i class="fas fa-envelope me-2"></i>Hubungi Kami
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection