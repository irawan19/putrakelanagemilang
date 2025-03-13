@extends('layouts.front.app')
@section('content')

    @include('layouts.front.header', ['title' => 'Kontak Kami'])
    <div class="container-fluid contact bg-light py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Kontak Kami</h4>
                <h1 class="display-4 mb-4">{{ $kontak->text1_kontaks }}</h1>
            </div>
            <div class="row g-5">
                <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="contact-img d-flex justify-content-center" >
                        <div class="contact-img-inner">
                            <img src="{{ URL::asset('storage/'.$kontak->gambar_kontaks) }}" class="img-fluid w-100"  alt="Image">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.4s">
                    <div>
                        <h4 class="text-primary">Kirim Pesan Anda</h4>
                        <p class="mb-4">{{ $kontak->text2_kontaks }}</p>
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
                                    <button class="btn btn-primary w-100 py-3">Kirim Pesan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12">
                    <div>
                        <div class="row g-4">
                            <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.2s">
                                <div class="contact-add-item">
                                    <div class="contact-icon text-primary mb-4">
                                        <i class="fas fa-map-marker-alt fa-2x"></i>
                                    </div>
                                    <div>
                                        <h4>Alamat</h4>
                                        <p class="mb-0">{!! nl2br($kontak->alamat_kontaks) !!}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.4s">
                                <div class="contact-add-item">
                                    <div class="contact-icon text-primary mb-4">
                                        <i class="fas fa-envelope fa-2x"></i>
                                    </div>
                                    <div>
                                        <h4>Email</h4>
                                        <p class="mb-0">{{ $kontak->email_kontaks }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.6s">
                                <div class="contact-add-item">
                                    <div class="contact-icon text-primary mb-4">
                                        <i class="fa fa-phone-alt fa-2x"></i>
                                    </div>
                                    <div>
                                        <h4>Telepon</h4>
                                        <p class="mb-0">{{ $kontak->telepon_kontaks }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.8s">
                                <div class="contact-add-item">
                                    <div class="contact-icon text-primary mb-4">
                                        <i class="fab fa-firefox-browser fa-2x"></i>
                                    </div>
                                    <div>
                                        <h4>Website</h4>
                                        <p class="mb-0">{{ ENV('APP_URL') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="rounded">
                        <iframe class="rounded w-100" src="{{ $kontak->url_alamat_kontaks }}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection