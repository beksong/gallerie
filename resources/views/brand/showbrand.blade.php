@extends('adminlte::page')

@section('csrf')
    <meta id="token" name="token" value="{{ csrf_token() }}">
@stop

@section('title', 'Gallerie | POS')

@section('content_header')
    <h1>Master Brand Produk/Barang</h1>
@stop

@section('content')

<!-- can create brand via gate -->
@permission('create_brand')
<a href="" class="btn btn-success" style="margin-bottom:10px;" data-toggle="modal" data-target="#addbrandmodal"><i class="fa fa-btn fa-plus"></i>
    Tambah brand
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
	<table class="table table-bordered table-hover" id="tbbrand">
		<thead>
			<th>No.</th>
			<th>Nama brand</th>
			<th>Action</th>
		</thead>
		<tbody>
            @foreach($merks as $key=>$merk)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$merk->brand}}</td>
                    <td>
                        @permission('update_brand')
                        <a href="" class="btn btn-warning" data-toggle="modal" data-target="#editbrandmodal" data-brand_id="{{$merk->id}}" data-brand="{{$merk->brand}}"><i class="fa fa-btn fa-pencil"></i></a>
                        @endpermission
                        @permission('delete_brand')
                        <a href="" class="btn btn-danger" data-toggle="modal" data-target="#delbrandmodal" data-brand_id="{{$merk->id}}" data-brand="{{$merk->brand}}"><i class="fa fa-btn fa-trash"></i></a>
                        @endpermission
                    </td>
                </tr>
            @endforeach
		</tbody>	
	</table>
</div>
    <!-- modal -->
    @include('brand.addbrandmodal')
    @include('brand.editbrandmodal')
    @include('brand.delbrandmodal')
@stop

@section('js')
<script src="{{ url('js/myjs.js') }}"></script>
<script src="{{ url('js/brand.js') }}"></script>

@stop