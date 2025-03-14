@extends('layouts.back.app')
@section('content')

    <div class="row g-4 mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <strong>Slideshow</strong>
                        </div>
                        <div class="col-md-6 right-align">
                            {{\App\Helpers\General::tambah('dashboard/slideshow/tambah')}}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="GET" action="{{ URL('dashboard/slideshow/cari') }}">
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
                                    <th class="nowrap">Gambar</th>
                                    <th class="nowrap">Text 1</th>
                                    <th class="nowrap">Text 2</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!$slideshows->isEmpty())
					    			@php($no = 1)
		            				@foreach($slideshows as $slideshow)
                                        <tr>
                                            <td class="nowrap">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary dropdown-toggle" data-coreui-toggle="dropdown" aria-expanded="false">
                                                        Pilih
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            {{\App\Helpers\General::edit('dashboard/slideshow/edit/'.$slideshow->id_slideshows)}}
                                                        </li>
                                                        <div class="dropdown-divider"></div>
                                                        <li>
                                                            {{\App\Helpers\General::hapus('dashboard/slideshow/hapus/'.$slideshow->id_slideshows, $slideshow->url_slideshows)}}
                                                        </li>
                                                    </ul>
                                                </div>
											</td>
                                            <td class="nowrap">{{$no}}</td>
								    		<td class="nowrap">
                                                <a data-fancybox="gallery" href="{{URL::asset('storage/'.$slideshow->gambar_slideshows)}}">
                                                    <img src="{{ URL::asset('storage/'.$slideshow->gambar_slideshows) }}" width="108">
                                                </a>
                                            </td>
                                            <td class="nowrap">{{$slideshow->text1_slideshows}}</td>
                                            <td class="nowrap">{{$slideshow->text2_slideshows}}</td>
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
				   	{{ $slideshows->appends(Request::except('page'))->links('vendor.pagination.custom') }}
                </div>
            </div>
        </div>
    </div>

@endsection