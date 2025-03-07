@extends('layouts.back.app')
@section('content')

    <div class="row g-4 mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>Tambah Sosial Media</strong>
                </div>
				<form class="form-horizontal m-t-40" action="{{ URL('dashboard/sosial-media/prosestambah') }}" method="POST">
					{{ csrf_field() }}
                    <div class="card-body">
						<div class="mb-3">
                            <label class="form-label" for="sosial_medias">Sosial Media <b style="color:red">*</b></label>
                            <select class="form-select" aria-label="sosial_medias" name="sosial_medias">
				                @foreach($list_sosial_medias as $list_sosial_media)
				                    <option value="{{ $list_sosial_media['icon'].'_'.$list_sosial_media['nama'] }}" {{ Request::old('sosial_medias') == $list_sosial_media['icon'].'_'.$list_sosial_media['nama'] ? $select='selected' : $select='' }}>{{ $list_sosial_media['nama'] }}</option>
				                @endforeach
                            </select>
                            {{\App\Helpers\General::pesanErrorForm($errors->first('sosial_medias'))}}
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="url_sosial_medias">Url <b style="color:red">*</b></label>
                            <input class="form-control {{ \App\Helpers\General::validForm($errors->first('url_sosial_medias')) }}" id="url_sosial_medias" type="text" name="url_sosial_medias" value="{{Request::old('url_sosial_medias')}}">
                            {{\App\Helpers\General::pesanErrorForm($errors->first('url_sosial_medias'))}}
                        </div>
                    </div>
                    <div class="card-footer right-align">
                        {{\App\Helpers\General::simpan()}}
			          	@if(request()->session()->get('halaman') != '')
		            		@php($ambil_kembali = request()->session()->get('halaman'))
	                    @else
	                    	@php($ambil_kembali = URL('dashboard/sosial-media'))
	                    @endif
						{{\App\Helpers\General::batal($ambil_kembali)}}
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection