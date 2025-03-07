@extends('layouts.back.app')
@section('content')

    <div class="row g-4 mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>Edit Admin</strong>
                </div>
				<form class="form-horizontal m-t-40" action="{{ URL('dashboard/admin/prosesedit/'.$admins->id) }}" method="POST">
					{{ csrf_field() }}
                    @method('PATCH')
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="name">Nama <b style="color:red">*</b></label>
                            <input class="form-control {{ \App\Helpers\General::validForm($errors->first('name')) }}" id="name" type="text" name="name" value="{{Request::old('name') == '' ? $admins->name : Request::old('name')}}">
                            {{\App\Helpers\General::pesanErrorForm($errors->first('name'))}}
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="username">Username <b style="color:red">*</b></label>
                            <input class="form-control {{ \App\Helpers\General::validForm($errors->first('username')) }}" id="username" type="text" name="username" value="{{Request::old('username') == '' ? $admins->username : Request::old('username')}}">
                            {{\App\Helpers\General::pesanErrorForm($errors->first('username'))}}
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="email">Email <b style="color:red">*</b></label>
                            <input class="form-control {{ \App\Helpers\General::validForm($errors->first('email')) }}" id="email" type="email" name="email" value="{{Request::old('email') == '' ? $admins->email : Request::old('email')}}">
                            {{\App\Helpers\General::pesanErrorForm($errors->first('email'))}}
                        </div>
                        <div class="center-align">
							<label style="color:#f9b115">Kosongi password jika tidak ingin diubah.</label>
						</div>
                        <div class="mb-3">
                            <label class="form-label" for="password">Password <b style="color:red">*</b></label>
                            <input class="form-control {{ \App\Helpers\General::validForm($errors->first('password')) }}" id="password" type="password" name="password" value="{{Request::old('password')}}">
                            {{\App\Helpers\General::pesanErrorForm($errors->first('password'))}}
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="password_confirmation">Konfirmasi Password <b style="color:red">*</b></label>
                            <input class="form-control {{ \App\Helpers\General::validForm($errors->first('password_confirmation')) }}" id="password_confirmation" type="password" name="password_confirmation" value="{{Request::old('password_confirmation')}}">
                            {{\App\Helpers\General::pesanErrorForm($errors->first('password_confirmation'))}}
                        </div>
                    </div>
                    <div class="card-footer right-align">
                        {{\App\Helpers\General::perbarui()}}
			          	@if(request()->session()->get('halaman') != '')
		            		@php($ambil_kembali = request()->session()->get('halaman'))
	                    @else
	                    	@php($ambil_kembali = URL('dashboard/admin'))
	                    @endif
						{{\App\Helpers\General::batal($ambil_kembali)}}
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection