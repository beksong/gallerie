@extends('adminlte::page')

@section('csrf')
    <meta id="token" name="token" value="{{ csrf_token() }}">
@stop

@section('title', 'Gallerie | POS')

@section('content_header')
    <h1>Master Kategori</h1>
@stop

@section('content')

<!-- gate filter can add category -->
@permission('create_category')
<a href="" class="btn btn-success" style="margin-bottom:10px;" data-toggle="modal" data-target="#addkategorimodal"><i class="fa fa-btn fa-plus"></i>
    Tambah Kategori
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
	<table class="table table-bordered table-hover" id="tbkategori">
		<thead>
			<th>No.</th>
			<th>Nama Kategori</th>
			<th>Action</th>
		</thead>
		<tbody>
            @foreach($kats as $key=>$kat)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$kat->kategori}}</td>
                    <td>
                        @permission('update_category')
                        <a href="" class="btn btn-warning" data-toggle="modal" data-target="#editkategorimodal" data-kategori_id="{{$kat->id}}" data-kategori="{{$kat->kategori}}"><i class="fa fa-btn fa-pencil"></i></a>
                        @endpermission
                        @permission('delete_category')
                        <a href="" class="btn btn-danger" data-toggle="modal" data-target="#delkategorimodal" data-kategori_id="{{$kat->id}}" data-kategori="{{$kat->kategori}}"><i class="fa fa-btn fa-trash"></i></a>
                        @endpermission
                    </td>
                </tr>
            @endforeach
		</tbody>	
	</table>
</div>
    <!-- modal -->
    @include('kategori.addkategorimodal')
    @include('kategori.editkategorimodal')
    @include('kategori.delkategorimodal')
@stop

@section('js')
<script src="{{ url('js/myjs.js') }}"></script>
<script src="{{ url('js/Category.js') }}"></script>

@stop