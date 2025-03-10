@extends('layouts.back.app')
@section('content')

    <div class="row g-4 mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>Edit Testimonial</strong>
                </div>
				<form class="form-horizontal m-t-40" enctype="multipart/form-data" action="{{ URL('dashboard/testimonial/prosesedit/'.$testimonials->id_testimonials) }}" method="POST">
					{{ csrf_field() }}
                    @method('PATCH')
                    <div class="card-body">
						<div class="mb-3">
							<label class="form-col-form-label" for="userfile_gambar_testimonial">Gambar (400x500px)</label>
							<br/>
							<div class="form-group center-align">
							    <a data-fancybox="gallery" href="{{URL::asset('storage/'.$testimonials->gambar_testimonials)}}">
							    	<img src="{{URL::asset('storage/'.$testimonials->gambar_testimonials)}}" width="250">
							    </a>
							</div>
                            <br/>
							<input id="userfile_gambar_testimonial" class="form-control" type="file" name="userfile_gambar_testimonial">
							{{\App\Helpers\General::pesanErrorForm($errors->first('userfile_gambar_testimonial'))}}
						</div>
                        <div class="mb-3">
                            <label class="form-label" for="nama_testimonials">Nama <b style="color:red">*</b></label>
                            <input class="form-control {{ \App\Helpers\General::validForm($errors->first('nama_testimonials')) }}" id="nama_testimonials" type="text" name="nama_testimonials" value="{{Request::old('nama_testimonials') == '' ? $testimonials->nama_testimonials : Request::old('nama_testimonials')}}">
                            {{\App\Helpers\General::pesanErrorForm($errors->first('nama_testimonials'))}}
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="jabatan_testimonials">Jabatan <b style="color:red">*</b></label>
                            <input class="form-control {{ \App\Helpers\General::validForm($errors->first('jabatan_testimonials')) }}" id="jabatan_testimonials" type="text" name="jabatan_testimonials" value="{{Request::old('jabatan_testimonials') == '' ? $testimonials->jabatan_testimonials : Request::old('jabatan_testimonials')}}">
                            {{\App\Helpers\General::pesanErrorForm($errors->first('jabatan_testimonials'))}}
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="konten_testimonials">Konten <b style="color:red">*</b></label>
                            <textarea class="form-control {{ \App\Helpers\General::validForm($errors->first('konten_testimonials')) }}" id="konten_testimonials" name="konten_testimonials" rows="5">{{Request::old('konten_testimonials') == '' ? $testimonials->konten_testimonials}}</textarea>
                            {{\App\Helpers\General::pesanErrorForm($errors->first('konten_testimonials'))}}
                        </div>
                    </div>
                    <div class="card-footer right-align">
                        {{\App\Helpers\General::perbarui()}}
			          	@if(request()->session()->get('halaman') != '')
		            		@php($ambil_kembali = request()->session()->get('halaman'))
	                    @else
	                    	@php($ambil_kembali = URL('dashboard/testimonial'))
	                    @endif
						{{\App\Helpers\General::batal($ambil_kembali)}}
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection