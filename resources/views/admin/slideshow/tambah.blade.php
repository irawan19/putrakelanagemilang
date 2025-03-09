@extends('layouts.back.app')
@section('content')

    <div class="row g-4 mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>Tambah Slideshow</strong>
                </div>
				<form class="form-horizontal m-t-40" enctype="multipart/form-data" action="{{ URL('dashboard/slideshow/prosestambah') }}" method="POST">
					{{ csrf_field() }}
                    <div class="card-body">
						<div class="mb-3">
							<label class="form-col-form-label" for="userfile_gambar_slideshow">Gambar (512x410px) <b style="color:red">*</b></label>
							<br/>
							<input id="userfile_gambar_slideshow" class="form-control" type="file" name="userfile_gambar_slideshow">
							{{\App\Helpers\General::pesanErrorForm($errors->first('userfile_gambar_slideshow'))}}
						</div>
                        <div class="mb-3">
                            <label class="form-label" for="judul_slideshows">Judul <b style="color:red">*</b></label>
                            <input class="form-control {{ \App\Helpers\General::validForm($errors->first('judul_slideshows')) }}" id="judul_slideshows" type="text" name="judul_slideshows" value="{{Request::old('judul_slideshows')}}">
                            {{\App\Helpers\General::pesanErrorForm($errors->first('judul_slideshows'))}}
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="text1_slideshows">Text 1 <b style="color:red">*</b></label>
                            <input class="form-control {{ \App\Helpers\General::validForm($errors->first('text1_slideshows')) }}" id="text1_slideshows" type="text" name="text1_slideshows" value="{{Request::old('text1_slideshows')}}">
                            {{\App\Helpers\General::pesanErrorForm($errors->first('text1_slideshows'))}}
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="text2_slideshows">Text 2 <b style="color:red">*</b></label>
                            <input class="form-control {{ \App\Helpers\General::validForm($errors->first('text2_slideshows')) }}" id="text2_slideshows" type="text" name="text2_slideshows" value="{{Request::old('text2_slideshows')}}">
                            {{\App\Helpers\General::pesanErrorForm($errors->first('text2_slideshows'))}}
                        </div>
                    </div>
                    <div class="card-footer right-align">
                        {{\App\Helpers\General::simpan()}}
			          	@if(request()->session()->get('halaman') != '')
		            		@php($ambil_kembali = request()->session()->get('halaman'))
	                    @else
	                    	@php($ambil_kembali = URL('dashboard/slideshow'))
	                    @endif
						{{\App\Helpers\General::batal($ambil_kembali)}}
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection