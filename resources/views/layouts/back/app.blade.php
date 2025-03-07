@php($aplikasi				= \App\Models\Aplikasi::first())
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <base href="./">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta name="description" content="admin, dashboard">
        <meta name="author" content="{{$aplikasi->nama_aplikasis}}">
        <meta name="keyword" content="Tiket, bootstrap, admin, dashboard">
        <title>Admin {{$aplikasi->nama_aplikasis}}</title>
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
        <link rel="manifest" href="{{URL::asset('template/back/favicon/manifest.json')}}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{URL::asset('storage/'.$aplikasi->icon_aplikasis)}}">
        <meta name="theme-color" content="#ffffff">
        <meta name="_token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{URL::asset('template/back/vendors/simplebar/css/simplebar.css')}}">
        <link rel="stylesheet" href="{{URL::asset('template/back/css/vendors/simplebar.css')}}">
        <link rel="stylesheet" href="{{URL::asset('template/back/vendors/sweetalert2/dist/sweetalert2.min.css')}}" />
        <link href="{{URL::asset('template/back/css/style.css')}}" rel="stylesheet">
        <link href="{{URL::asset('template/back/css/examples.css')}}" rel="stylesheet">
        <link href="{{URL::asset('template/back/css/custom.css')}}" rel="stylesheet">
        <script src="{{URL::asset('template/back/js/config.js')}}"></script>
        <script src="{{URL::asset('template/back/js/color-modes.js')}}"></script>
        <link href="{{URL::asset('template/back/vendors/@coreui/icons/css/free.min.css')}}" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	    <link rel="stylesheet" href="{{URL::asset('template/back/vendors/fancybox/jquery.fancybox.min.css')}}" />
    </head>
    <body>
        @include('layouts.back.sidebar')
        <div class="wrapper d-flex flex-column min-vh-100">
            @include('layouts.back.header')
            <div class="body flex-grow-1">
                <div class="container-lg">
                    @yield('content')
                </div>
            </div>
            @include('layouts.back.footer')
        </div>
        <script src="{{URL::asset('template/back/vendors/@coreui/coreui/js/coreui.bundle.min.js')}}"></script>
        <script src="{{URL::asset('template/back/vendors/simplebar/js/simplebar.min.js')}}"></script>
        <script src="{{URL::asset('template/back/vendors/sweetalert2/dist/sweetalert2.min.js')}}"></script>
        <script src="{{URL::asset('template/back/vendors/sweetalert2/sweet-alert.init.js')}}"></script>
	    <script src="{{URL::asset('template/back/vendors/fancybox/jquery.fancybox.min.js')}}"></script>
        <script>
            const header = document.querySelector('header.header');
            document.addEventListener('scroll', () => {
                if (header) {
                    header.classList.toggle('shadow-sm', document.documentElement.scrollTop > 0);
                }
            });
            jQuery(document).ready(function () {
	            //Sweet Alert
                $('.showModalHapus').click(function () {
	                var that = this;
	                var myLabel = $(that).data('nama');
	                var myLink = $(that).data('link');
	                swal({
	                    title: "Anda yakin ingin mehapus " + myLabel + "?",
	                    text: "Data akan dihapus dan Anda tidak dapat mengembalikan",
	                    type: "info",
	                    showCancelButton: true,
	                    confirmButtonColor: "#dc3545",
	                    confirmButtonText: "Ya",
	                    cancelButtonText: "Batal"
	                }).then((result) => {
	                    if (result.value) {
	                        swal({
	                            title: "Delete",
	                            text: "Data anda berhasil di hapus",
	                            type: "info"
	                        }).then(function () {
	                            $.ajax({
	                                type: 'GET',
	                                url: myLink,
	                                headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') },
	                                success: function (data) {
	                                    location.reload();
	                                }
	                            });
	                        });
	                    }
	                    else if (result.dismiss === swal.DismissReason.cancel) {
	                        swal(
	                            'Batal',
	                            'Tidak ada perubahan yang dilakukan.',
	                            'error'
	                        )
	                    }
	                });
	            });
            });
        </script>
        <script src="{{URL::asset('template/back/vendors/@coreui/utils/js/index.js')}}"></script>
    </body>
</html>