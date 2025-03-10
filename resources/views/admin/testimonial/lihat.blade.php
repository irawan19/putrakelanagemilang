@extends('layouts.back.app')
@section('content')

    <div class="row g-4 mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <strong>Testimonial</strong>
                        </div>
                        <div class="col-md-6 right-align">
                            {{\App\Helpers\General::tambah('dashboard/testimonial/tambah')}}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="GET" action="{{ URL('dashboard/testimonial/cari') }}">
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
                                    <th class="nowrap">Nama</th>
                                    <th class="nowrap">Jabatan</th>
                                    <th class="nowrap">Konten</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!$testimonials->isEmpty())
					    			@php($no = 1)
		            				@foreach($testimonials as $testimonial)
                                        <tr>
                                            <td class="nowrap">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary dropdown-toggle" data-coreui-toggle="dropdown" aria-expanded="false">
                                                        Pilih
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            {{\App\Helpers\General::edit('dashboard/testimonial/edit/'.$testimonial->id_testimonials)}}
                                                        </li>
                                                        <li>
                                                            {{\App\Helpers\General::hapus('dashboard/testimonial/hapus/'.$testimonial->id_testimonials, $testimonial->url_testimonials)}}
                                                        </li>
                                                    </ul>
                                                </div>
											</td>
                                            <td class="nowrap">{{$no}}</td>
								    		<td class="nowrap">
                                                @if($testimonial->gambar_testimonials !== 'template/front/img/default-testimonial.png')
                                                    <a data-fancybox="gallery" href="{{URL::asset('storage/'.$testimonial->gambar_testimonials)}}">
                                                        <img src="{{ URL::asset('storage/'.$testimonial->gambar_testimonials) }}" width="50">
                                                    </a>
                                                @else
                                                    <a data-fancybox="gallery" href="{{URL::asset($testimonial->gambar_testimonials)}}">
                                                        <img src="{{ URL::asset($testimonial->gambar_testimonials) }}" width="50">
                                                    </a>
                                                @endif
                                            </td>
                                            <td class="nowrap">{{$testimonial->nama_testimonials}}</td>
                                            <td class="nowrap">{{$testimonial->jabatan_testimonials}}</td>
                                            <td class="nowrap">{!! nl2br($testimonial->konten_testimonials) !!}</td>
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
				   	{{ $testimonials->appends(Request::except('page'))->links('vendor.pagination.custom') }}
                </div>
            </div>
        </div>
    </div>

@endsection