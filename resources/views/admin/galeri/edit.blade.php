@extends('layouts.back.app')
@section('content')

    <div class="row g-4 mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>Edit Galeri</strong>
                </div>
				<form class="form-horizontal m-t-40" enctype="multipart/form-data" action="{{ URL('dashboard/galeri/prosesedit/'.$galeris->id_galeris) }}" method="POST">
					{{ csrf_field() }}
                    @method('PATCH')
                    <div class="card-body">
						<div class="mb-3">
							<label class="form-col-form-label" for="userfile_foto_galeri">Foto (512x512px) <b style="color:red">*</b></label>
							<br/>
							<div class="form-group center-align">
							    <a data-fancybox="gallery" href="{{URL::asset('storage/'.$galeris->foto_galeris)}}">
							    	<img src="{{URL::asset('storage/'.$galeris->foto_galeris)}}" width="250">
							    </a>
							</div>
                            <br/>
							<input id="userfile_foto_galeri" class="form-control" type="file" name="userfile_foto_galeri">
							{{\App\Helpers\General::pesanErrorForm($errors->first('userfile_foto_galeri'))}}
						</div>
                        <div class="mb-3">
                            <label class="form-label" for="judul_galeris">Judul <b style="color:red">*</b></label>
                            <input class="form-control {{ \App\Helpers\General::validForm($errors->first('judul_galeris')) }}" id="judul_galeris" type="text" name="judul_galeris" value="{{Request::old('judul_galeris') == '' ? $galeris->judul_galeris : Request::old('judul_galeris')}}">
                            {{\App\Helpers\General::pesanErrorForm($errors->first('judul_galeris'))}}
                        </div>
                    </div>
                    <div class="card-footer right-align">
                        {{\App\Helpers\General::perbarui()}}
			          	@if(request()->session()->get('halaman') != '')
		            		@php($ambil_kembali = request()->session()->get('halaman'))
	                    @else
	                    	@php($ambil_kembali = URL('dashboard/galeri'))
	                    @endif
						{{\App\Helpers\General::batal($ambil_kembali)}}
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection