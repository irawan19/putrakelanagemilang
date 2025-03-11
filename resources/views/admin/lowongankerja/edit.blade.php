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
                            <label class="form-label" for="judul_lowongan_kerjas">Url <b style="color:red">*</b></label>
                            <input class="form-control {{ \App\Helpers\General::validForm($errors->first('judul_lowongan_kerjas')) }}" id="judul_lowongan_kerjas" type="text" name="judul_lowongan_kerjas" value="{{Request::old('judul_lowongan_kerjas') == '' ? $lowongan_kerjas->judul_lowongan_kerjas : Request::old('judul_lowongan_kerjas')}}">
                            {{\App\Helpers\General::pesanErrorForm($errors->first('judul_lowongan_kerjas'))}}
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