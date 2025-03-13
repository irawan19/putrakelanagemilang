@extends('layouts.back.app')
@section('content')

    <div class="row g-4 mb-4">
        <div class="col-md-12">
            <div class="card">
                <form class="form-horizontal m-t-40" action="{{ URL('dashboard/kontak/prosesedit') }}" method="POST">
                    {{ csrf_field() }}
                    @method('PATCH')
                    <div class="card-header">
                        <strong>Kontak</strong>
                    </div>
                    <div class="card-body">
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