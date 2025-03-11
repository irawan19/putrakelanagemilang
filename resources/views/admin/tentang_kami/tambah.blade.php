@extends('layouts.back.app')
@section('content')

    <div class="row g-4 mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>Tambah Tentang Kami</strong>
                </div>
				<form class="form-horizontal m-t-40" action="{{ URL('dashboard/tentang-kami/prosestambahdetail') }}" method="POST">
					{{ csrf_field() }}
                    <div class="card-body">
						<div class="mb-3">
                            <label class="form-label" for="icon_tentang_kami_details">Icon <b style="color:red">*</b></label>
                            <select class="form-select" aria-label="icon_tentang_kami_details" name="icon_tentang_kami_details">
				                @foreach($icon_tentang_kami_details as $icon_tentang_kami_detail)
				                    <option value="{{ $icon_tentang_kami_detail['icon'].'_'.$icon_tentang_kami_detail['nama'] }}" {{ Request::old('tentang_kami_details') == $icon_tentang_kami_detail['icon'].'_'.$icon_tentang_kami_detail['nama'] ? $select='selected' : $select='' }}>{{ $icon_tentang_kami_detail['nama'] }}</option>
				                @endforeach
                            </select>
                            {{\App\Helpers\General::pesanErrorForm($errors->first('icon_tentang_kami_detail'))}}
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="judul_tentang_kami_details">Judul <b style="color:red">*</b></label>
                            <input class="form-control {{ \App\Helpers\General::validForm($errors->first('judul_tentang_kami_details')) }}" id="judul_tentang_kami_details" type="text" name="judul_tentang_kami_details" value="{{Request::old('judul_tentang_kami_details')}}">
                            {{\App\Helpers\General::pesanErrorForm($errors->first('judul_tentang_kami_details'))}}
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="konten_tentang_kami_details">Konten <b style="color:red">*</b></label>
                            <textarea class="form-control {{ \App\Helpers\General::validForm($errors->first('konten_tentang_kami_details')) }}" id="konten_tentang_kami_details" name="konten_tentang_kami_details" rows="5">{{Request::old('konten_tentang_kami_details')}}</textarea>
                            {{\App\Helpers\General::pesanErrorForm($errors->first('konten_tentang_kami_details'))}}
                        </div>
                    </div>
                    <div class="card-footer right-align">
                        {{\App\Helpers\General::simpan()}}
			          	@if(request()->session()->get('halaman') != '')
		            		@php($ambil_kembali = request()->session()->get('halaman'))
	                    @else
	                    	@php($ambil_kembali = URL('dashboard/tentang-kami'))
	                    @endif
						{{\App\Helpers\General::batal($ambil_kembali)}}
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection