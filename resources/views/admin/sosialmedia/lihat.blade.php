@extends('layouts.back.app')
@section('content')

    <div class="row g-4 mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <strong>Sosial Media</strong>
                        </div>
                        <div class="col-md-6 right-align">
                            {{\App\Helpers\General::tambah('dashboard/sosial-media/tambah')}}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="GET" action="{{ URL('dashboard/sosial-media/cari') }}">
						@csrf
	                	<div class="input-group">
	                		<input class="form-control" id="input2-group2" type="text" name="cari_kata" placeholder="Cari" value="{{$hasil_kata}}">
	                		<span class="input-group-append">
	                		  	<button class="btn btn-primary" type="submit"> Cari</button>
	                		</span>
	                	</div>
	                </form>
	            	<br/>
	            	<div class="scrolltable">
                        <table id="tablesort" class="table table-responsive-sm table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th class="nowrap"></th>
                                    <th class="nowrap" width="10px">No</th>
                                    <th class="nowrap">Nama</th>
                                    <th class="nowrap">Url</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!$sosialmedias->isEmpty())
					    			@php($no = 1)
		            				@foreach($sosialmedias as $sosialmedia)
                                        <tr>
                                            <td class="nowrap">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary dropdown-toggle" data-coreui-toggle="dropdown" aria-expanded="false">
                                                        Pilih
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            {{\App\Helpers\General::edit('dashboard/sosial-media/edit/'.$sosialmedia->id_sosial_medias)}}
                                                        </li>
                                                        <div class="dropdown-divider"></div>
                                                        <li>
                                                            {{\App\Helpers\General::hapus('dashboard/sosial-media/hapus/'.$sosialmedia->id_sosial_medias, $sosialmedia->url_sosial_medias)}}
                                                        </li>
                                                    </ul>
                                                </div>
											</td>
                                            <td class="nowrap">{{$no}}</td>
                                            <td class="nowrap">{{$sosialmedia->nama_sosial_medias}}</td>
                                            <td class="nowrap">
                                                <a href="{{$sosialmedia->url_sosial_medias}}" target="_blank">
                                                    {{$sosialmedia->url_sosial_medias}}
                                                </a>
                                            </td>
                                        </tr>
                                        @php($no++)
                                    @endforeach
                                @else
                                    <td colspan="4" class="center-align">Tidak ada data ditampilkan</td>
								    <td style="display:none"></td>
								    <td style="display:none"></td>
								    <td style="display:none"></td>
                                @endif
                            </tbody>
				    	</table>
				    </div>
					<br/>
				   	{{ $sosialmedias->appends(Request::except('page'))->links('vendor.pagination.custom') }}
                </div>
            </div>
        </div>
    </div>

@endsection