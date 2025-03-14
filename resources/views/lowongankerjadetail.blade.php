@extends('layouts.front.app')
@section('content')

    @include('layouts.front.header', ['title' => $lowongan_kerja->judul_lowongan_kerjas])
    <div class="container-fluid service py-5">
        <div class="row g-4 justify-content-center">
            <div class="row g-5">
                <div class="col-xl-8 wow fadeInLeft" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInLeft;">
                    <div class="about-item-content bg-white rounded p-5 h-100">
                        <p>{!! nl2br($lowongan_kerja->konten_lowongan_kerjas) !!}</p>
                        <div style="text-align:center; padding-top:20px">
                            <a class="btn btn-primary rounded-pill py-3 px-5" href="http://127.0.0.1:8000/tentang-kami">Kembali</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 wow fadeInRight" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInRight;">
                    <div class="bg-white rounded p-5 h-100">
                        <form method="POST" action="{{ URL('kirim-pesan') }}">
                            {{ csrf_field() }}
                            <div class="row g-3">
                                <div class="col-lg-12 col-xl-12">
                                    <div class="form-floating">
                                        <input type="text" name="nama_pesans" class="form-control border-0" id="nama_pesans" placeholder="Nama Lengkap" value="{{ Request::old('nama_pesans') }}" required>
                                        <label for="name">Nama Lengkap</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-12">
                                    <div class="form-floating">
                                        <input type="email" name="email_pesans" class="form-control border-0" id="email_pesans" placeholder="Email" value="{{ Request::old('email_pesans') }}" required>
                                        <label for="email_pesans">Email</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-12">
                                    <div class="form-floating">
                                        <input type="number" name="telepon_pesans" class="form-control border-0" id="telepon_pesans" value="{{ Request::old('telepon_pesans') }}"  placeholder="Telepon">
                                        <label for="telepon_pesans">Telepon</label>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-12">
                                    <div class="form-floating">
                                        <textarea name="konten_pesans" class="form-control border-0" placeholder="Isikan pesan anda" id="konten_pesans" style="height: 120px">{{ Request::old('konten_pesans') }}</textarea>
                                        <label for="konten_pesans">Pesan</label>
                                    </div>

                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3">Kirim</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection