@extends('layouts.back.app')
@section('content')

    <div class="row g-4 mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>Tambah Pertanyaan Umum</strong>
                </div>
				<form class="form-horizontal m-t-40" action="{{ URL('dashboard/pertanyaan-umum/prosestambah') }}" method="POST">
					{{ csrf_field() }}
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="pertanyaan_pertanyaan_umums">Pertanyaan <b style="color:red">*</b></label>
                            <input class="form-control {{ \App\Helpers\General::validForm($errors->first('pertanyaan_pertanyaan_umums')) }}" id="pertanyaan_pertanyaan_umums" type="text" name="pertanyaan_pertanyaan_umums" value="{{Request::old('pertanyaan_pertanyaan_umums')}}">
                            {{\App\Helpers\General::pesanErrorForm($errors->first('pertanyaan_pertanyaan_umums'))}}
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="jawaban_pertanyaan_umums">Jawaban <b style="color:red">*</b></label>
                            <textarea class="form-control {{ \App\Helpers\General::validForm($errors->first('jawaban_pertanyaan_umums')) }}" id="jawaban_pertanyaan_umums" name="jawaban_pertanyaan_umums" rows="5">{{Request::old('jawaban_pertanyaan_umums')}}</textarea>
                            {{\App\Helpers\General::pesanErrorForm($errors->first('jawaban_pertanyaan_umums'))}}
                        </div>
                    </div>
                    <div class="card-footer right-align">
                        {{\App\Helpers\General::simpan()}}
			          	@if(request()->session()->get('halaman') != '')
		            		@php($ambil_kembali = request()->session()->get('halaman'))
	                    @else
	                    	@php($ambil_kembali = URL('dashboard/pertanyaan-umum'))
	                    @endif
						{{\App\Helpers\General::batal($ambil_kembali)}}
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection