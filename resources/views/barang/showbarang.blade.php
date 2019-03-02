@extends('adminlte::page')

@section('title', 'GalleriePOS')

@section('content_header')
    <h1>Master Barang</h1>
@stop

@section('content')

    <div style="margin-bottom:10px;">
        @permission('create_barang')
        <a href="" class="btn btn-success" data-toggle="modal" data-target="#addbarangmodal">
            <i class="fa fa-btn fa-plus"></i>
            Tambah Data Barang
        </a>
        @endpermission
    </div>


    <!-- alert -->
    @if(Session::has('message'))
         <div class="alert {{ Session::get('alert-class', 'alert-info') }}">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <strong>{{ Session::get('message') }}</strong>
        </div>
    @endif
    <!-- end alert -->
    <div class="table-responsive">
    	<table class="table table-bordered table-hover" id="tbbarang">
    		<thead>
    			<th>No.</th>
    			<th>Kode Barang</th>
    			<th>Kategori</th>
    			<th>Nama Barang</th>
          <th>Brand</th>
    			<th id="hrg_beli">Harga Beli</th>
    			<th id="hrg_jual">Harga Jual</th>
    			<th>Stok</th>
    			<th>Satuan</th>
    			<th>Stok Minimal</th>
    			<th>Discount</th>
          <th>Action</th>
    		</thead>
    		<tbody>
          
    		</tbody>
    	</table>
    </div>
@stop
@include('barang.addbarangmodal')
@include('barang.editbarangmodal')
@include('barang.delbarangmodal')
@section('js')

<script src="{{ url('js/myjs.js') }}"></script>
<script src="{{ url('js/barang.js') }}"></script>
@stop
