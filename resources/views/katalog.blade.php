@extends('layouts.front.app')
@section('content')

    @include('layouts.front.header', ['title' => 'Katalog'])
    <div class="container-fluid team py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Katalog</h4>
            <h1 class="display-4 mb-4">Produk Dari Kami</h1>
            <p class="mb-0">Berikut beberapa yang kami jual</p>
        </div>
        <div class="row g-4 justify-content-center">
            @foreach($katalogs->data as $katalog)
                <div class="col-md-2 col-lg-2 col-xl-2 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="team-item">
                        <a data-fancybox="gallery" href="{{URL::asset('storage/'.$aplikasi->logo_text_aplikasis)}}" data-caption="{{$katalog->nama_barangs}}">
                            <div class="team-img">
                                @if($katalo->foto_barangs == '')
                                    <img src="{{URL::asset('storage/'.$aplikasi->logo_text_aplikasis) }}" class="img-fluid rounded-top w-100" alt="">
                                @else
                                    <img src="{{URL::asset('https://penawaran.putrakelanagemilang.com/storage/'.$aplikasi->logo_text_aplikasis) }}" class="img-fluid rounded-top w-100" alt="">
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
        </div>
    </div>

@endsection