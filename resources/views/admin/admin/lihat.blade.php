@extends('layouts.back.app')
@section('content')

    <div class="row g-4 mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <strong>Admin</strong>
                        </div>
                        <div class="col-md-6 right-align">
                            {{\App\Helpers\General::tambah('dashboard/admin/tambah')}}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="GET" action="{{ URL('dashboard/admin/cari') }}">
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
                                    <th class="nowrap">Nama</th>
                                    <th class="nowrap">Username</th>
                                    <th class="nowrap">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!$admins->isEmpty())
					    			@php($no = 1)
		            				@foreach($admins as $admin)
                                        <tr>
                                            <td class="nowrap">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary dropdown-toggle" data-coreui-toggle="dropdown" aria-expanded="false">
                                                        Pilih
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            {{\App\Helpers\General::edit('dashboard/admin/edit/'.$admin->id)}}
                                                        </li>
                                                        <li>
                                                            {{\App\Helpers\General::hapus('dashboard/admin/hapus/'.$admin->id, $admin->name)}}
                                                        </li>
                                                    </ul>
                                                </div>
											</td>
                                            <td class="nowrap">{{$no}}</td>
                                            <td class="nowrap">{{$admin->name}}</td>
                                            <td class="nowrap">{{$admin->username}}</td>
                                            <td class="nowrap">{{$admin->email}}</td>
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
				   	{{ $admins->appends(Request::except('page'))->links('vendor.pagination.custom') }}
                </div>
            </div>
        </div>
    </div>

@endsection