@extends('layouts.back.app')
@section('content')

    <div class="row g-4 mb-4">
        <div class="col-md-12">
            <div class="card">
                <form class="form-horizontal m-t-40" enctype="multipart/form-data" action="{{ URL('dashboard/kontak/prosesedit') }}" method="POST">
                    {{ csrf_field() }}
                    @method('PATCH')
                    <div class="card-header">
                        <strong>Kontak</strong>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="text1_kontaks">Text 1 <b style="color:red">*</b></label>
                            <input class="form-control {{ \App\Helpers\General::validForm($errors->first('text1_kontaks')) }}" id="text1_kontaks" type="text" name="text1_kontaks" value="{{Request::old('text1_kontaks') == '' ? $kontaks->text1_kontaks : Request::old('text1_kontaks')}}">
                            {{\App\Helpers\General::pesanErrorForm($errors->first('text1_kontaks'))}}
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="text2_kontaks">Text 2 <b style="color:red">*</b></label>
                            <input class="form-control {{ \App\Helpers\General::validForm($errors->first('text2_kontaks')) }}" id="text2_kontaks" type="text" name="text2_kontaks" value="{{Request::old('text2_kontaks') == '' ? $kontaks->text2_kontaks : Request::old('text2_kontaks')}}">
                            {{\App\Helpers\General::pesanErrorForm($errors->first('text2_kontaks'))}}
                        </div>
						<div class="mb-3">
							<label class="form-col-form-label" for="userfile_gambar_kontak">Gambar (456x567px)</label>
							<br/>
							<div class="form-group center-align">
							    <a data-fancybox="gallery" href="{{URL::asset('storage/'.$kontaks->gambar_kontaks)}}">
							    	<img src="{{URL::asset('storage/'.$kontaks->gambar_kontaks)}}" width="250">
							    </a>
							</div>
                            <br/>
							<input id="userfile_gambar_kontak" class="form-control" type="file" name="userfile_gambar_kontak">
							{{\App\Helpers\General::pesanErrorForm($errors->first('userfile_gambar_kontak'))}}
						</div>
                        <div class="mb-3">
                            <label class="form-label" for="telepon_kontaks">Telepon Whatsapp <b style="color:red">*</b></label>
                            <input class="form-control {{ \App\Helpers\General::validForm($errors->first('telepon_kontaks')) }}" id="telepon_kontaks" type="text" name="telepon_kontaks" value="{{Request::old('telepon_kontaks') == '' ? $kontaks->telepon_kontaks : Request::old('telepon_kontaks')}}">
                            {{\App\Helpers\General::pesanErrorForm($errors->first('telepon_kontaks'))}}
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="email_kontaks">Email <b style="color:red">*</b></label>
                            <input class="form-control {{ \App\Helpers\General::validForm($errors->first('email_kontaks')) }}" id="email_kontaks" type="email" name="email_kontaks" value="{{Request::old('email_kontaks') == '' ? $kontaks->email_kontaks : Request::old('email_kontaks')}}">
                            {{\App\Helpers\General::pesanErrorForm($errors->first('email_kontaks'))}}
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="alamat_kontaks">Alamat <b style="color:red">*</b></label>
                            <textarea class="form-control {{ \App\Helpers\General::validForm($errors->first('alamat_kontaks')) }}" id="alamat_kontaks" name="alamat_kontaks" rows="5">{{Request::old('alamat_kontaks') == '' ? $kontaks->alamat_kontaks : Request::old('alamat_kontaks')}}</textarea>
                            {{\App\Helpers\General::pesanErrorForm($errors->first('alamat_kontaks'))}}
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="url_alamat_kontaks">URL Alamat <b style="color:red">*</b></label>
                            <input class="form-control {{ \App\Helpers\General::validForm($errors->first('url_alamat_kontaks')) }}" id="url_alamat_kontaks" type="text" name="url_alamat_kontaks" value="{{Request::old('url_alamat_kontaks') == '' ? $kontaks->url_alamat_kontaks : Request::old('url_alamat_kontaks')}}">
                            {{\App\Helpers\General::pesanErrorForm($errors->first('url_alamat_kontaks'))}}
                        </div>
                    </div>
                    <div class="card-footer right-align">
                        {{\App\Helpers\General::perbarui()}}
                    </div>
                </form>
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