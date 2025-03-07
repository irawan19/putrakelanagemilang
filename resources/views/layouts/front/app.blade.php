@php($aplikasi				= \App\Models\Aplikasi::first())
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1">
        <title>{{ $aplikasi->nama_aplikasis }}</title>
        <meta name="keywords" content="{{ $aplikasi->keyword_aplikasis }}">
        <meta name="description" content="{{ $aplikasi->deskripsi_aplikasis }}">
        <meta name="author" content="admin {{ $aplikasi->nama_aplikasis }}">
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
        <link rel="stylesheet" href="{{URL::asset('template/front/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('template/front/style.css')}}">
        <link rel="stylesheet" href="{{URL::asset('template/front/css/colors.css')}}">
        <link rel="stylesheet" href="{{URL::asset('template/front/css/versions.css')}}">
        <link rel="stylesheet" href="{{URL::asset('template/front/css/responsive.css')}}">
        <link rel="stylesheet" href="{{URL::asset('template/front/css/custom.css')}}">
        <script src="{{URL::asset('template/front/js/modernizer.js')}}"></script>
    </head>
   <body class="clinic_version">
        @include('layouts.front.loader')
        @include('layouts.front.header')
        @yield('content')
        @include('layouts.front.footer')
        @include('layouts.front.copyright')
        <a href="#home" data-scroll class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>
        <script src="{{URL::asset('template/front/js/all.js')}}"></script>
        <script src="{{URL::asset('template/front/js/custom.js')}}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNUPWkb4Cjd7Wxo-T4uoUldFjoiUA1fJc&callback=myMap"></script>
    </body>
</html>