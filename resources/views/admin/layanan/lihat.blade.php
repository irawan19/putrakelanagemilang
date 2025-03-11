@extends('layouts.back.app')
@section('content')

    <div class="row g-4 mb-4">
        <div class="col-md-12">
            <div class="card">
                <form class="form-horizontal m-t-40" action="{{ URL('dashboard/layanan/prosesedit') }}" method="POST">
                    {{ csrf_field() }}
                    @method('PATCH')
                    <div class="card-header">
                        <strong>Layanan</strong>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="text1_layanans">Text 1 <b style="color:red">*</b></label>
                            <input class="form-control {{ \App\Helpers\General::validForm($errors->first('text1_layanans')) }}" id="text1_layanans" type="text" name="text1_layanans" value="{{Request::old('text1_layanans') == '' ? $layanans->text1_layanans : Request::old('text1_layanans')}}">
                            {{\App\Helpers\General::pesanErrorForm($errors->first('text1_layanans'))}}
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="text2_layanans">Text 2 <b style="color:red">*</b></label>
                            <input class="form-control {{ \App\Helpers\General::validForm($errors->first('text2_layanans')) }}" id="text2_layanans" type="text" name="text2_layanans" value="{{Request::old('text2_layanans') == '' ? $layanans->text2_layanans : Request::old('text2_layanans')}}">
                            {{\App\Helpers\General::pesanErrorForm($errors->first('text2_layanans'))}}
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
                            {{\App\Helpers\General::tambah('dashboard/layanan/tambahdetail')}}
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
                                    <th class="nowrap">Gambar</th>
                                    <th class="nowrap">Icon</th>
                                    <th class="nowrap">Judul</th>
                                    <th class="nowrap">Konten</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!$layanan_details->isEmpty())
					    			@php($no = 1)
		            				@foreach($layanan_details as $layanan_detail)
                                        <tr>
                                            <td class="nowrap">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary dropdown-toggle" data-coreui-toggle="dropdown" aria-expanded="false">
                                                        Pilih
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            {{\App\Helpers\General::edit('dashboard/layanan/editdetail/'.$layanan_detail->id_layanan_details)}}
                                                        </li>
                                                        <li>
                                                            {{\App\Helpers\General::hapus('dashboard/layanan/hapusdetail/'.$layanan_detail->id_layanan_details, $layanan_detail->url_layanan_details)}}
                                                        </li>
                                                    </ul>
                                                </div>
											</td>
                                            <td class="nowrap">{{$no}}</td>
								    		<td class="nowrap">
                                                <a data-fancybox="gallery" href="{{URL::asset('storage/'.$layanan_detail->gambar_layanan_details)}}">
                                                    <img src="{{ URL::asset('storage/'.$layanan_detail->gambar_layanan_details) }}" width="108">
                                                </a>
                                            </td>
                                            <td class="nowrap">{{$layanan_detail->icon_layanan_details}}</td>
                                            <td class="nowrap">{{$layanan_detail->judul_layanan_details}}</td>
                                            <td class="nowrap">{!! $layanan_detail->konten_layanan_details !!}</td>
                                            </tr>
                                        @php($no++)
                                    @endforeach
                                @else
                                    <td colspan="6" class="center-align">Tidak ada data ditampilkan</td>
								    <td style="display:none"></td>
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