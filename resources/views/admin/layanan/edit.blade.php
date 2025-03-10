@extends('layouts.back.app')
@section('content')

    <div class="row g-4 mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>Edit Layanan</strong>
                </div>
				<form class="form-horizontal m-t-40" enctype="multipart/form-data" action="{{ URL('dashboard/layanan/proseseditdetail/'.$layanan_details->id_layanan_details) }}" method="POST">
					{{ csrf_field() }}
                    @method('PATCH')
                    <div class="card-body">
						<div class="mb-3">
							<label class="form-col-form-label" for="userfile_gambar_layanan_detail">Gambar (550x400px) <b style="color:red">*</b></label>
							<br/>
							<div class="form-group center-align">
							    <a data-fancybox="gallery" href="{{URL::asset('storage/'.$layanan_details->gambar_layanan_details)}}">
							    	<img src="{{URL::asset('storage/'.$layanan_details->gambar_layanan_details)}}" width="250">
							    </a>
							</div>
                            <br/>
							<input id="userfile_gambar_layanan_detail" class="form-control" type="file" name="userfile_gambar_layanan_detail">
							{{\App\Helpers\General::pesanErrorForm($errors->first('userfile_gambar_layanan_detail'))}}
						</div>
						<div class="mb-3">
                            <label class="form-label" for="icon_layanan_details">Icon <b style="color:red">*</b></label>
                            <select class="form-select" aria-label="icon_layanan_details" name="icon_layanan_details">
				                @foreach($icon_layanan_details as $icon_layanan_detail)
				                  	@php($selected = '')
				                     @if(Request::old('layanan_details') == '')
				                         @if($icon_layanan_detail['icon'].'_'.$icon_layanan_detail['nama'] == $layanan_details->icon_layanan_details.'_'.$layanan_details->nama_layanan_details)
				                             @php($selected = 'selected')
				                         @endif
				                     @else
				                         @if($icon_layanan_detail['icon'].'_'.$icon_layanan_detail['nama'] == Request::old('icon_layanan_details'))
				                             @php($selected = 'selected')
				                         @endif
				                     @endif
				                    <option value="{{ $icon_layanan_detail['icon'].'_'.$icon_layanan_detail['nama'] }}" {{ $selected }}>{{ $icon_layanan_detail['nama'] }}</option>
				                @endforeach
                            </select>
                            {{\App\Helpers\General::pesanErrorForm($errors->first('icon_layanan_details'))}}
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="judul_layanan_details">Judul <b style="color:red">*</b></label>
                            <input class="form-control {{ \App\Helpers\General::validForm($errors->first('judul_layanan_details')) }}" id="judul_layanan_details" type="text" name="judul_layanan_details" value="{{Request::old('judul_layanan_details') == '' ? $layanan_details->judul_layanan_details : Request::old('judul_layanan_details')}}">
                            {{\App\Helpers\General::pesanErrorForm($errors->first('judul_layanan_details'))}}
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="konten_layanan_details">Konten <b style="color:red">*</b></label>
                            <textarea class="form-control {{ \App\Helpers\General::validForm($errors->first('konten_layanan_details')) }}" id="konten_layanan_details" name="konten_layanan_details" rows="5">{{Request::old('konten_layanan_details') == '' ? $layanan_details->konten_layanan_details : Request::old('konten_layanan_details')}}</textarea>
                            {{\App\Helpers\General::pesanErrorForm($errors->first('konten_layanan_details'))}}
                        </div>
                    </div>
                    <div class="card-footer right-align">
                        {{\App\Helpers\General::perbarui()}}
			          	@if(request()->session()->get('halaman') != '')
		            		@php($ambil_kembali = request()->session()->get('halaman'))
	                    @else
	                    	@php($ambil_kembali = URL('dashboard/layanan'))
	                    @endif
						{{\App\Helpers\General::batal($ambil_kembali)}}
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection