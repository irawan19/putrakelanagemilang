@extends('layouts.front.app')
@section('content')

    @include('layouts.front.header', ['title' => 'Tentang Kami'])
    <div class="container-fluid feature bg-light py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Tentang Kami</h4>
                <h1 class="display-4 mb-4">{{ $aplikasi->nama_aplikasis }}</h1>
                <p class="mb-0">Kami perusahaan yang bergerak di bidang distribusi penjualan alat medis dan kesehatan</p>
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
    <div class="container-fluid bg-light about pb-5">
        <div class="container pb-5">
            <div class="row g-5">
                <div class="col-xl-12 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="about-item-content bg-white rounded p-5 h-100">
                        <h4 class="text-primary">Tentang {{ $aplikasi->nama_aplikasis }}</h4>
                        <p>{!! nl2br($tentang_kami->konten_tentang_kamis) !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection