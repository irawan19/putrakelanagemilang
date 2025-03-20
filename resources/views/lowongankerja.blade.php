@extends('layouts.front.app')
@section('content')

    @include('layouts.front.header', ['title' => 'Lowongan Kerja'])
    <div class="container-fluid service py-5">
        <div class="row g-4 justify-content-center">
                @foreach($lowongan_kerjas as $lowongan_kerja)
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="service-item">
                            <div class="service-img">
                                @if($lowongan_kerja->gambar_lowongan_kerjas != '')
                                    <img src="{{URL::asset('storage/'.$lowongan_kerja->gambar_lowongan_kerjas) }}" class="img-fluid rounded-top w-100" alt="">
                                @else
                                    <img src="{{URL::asset('storage/'.$aplikasi->logo_text_aplikasis) }}" class="img-fluid rounded-top w-100" alt="">
                                @endif
                                <div class="service-icon p-3">
                                    <i class="fa fa-briefcase fa-2x"></i>
                                </div>
                            </div>
                            <div class="service-content p-4">
                                <div class="service-content-inner">
                                    <a href="{{ URL('lowongan-kerja/detail/'.$lowongan_kerja->slug_lowongan_kerjas) }}" class="d-inline-block h4 mb-4">{{ $lowongan_kerja->judul_lowongan_kerjas }}</a>
                                    <p class="mb-4">{!! nl2br($lowongan_kerja->sekilas_konten_lowongan_kerjas) !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
        </div>
    </div>

@endsection