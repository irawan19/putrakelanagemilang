@extends('layouts.back.app')
@section('content')

    <div class="row g-4 mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>Edit Lowongan Kerja</strong>
                </div>
				<form class="form-horizontal m-t-40" action="{{ URL('dashboard/lowongan-kerja/prosesedit/'.$lowongan_kerjas->id_lowongan_kerjas) }}" method="POST">
					{{ csrf_field() }}
                    @method('PATCH')
                    <div class="card-body">
						<div class="mb-3">
							<label class="form-col-form-label" for="userfile_gambar_lowongan_kerja">Gambar (500x400px) <b style="color:red">*</b></label>
							<br/>
							<div class="form-group center-align">
                                @if($lowongan_kerjas->gambar_lowongan_kerjas != '')
                                    <a data-fancybox="gallery" href="{{URL::asset('storage/'.$lowongan_kerjas->gambar_lowongan_kerjas)}}">
                                        <img src="{{URL::asset('storage/'.$lowongan_kerjas->gambar_lowongan_kerjas)}}" width="250">
                                    </a>
                                @else
                                    <a data-fancybox="gallery" href="{{URL::asset('storage/'.$aplikasi->logo_text_aplikasis)}}">
                                        <img src="{{URL::asset('storage/'.$aplikasi->logo_text_aplikasis)}}" width="250">
                                    </a>
                                @endif
							</div>
                            <br/>
							<input id="userfile_gambar_lowongan_kerja" class="form-control" type="file" name="userfile_gambar_lowongan_kerja">
							{{\App\Helpers\General::pesanErrorForm($errors->first('userfile_gambar_lowongan_kerja'))}}
						</div>
                        <div class="mb-3">
                            <label class="form-label" for="judul_lowongan_kerjas">Judul <b style="color:red">*</b></label>
                            <input class="form-control {{ \App\Helpers\General::validForm($errors->first('judul_lowongan_kerjas')) }}" id="judul_lowongan_kerjas" type="text" name="judul_lowongan_kerjas" value="{{Request::old('judul_lowongan_kerjas') == '' ? $lowongan_kerjas->judul_lowongan_kerjas : Request::old('judul_lowongan_kerjas')}}">
                            {{\App\Helpers\General::pesanErrorForm($errors->first('judul_lowongan_kerjas'))}}
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="sekilas_konten_lowongan_kerjas">Sekilas Konten <b style="color:red">*</b></label>
                            <textarea class="form-control {{ \App\Helpers\General::validForm($errors->first('sekilas_konten_lowongan_kerjas')) }}" id="sekilas_konten_lowongan_kerjas" name="sekilas_konten_lowongan_kerjas" rows="5">{{Request::old('sekilas_konten_lowongan_kerjas') == '' ? $lowongan_kerjas->sekilas_konten_lowongan_kerjas : Request::old('sekilas_konten_lowongan_kerjas')}}</textarea>
                            {{\App\Helpers\General::pesanErrorForm($errors->first('sekilas_konten_lowongan_kerjas'))}}
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="konten_lowongan_kerjas">Konten <b style="color:red">*</b></label>
                            <textarea class="form-control {{ \App\Helpers\General::validForm($errors->first('konten_lowongan_kerjas')) }}" id="konten_lowongan_kerjas" name="konten_lowongan_kerjas" rows="5">{{Request::old('konten_lowongan_kerjas') == '' ? $lowongan_kerjas->konten_lowongan_kerjas : Request::old('konten_lowongan_kerjas')}}</textarea>
                            {{\App\Helpers\General::pesanErrorForm($errors->first('konten_lowongan_kerjas'))}}
                        </div>
                    </div>
                    <div class="card-footer right-align">
                        {{\App\Helpers\General::perbarui()}}
			          	@if(request()->session()->get('halaman') != '')
		            		@php($ambil_kembali = request()->session()->get('halaman'))
	                    @else
	                    	@php($ambil_kembali = URL('dashboard/lowongan-kerja'))
	                    @endif
						{{\App\Helpers\General::batal($ambil_kembali)}}
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection