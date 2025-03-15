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
                            <a class="btn btn-primary rounded-pill py-3 px-5" href="{{ URL('/lowongan-kerja') }}">Lihat lowongan kerja lain</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 wow fadeInRight" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInRight;">
                    <div class="bg-light rounded p-5 h-100">
                        <form method="POST" action="{{ URL('kirim-pesan') }}">
                            {{ csrf_field() }}
                            <div class="row g-3">
                                <div class="col-lg-12 col-xl-12">
                                    <div class="form-floating">
                                        <input type="text" name="nama_lengkap_pelamar_lowongan_kerjas" class="form-control border-0" id="nama_lengkap_pelamar_lowongan_kerjas" placeholder="Nama Lengkap" value="{{ Request::old('nama_lengkap_pelamar_lowongan_kerjas') }}" required>
                                        <label for="name">Nama Lengkap</label>
                                        {{\App\Helpers\General::pesanErrorForm($errors->first('nama_lengkap_pelamar_lowongan_kerjas'))}}
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-12">
                                    <div class="form-floating">
                                        <input type="number" name="telepon_pelamar_lowongan_kerjas" class="form-control border-0" id="telepon_pelamar_lowongan_kerjas" placeholder="telepon_pelamar_lowongan_kerjas" value="{{ Request::old('telepon_pelamar_lowongan_kerjas') }}" required>
                                        <label for="telepon_pelamar_lowongan_kerjas">Telepon</label>
                                        {{\App\Helpers\General::pesanErrorForm($errors->first('telepon_pelamar_lowongan_kerjas'))}}
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-12">
                                    <div class="form-floating">
                                        <input type="email" name="email_pelamar_lowongan_kerjas" class="form-control border-0" id="email_pelamar_lowongan_kerjas" value="{{ Request::old('email_pelamar_lowongan_kerjas') }}"  placeholder="Email" required>
                                        <label for="email_pelamar_lowongan_kerjas">Email</label>
                                        {{\App\Helpers\General::pesanErrorForm($errors->first('email_pelamar_lowongan_kerjas'))}}
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-12">
                                    <label for="userfile_cv_pelamar_lowongan_kerjas" style="margin-left:15px;">CV (pdf)</label>
                                    <div class="form-floating">
                                        <input id="userfile_cv_pelamar_lowongan_kerjas" required class="form-control border-0" type="file" name="userfile_cv_pelamar_lowongan_kerjas">
                                    </div>
                                    {{\App\Helpers\General::pesanErrorFormFile($errors->first('userfile_cv_pelamar_lowongan_kerjas'))}}
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