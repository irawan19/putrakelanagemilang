@extends('layouts.back.app')
@section('content')

    <div class="row g-4 mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>Baca Pesan</strong>
                </div>
                <div class="card-body">
					<table width="100%" class="table">
						<tr>
							<th width="10px">Nama</th>
							<th width="1px">:</th>
							<td>{{$baca_pesans->nama_pesans}}</td>
						</tr>
						<tr>
							<th>Email</th>
							<th>:</th>
							<td>{{$baca_pesans->email_pesans}}</td>
						</tr>
						<tr>
							<th>Telepon</th>
							<th>:</th>
							<td>{{$baca_pesans->telepon_pesans}}</td>
						</tr>
						<tr>
							<th>Pesan</th>
							<th>:</th>
							<td>{!! $baca_pesans->konten_pesans !!}</td>
						</tr>
                    </table>
                </div>
                <div class="card-footer right-align">
			      	@if(request()->session()->get('halaman') != '')
		        		@php($ambil_kembali = request()->session()->get('halaman'))
	                @else
	                	@php($ambil_kembali = URL('dashboard/pesan'))
	                @endif
				    {{\App\Helpers\General::kembali($ambil_kembali)}}
                </div>
            </div>
        </div>
    </div>

@endsection