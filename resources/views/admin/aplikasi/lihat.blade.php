@extends('layouts.back.app')
@section('content')

    <div class="row g-4 mb-4">
        <div class="col-md-8">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <form class="form-horizontal m-t-40" action="{{ URL('dashboard/aplikasi/prosesedit') }}" method="POST">
                        {{ csrf_field() }}
                        @method('PATCH')
                        <div class="card-header">
                            <strong>Aplikasi</strong>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="nama_aplikasis">Nama <b style="color:red">*</b></label>
                                <input class="form-control {{ \App\Helpers\General::validForm($errors->first('nama_aplikasis')) }}" id="nama_aplikasis" type="text" name="nama_aplikasis" value="{{Request::old('nama_aplikasis') == '' ? $aplikasis->nama_aplikasis : Request::old('nama_aplikasis')}}">
                                {{\App\Helpers\General::pesanErrorForm($errors->first('nama_aplikasis'))}}
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="deskripsi_aplikasis">Deskripsi <b style="color:red">*</b></label>
                                <input class="form-control {{ \App\Helpers\General::validForm($errors->first('deskripsi_aplikasis')) }}" id="deskripsi_aplikasis" type="text" name="deskripsi_aplikasis" value="{{Request::old('deskripsi_aplikasis') == '' ? $aplikasis->deskripsi_aplikasis : Request::old('deskripsi_aplikasis')}}">
                                {{\App\Helpers\General::pesanErrorForm($errors->first('deskripsi_aplikasis'))}}
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="keyword_aplikasis">Keywords <b style="color:red">*</b></label>
                                <input class="form-control {{ \App\Helpers\General::validForm($errors->first('keyword_aplikasis')) }}" id="keyword_aplikasis" type="text" name="keyword_aplikasis" value="{{Request::old('keyword_aplikasis') == '' ? $aplikasis->keyword_aplikasis : Request::old('keyword_aplikasis')}}">
                                {{\App\Helpers\General::pesanErrorForm($errors->first('keyword_aplikasis'))}}
                            </div>
                        </div>
                        <div class="card-footer right-align">
                            {{\App\Helpers\General::perbarui()}}
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-12 mb-3">
                <div class="card">
                    <form class="form-horizontal m-t-40" action="{{ URL('dashboard/aplikasi/proseseditheader') }}" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }}
                        @method('PATCH')
                        <div class="card-header">
                            <strong>Header</strong>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 center-align">
                                <a data-fancybox="gallery" href="{{URL::asset('storage/'.$aplikasis->header_aplikasis)}}">
                                    <img src="{{URL::asset('storage/'.$aplikasis->header_aplikasis)}}" width="108">
                                </a>
                            </div>
                            <div class="mb-3">
                                <label for="userfile_header" class="form-label">Pilih foto 1905x308px. format hanya boleh jpg, png, gif, svg</label>
                                <input class="form-control" name="userfile_header" type="file" id="userfile_header">
                                {{\App\Helpers\General::pesanErrorFormFile($errors->first('userfile_header'))}}
                            </div>
                        </div>
                        <div class="card-footer right-align">
                            {{\App\Helpers\General::perbarui()}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <form class="form-horizontal m-t-40" action="{{ URL('dashboard/aplikasi/proseseditlogo') }}" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }}
                        @method('PATCH')
                        <div class="card-header">
                            <strong>Logo</strong>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 center-align">
                                <a data-fancybox="gallery" href="{{URL::asset('storage/'.$aplikasis->logo_aplikasis)}}">
                                    <img src="{{URL::asset('storage/'.$aplikasis->logo_aplikasis)}}" width="108">
                                </a>
                            </div>
                            <div class="mb-3">
                                <label for="userfile_logo" class="form-label">Pilih foto 256x256px. format hanya boleh jpg, png, gif, svg</label>
                                <input class="form-control" name="userfile_logo" type="file" id="userfile_logo">
                                {{\App\Helpers\General::pesanErrorFormFile($errors->first('userfile_logo'))}}
                            </div>
                        </div>
                        <div class="card-footer right-align">
                            {{\App\Helpers\General::perbarui()}}
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <div class="card">
                    <form class="form-horizontal m-t-40" action="{{ URL('dashboard/aplikasi/prosesediticon') }}" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }}
                        @method('PATCH')
                        <div class="card-header">
                            <strong>Icon</strong>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 center-align">
                                <a data-fancybox="gallery" href="{{URL::asset('storage/'.$aplikasis->icon_aplikasis)}}">
                                    <img src="{{URL::asset('storage/'.$aplikasis->icon_aplikasis)}}" width="108">
                                </a>
                            </div>
                            <div class="mb-3">
                                <label for="userfile_icon" class="form-label">Pilih foto 64x64px. format hanya boleh jpg, png, gif, svg</label>
                                <input class="form-control" name="userfile_icon" type="file" id="userfile_icon">
                                {{\App\Helpers\General::pesanErrorFormFile($errors->first('userfile_icon'))}}
                            </div>
                        </div>
                        <div class="card-footer right-align">
                            {{\App\Helpers\General::perbarui()}}
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <div class="card">
                    <form class="form-horizontal m-t-40" action="{{ URL('dashboard/aplikasi/proseseditlogotext') }}" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }}
                        @method('PATCH')
                        <div class="card-header">
                            <strong>Logo Text</strong>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 center-align">
                                <a data-fancybox="gallery" href="{{URL::asset('storage/'.$aplikasis->logo_text_aplikasis)}}">
                                    <img src="{{URL::asset('storage/'.$aplikasis->logo_text_aplikasis)}}" width="108">
                                </a>
                            </div>
                            <div class="mb-3">
                                <label for="userfile_logo_text" class="form-label">Pilih foto 256x128px. format hanya boleh jpg, png, gif, svg</label>
                                <input class="form-control" name="userfile_logo_text" type="file" id="userfile_logo_text">
                                {{\App\Helpers\General::pesanErrorFormFile($errors->first('userfile_logo_text'))}}
                            </div>
                        </div>
                        <div class="card-footer right-align">
                            {{\App\Helpers\General::perbarui()}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    @if (Session::get('setelah_simpan.alert') == 'sukses')
        @include('layouts.back.modalsukses')
        <script>
            $(window).on('load', function() {
                $('#modalsukses').modal('show');
            });
        </script>
    @endif
@endsection