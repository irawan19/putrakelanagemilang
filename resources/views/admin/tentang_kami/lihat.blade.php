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
                            <label class="form-label" for="text1_tentang_kamis">Text 1 <b style="color:red">*</b></label>
                            <input class="form-control {{ \App\Helpers\General::validForm($errors->first('text1_tentang_kamis')) }}" id="text1_tentang_kamis" type="text" name="text1_tentang_kamis" value="{{Request::old('text1_tentang_kamis') == '' ? $tentang_kamis->text1_tentang_kamis : Request::old('text1_tentang_kamis')}}">
                            {{\App\Helpers\General::pesanErrorForm($errors->first('text1_tentang_kamis'))}}
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="text2_tentang_kamis">Text 2 <b style="color:red">*</b></label>
                            <input class="form-control {{ \App\Helpers\General::validForm($errors->first('text2_tentang_kamis')) }}" id="text2_tentang_kamis" type="text" name="text2_tentang_kamis" value="{{Request::old('text2_tentang_kamis') == '' ? $tentang_kamis->text2_tentang_kamis : Request::old('text2_tentang_kamis')}}">
                            {{\App\Helpers\General::pesanErrorForm($errors->first('text2_tentang_kamis'))}}
                        </div>
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

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <strong>Detail</strong>
                        </div>
                        <div class="col-md-6 right-align">
                            {{\App\Helpers\General::tambah('dashboard/tentang-kami/tambahdetail')}}
                        </div>
                    </div>
                </div>
                <div class="card-body">
	            	<div class="scrolltable">
                        <table id="tablesort" class="table table-responsive-sm table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th class="nowrap"></th>
                                    <th class="nowrap" width="10px">No</th>
                                    <th class="nowrap">Icon</th>
                                    <th class="nowrap">Judul</th>
                                    <th class="nowrap">Konten</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!$tentang_kami_details->isEmpty())
					    			@php($no = 1)
		            				@foreach($tentang_kami_details as $tentang_kami_detail)
                                        <tr>
                                            <td class="nowrap">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary dropdown-toggle" data-coreui-toggle="dropdown" aria-expanded="false">
                                                        Pilih
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            {{\App\Helpers\General::edit('dashboard/tentang-kami/editdetail/'.$tentang_kami_detail->id_tentang_kami_details)}}
                                                        </li>
                                                        <li>
                                                            {{\App\Helpers\General::hapus('dashboard/tentang-kami/hapusdetail/'.$tentang_kami_detail->id_tentang_kami_details, $tentang_kami_detail->url_tentang_kami_details)}}
                                                        </li>
                                                    </ul>
                                                </div>
											</td>
                                            <td class="nowrap">{{$no}}</td>
                                            <td class="nowrap">{{$tentang_kami_detail->icon_tentang_kami_details}}</td>
                                            <td class="nowrap">{{$tentang_kami_detail->judul_tentang_kami_details}}</td>
                                            <td class="nowrap">{!! $tentang_kami_detail->konten_tentang_kami_details !!}</td>
                                            </tr>
                                        @php($no++)
                                    @endforeach
                                @else
                                    <td colspan="5" class="center-align">Tidak ada data ditampilkan</td>
								    <td style="display:none"></td>
								    <td style="display:none"></td>
								    <td style="display:none"></td>
								    <td style="display:none"></td>
                                @endif
                            </tbody>
				    	</table>
				    </div>
                </div>
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