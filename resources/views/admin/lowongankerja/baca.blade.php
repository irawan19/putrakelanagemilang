@extends('layouts.back.app')
@section('content')

    <div class="row g-4 mb-4">
        <div class="col-md-12">
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