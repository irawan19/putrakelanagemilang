@php($aplikasi				= \App\Models\Aplikasi::first())
@php($kontak                = \App\Models\Kontak::first())
@php($sosial_medias         = \App\Models\Sosial_media::get())
<!DOCTYPE html>
<html lang="en">
    <head>
    <base href="./">
        <meta charset="utf-8">
        <title>{{ $aplikasi->nama_aplikasis }}</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
        <link rel="apple-touch-icon" sizes="57x57" href="{{URL::asset('storage/'.$aplikasi->icon_aplikasis)}}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{URL::asset('storage/'.$aplikasi->icon_aplikasis)}}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{URL::asset('storage/'.$aplikasi->icon_aplikasis)}}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{URL::asset('storage/'.$aplikasi->icon_aplikasis)}}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{URL::asset('storage/'.$aplikasi->icon_aplikasis)}}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{URL::asset('storage/'.$aplikasi->icon_aplikasis)}}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{URL::asset('storage/'.$aplikasi->icon_aplikasis)}}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{URL::asset('storage/'.$aplikasi->icon_aplikasis)}}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{URL::asset('storage/'.$aplikasi->icon_aplikasis)}}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{URL::asset('storage/'.$aplikasi->icon_aplikasis)}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{URL::asset('storage/'.$aplikasi->icon_aplikasis)}}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{URL::asset('storage/'.$aplikasi->icon_aplikasis)}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{URL::asset('storage/'.$aplikasi->icon_aplikasis)}}">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Inter:slnt,wght@-10..0,100..900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ URL::asset('template/front/lib/animate/animate.min.css') }}"/>
        <link href="{{ URL::asset('template/front/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('template/front/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('template/front/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('template/front/css/style.css') }}" rel="stylesheet">
        <meta name="_token" content="{{ csrf_token() }}">

        <style>
            .bg-breadcrumb {
                position: relative;
                overflow: hidden;
                background: linear-gradient(rgba(22, 36, 61, 0.5), rgba(0, 0, 0, 0.5)), url('{{ URL::asset("storage/".$aplikasi->header_aplikasis) }}');
                background-position: center center;
                background-repeat: no-repeat;
                background-size: cover;
                padding: 60px 0 60px 0;
                transition: 0.5s;
            }
        </style>
    </head>

    <body>
        @include('layouts.front.loader')
        @include('layouts.front.topbar')
        @include('layouts.front.navbar')
        @yield('content')
        @include('layouts.front.footer')
        @include('layouts.front.copyright')

        <a href="#" class="btn btn-primary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ URL::asset('template/front/lib/wow/wow.min.js') }}"></script>
        <script src="{{ URL::asset('template/front/lib/easing/easing.min.js') }}"></script>
        <script src="{{ URL::asset('template/front/lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ URL::asset('template/front/lib/counterup/counterup.min.js') }}"></script>
        <script src="{{ URL::asset('template/front/lib/lightbox/js/lightbox.min.js') }}"></script>
        <script src="{{ URL::asset('template/front/lib/owlcarousel/owl.carousel.min.js') }}"></script>
        
        <script src="{{ URL::asset('template/front/js/main.js') }}"></script>
    </body>

</html>