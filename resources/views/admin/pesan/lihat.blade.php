@extends('layouts.back.app')
@section('content')

    <div class="row g-4 mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <strong>Pesan</strong>
                        </div>
                        <div class="col-md-6 right-align">
                            {{\App\Helpers\General::tambah('dashboard/pesan/tambah')}}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="GET" action="{{ URL('dashboard/pesan/cari') }}">
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
                                    <th class="nowrap" width="50px">No</th>
                                    <th class="nowrap">Tanggal</th>
                                    <th class="nowrap">Nama</th>
                                    <th class="nowrap">Telepon</th>
                                    <th class="nowrap">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!$pesans->isEmpty())
					    			@php($no = 1)
		            				@foreach($pesans as $pesan)
                                        @php($stylebelumbaca = '')
                                        @if($pesan->status_baca_pesans !== 1)
                                            @php($stylebelumbaca = 'style=font-weight:bold')
                                        @endif
                                        <tr {{$stylebelumbaca}}>
                                            <td class="nowrap">
                                                {{\App\Helpers\General::bacatombol('dashboard/pesan/baca/'.$pesan->id_pesans)}}
											</td>
                                            <td class="nowrap">{{$no}}</td>
                                            <td class="nowrap">{{\App\Helpers\General::ubahDBKeTanggalWaktu($pesan->created_at)}}</td>
                                            <td class="nowrap">{{$pesan->nama_pesans}}</td>
                                            <td class="nowrap">{{$pesan->telepon_pesans}}</td>
                                            <td class="nowrap">{{$pesan->email_pesans}}</td>
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
					<br/>
				   	{{ $pesans->appends(Request::except('page'))->links('vendor.pagination.custom') }}
                </div>
            </div>
        </div>
    </div>

@endsection