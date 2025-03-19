@extends('layouts.back.app')
@section('content')

    <div class="row g-4 mb-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <strong>Baca Lowongan Kerja</strong>
                </div>
                <div class="card-body">
					<table width="100%" class="table">
						<tr>
							<th width="10px">Gambar</th>
							<th width="1px">:</th>
							<td>
                                @if($lowongan_kerjas->gambar_lowongan_kerjas != '')
                                    <a data-fancybox="gallery" href="{{URL::asset('storage/'.$lowongan_kerjas->gambar_lowongan_kerjas)}}">
                                        <img src="{{URL::asset('storage/'.$lowongan_kerjas->gambar_lowongan_kerjas)}}" width="250">
                                    </a>
                                @else
                                    <a data-fancybox="gallery" href="{{URL::asset('storage/'.$aplikasi->logo_text_aplikasis)}}">
                                        <img src="{{URL::asset('storage/'.$aplikasi->logo_text_aplikasis)}}" width="250">
                                    </a>
                                @endif
                            </td>
						</tr>
						<tr>
							<th>Judul</th>
							<th>:</th>
							<td>{{$lowongan_kerjas->judul_lowongan_kerjas}}</td>
						</tr>
						<tr>
							<th>Sekilas</th>
							<th>:</th>
							<td>{!! nl2br($lowongan_kerjas->sekilas_konten_lowongan_kerjas) !!}</td>
						</tr>
						<tr>
							<th>Konten</th>
							<th>:</th>
							<td>{!! nl2br($lowongan_kerjas->konten_lowongan_kerjas) !!}</td>
						</tr>
                    </table>
                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <strong>List Pelamar</strong>
                </div>
                <div class="card-body">
					
				<div class="scrolltable">
                        <table id="tablesort" class="table table-responsive-sm table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th class="nowrap" width="10px">No</th>
                                    <th class="nowrap">Nama</th>
                                    <th class="nowrap">Email</th>
                                    <th class="nowrap">Telepon</th>
                                    <th class="nowrap">CV</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!$pelamar_lowongan_kerjas->isEmpty())
					    			@php($no = 1)
		            				@foreach($pelamar_lowongan_kerjas as $pelamar_lowongan_kerja)
                                        <tr>
                                            <td class="nowrap">{{$no}}</td>
								    		<td class="nowrap">{{$pelamar_lowongan_kerja->nama_lengkap_pelamar_lowongan_kerjas}}</td>
                                            <td class="nowrap">{{$pelamar_lowongan_kerja->email_pelamar_lowongan_kerjas}}</td>
                                            <td class="nowrap">{{$pelamar_lowongan_kerja->telepon_pelamar_lowongan_kerjas}}</td>
                                            <td class="nowrap">
												<a href="{{URL::asset('storage/'.$pelamar_lowongan_kerja->cv_pelamar_lowongan_kerjas)}}" target="_blank">
													Download
												</a>
											</td>
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
					<br/>
				   	{{ $pelamar_lowongan_kerjas->appends(Request::except('page'))->links('vendor.pagination.custom') }}
				</div>
                <div class="card-footer right-align">
			      	@if(request()->session()->get('halaman') != '')
		        		@php($ambil_kembali = request()->session()->get('halaman'))
	                @else
	                	@php($ambil_kembali = URL('dashboard/lowongan_kerja'))
	                @endif
				    {{\App\Helpers\General::kembali($ambil_kembali)}}
                </div>
            </div>
        </div>
    </div>

@endsection