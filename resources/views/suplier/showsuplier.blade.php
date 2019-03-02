@extends('adminlte::page')

@section('csrf')
    <meta id="token" name="token" value="{{ csrf_token() }}">
@stop

@section('title', 'Gallerie | POS')

@section('content_header')
    <h1>Master Suplier</h1>
@stop

@section('content')

@permission('create_suplier')
<a href="" class="btn btn-success" style="margin-bottom:10px;" data-toggle="modal" data-target="#addsupliermodal"><i class="fa fa-btn fa-plus"></i>
    Tambah Suplier
</a>
@endpermission
<!-- alert -->
@if(Session::has('message'))
     <div class="alert {{ Session::get('alert-class', 'alert-info') }}">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <strong>{{ Session::get('message') }}</strong>
    </div>
@endif
<!-- end alert -->
<div class="table-responsive">
	<table class="table table-bordered table-hover" id="tbsuplier">
		<thead>
			<th>No.</th>
			<th>Nama suplier</th>
            <th>Alamat</th>
            <th>Telp</th>
            <th>Email</th>
			<th>Action</th>
		</thead>
		<tbody>
            @foreach($sups as $key=>$sup)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$sup->nama}}</td>
                    <td>{{$sup->alamat}}</td>
                    <td>{{$sup->telp}}</td>
                    <td>{{$sup->email}}</td>
                    <td>
                        @permission('update_suplier')
                        <a href="" class="btn btn-warning" data-toggle="modal" data-target="#editsupliermodal" data-suplier_id="{{$sup->id}}" data-suplier_nama="{{$sup->nama}}" data-suplier_alamat="{{$sup->alamat}}" data-suplier_telp="{{$sup->telp}}" data-suplier_email="{{$sup->email}}"><i class="fa fa-btn fa-pencil"></i></a>
                        @endpermission
                        @permission('delete_suplier')
                        <a href="" class="btn btn-danger" data-toggle="modal" data-target="#delsupliermodal" data-suplier_id="{{$sup->id}}" data-suplier_nama="{{$sup->nama}}" data-suplier_alamat="{{$sup->alamat}}" data-suplier_telp="{{$sup->telp}}" data-suplier_email="{{$sup->email}}"><i class="fa fa-btn fa-trash"></i></a>
                        @endpermission
                    </td>
                </tr>
            @endforeach
		</tbody>	
	</table>
</div>

    <!-- modal -->
    @include('suplier.addsupliermodal')
    @include('suplier.editsupliermodal')
    @include('suplier.delsupliermodal')
@stop

@section('js')
<script src="{{ url('js/myjs.js') }}"></script>
<script src="{{url('js/Suplier.js') }}"></script>
@stop