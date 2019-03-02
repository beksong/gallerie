@extends('adminlte::page')

@section('title', 'GalleriePOS')

@section('content_header')
    <h1>Stok Barang Minimal</h1>
@stop

@section('content')
    @permission('printstokmin')
    <div style="margin-bottom:10px;">
        <a href="{{url('pdf/printstokmin')}}" class="btn btn-success">
            <i class="fa fa-btn fa-print"></i> 
            Print
        </a>
    </div>
    @endpermission
    <!-- end alert -->
    <div class="table-responsive">
    	<table class="table table-bordered table-hover" id="tbstokall">
    		<thead>
    			<th>No.</th>
    			<th>Kode Barang</th>
    			<th>Kategori</th>
    			<th>Nama Barang</th>
                <th>Brand</th>
    			<th>Stok</th>
    			<th>Satuan</th>
    			<th>Stok Minimal</th>
    		</thead>
    		<tbody>
                @foreach($barangs as $key=>$barang)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$barang->kd_barang}}</td>
                        <td>{{$barang->category->kategori}}</td>
                        <td>{{$barang->barang}}</td>
                        <td>{{$barang->merk->brand}}</td>
                        <td>{{$barang->stok}}</td>
                        <td>{{$barang->satuan}}</td>
                        <td>{{$barang->stok_min}}</td>
                    </tr>
                @endforeach
    		</tbody>	
    	</table>
    </div>
@stop
@section('js')

<script src="{{ url('js/myjs.js') }}"></script>
@stop