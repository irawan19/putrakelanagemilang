@extends('layouts.front.app')
@section('content')

    @include('layouts.front.header', ['title' => 'Layanan'])
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

@endsection