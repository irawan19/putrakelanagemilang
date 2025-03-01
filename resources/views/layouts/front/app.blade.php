<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="{{URL::asset('template/front/images/fevicon.ico.png')}}" type="image/x-icon" />
        <link rel="apple-touch-icon" href="{{URL::asset('template/front/images/apple-touch-icon.png')}}">
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