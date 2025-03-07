@extends('layouts.back.app')
@section('content')

    <div class="row g-4 mb-4">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row" style="margin-top:30px !important;">
				    	<div class="col-sm-12">
					    	<div style="text-align: center;">
					    		<img src="{{URL::asset('storage/'.$aplikasi->logo_text_aplikasis)}}" width="100%" style="max-width:256px">
					    	</div>
					    </div>
				    	<div class="col-sm-12">
				    		<div class="center-align">
				    			<p style="font-weight: bold; font-size: 20px; margin-bottom: 5px">Halo, {{Auth::user()->name}}</p>
				    			<p style="font-size: 16px">Selamat Datang di halaman admin {{$aplikasi->nama_aplikasis}}</p>
				    		</div>
				    	</div>
				    </div>
                </div>
            </div>
        </div>
    </div>

@endsection