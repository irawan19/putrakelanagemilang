@extends('layouts.back.app')
@section('content')

    <div class="row g-4 mb-4">
        <div class="col-md-12">
            <div class="card">
                <form class="form-horizontal m-t-40" enctype="multipart/form-data" action="{{ URL('dashboard/tentang-kami/prosesedit') }}" method="POST">
                    {{ csrf_field() }}
                    @method('PATCH')
                    <div class="card-header">
                        <strong>Tentang Kami</strong>
                    </div>
                    <div class="card-body">
						<div class="mb-3">
							<label class="form-col-form-label" for="userfile_gambar_tentang_kami">Gambar (500x250px)</label>
							<br/>
							<div class="form-group center-align">
							    <a data-fancybox="gallery" href="{{URL::asset('storage/'.$tentang_kamis->gambar_tentang_kamis)}}">
							    	<img src="{{URL::asset('storage/'.$tentang_kamis->gambar_tentang_kamis)}}" width="250">
							    </a>
							</div>
                            <br/>
							<input id="userfile_gambar_tentang_kami" class="form-control" type="file" name="userfile_gambar_tentang_kami">
							{{\App\Helpers\General::pesanErrorForm($errors->first('userfile_gambar_tentang_kami'))}}
						</div>
                        <div class="mb-3">
                            <label class="form-label" for="konten_sekilas_tentang_kamis">Konten Sekilas <b style="color:red">*</b></label>
                            <textarea class="form-control {{ \App\Helpers\General::validForm($errors->first('konten_sekilas_tentang_kamis')) }}" id="konten_sekilas_tentang_kamis" name="konten_sekilas_tentang_kamis" rows="5">{{Request::old('konten_sekilas_tentang_kamis') == '' ? $tentang_kamis->konten_sekilas_tentang_kamis : Request::old('konten_sekilas_tentang_kamis')}}</textarea>
                            {{\App\Helpers\General::pesanErrorForm($errors->first('konten_sekilas_tentang_kamis'))}}
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="konten_tentang_kamis">Konten <b style="color:red">*</b></label>
                            <textarea class="form-control {{ \App\Helpers\General::validForm($errors->first('konten_tentang_kamis')) }}" id="konten_tentang_kamis" name="konten_tentang_kamis" rows="5">{{Request::old('konten_tentang_kamis') == '' ? $tentang_kamis->konten_tentang_kamis : Request::old('konten_tentang_kamis')}}</textarea>
                            {{\App\Helpers\General::pesanErrorForm($errors->first('konten_tentang_kamis'))}}
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="konten_footer_tentang_kamis">Konten Footer <b style="color:red">*</b></label>
                            <textarea class="form-control {{ \App\Helpers\General::validForm($errors->first('konten_footer_tentang_kamis')) }}" id="konten_footer_tentang_kamis" name="konten_footer_tentang_kamis" rows="5">{{Request::old('konten_footer_tentang_kamis') == '' ? $tentang_kamis->konten_footer_tentang_kamis : Request::old('konten_footer_tentang_kamis')}}</textarea>
                            {{\App\Helpers\General::pesanErrorForm($errors->first('konten_footer_tentang_kamis'))}}
                        </div>
                    </div>
                    <div class="card-footer right-align">
                        {{\App\Helpers\General::perbarui()}}
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    @if (Session::get('setelah_simpan.alert') == 'sukses')
        @include('layouts.back.modalsukses')
        <script>
            $(window).on('load', function() {
                $('#modalsukses').modal('show');
            });
        </script>
    @endif
@endsection