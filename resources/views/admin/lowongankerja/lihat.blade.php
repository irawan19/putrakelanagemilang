@extends('layouts.back.app')
@section('content')

    <div class="row g-4 mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <strong>Lowongan Kerja</strong>
                        </div>
                        <div class="col-md-6 right-align">
                            {{\App\Helpers\General::tambah('dashboard/lowongan-kerja/tambah')}}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="GET" action="{{ URL('dashboard/lowongan-kerja/cari') }}">
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
                                    <th class="nowrap">Judul</th>
                                    <th class="nowrap">Pelamar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!$lowongankerjas->isEmpty())
					    			@php($no = 1)
		            				@foreach($lowongankerjas as $lowongankerja)
                                        <tr>
                                            <td class="nowrap">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary dropdown-toggle" data-coreui-toggle="dropdown" aria-expanded="false">
                                                        Pilih
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            {{\App\Helpers\General::baca('dashboard/lowongan-kerja/baca/'.$lowongankerja->id_lowongan_kerjas)}}
                                                        </li>
                                                        <li>
                                                            {{\App\Helpers\General::edit('dashboard/lowongan-kerja/edit/'.$lowongankerja->id_lowongan_kerjas)}}
                                                        </li>
                                                        <li>
                                                            {{\App\Helpers\General::hapus('dashboard/lowongan-kerja/hapus/'.$lowongankerja->id_lowongan_kerjas, $lowongankerja->url_lowongan_kerjas)}}
                                                        </li>
                                                    </ul>
                                                </div>
											</td>
                                            <td class="nowrap">{{$no}}</td>
                                            <td class="nowrap">{{$lowongankerja->judul_lowongan_kerjas}}</td>
                                            <td class="nowrap">
                                                @php($jumlah_pelamar = \App\Models\Pelamar_lowongan_kerja::where('lowongan_kerjas_id',$lowongankerja->id_lowongan_kerjas)->count())
                                                {{$jumlah_pelamar}}
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
				   	{{ $lowongankerjas->appends(Request::except('page'))->links('vendor.pagination.custom') }}
                </div>
            </div>
        </div>
    </div>

@endsection