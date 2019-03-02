@extends('adminlte::page')

@section('title', 'GalleriePOS')

@section('content_header')
    <h1>History Pembelian/Nota Pembelian</h1>
@stop

@section('content')
    <div class="row">
        <h3 class="col-sm-offset-5">Rekap Penjualan Hari Ini</h3>
        <div class="col-sm-offset-5 col-sm-2">
            @permission('printtodaypenjualan')
            <a href="{{ url('pdf/printtoday')}}" class="btn btn-primary"><i class="fa fa-btn fa-print"></i> Print</a>
            @endpermission
            @permission('previewtodaypenjualan')
            <a href="{{ url('pdf/previewtoday')}}" target="_blank" class="btn btn-warning"><i class="fa fa-btn fa-search"></i> Preview</a>
            @endpermission
        </div>
    </div>
    
    <!-- end alert -->
    <div class="table-responsive">
    	<table class="table table-bordered table-hover" id="tbrpthariini">
    		<thead>
    			<th>No.</th>
    			<th>Nomor Nota</th>
    			<th>Tanggal Nota</th>
    			<th>Kasir</th>
                <th>Detail</th>
    		</thead>
    		<tbody>
                @foreach($juals as $key=>$jual)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$jual->no_nota}}</td>
                        <td>{{$jual->tgl_jual}}</td>
                        <td>{{$jual->user->name}}</td>
                        <td><a href="#" data-target="#detilpenjualanmodal" data-toggle="modal" data-penjualan_id="{{$jual->id}}" data-no_nota="{{$jual->no_nota}}" data-tgl_jual="{{$jual->tgl_jual}}" data-kasir="{{$jual->user->name}}" class="btn btn-primary"><i class="fa fa-btn fa-search"></i></a></td>
                    </tr>
                @endforeach
    		</tbody>	
    	</table>
    </div>
@stop
@include('laporan.detilpenjualanmodal')
@section('js')
<script src="{{ url('js/myjs.js') }}"></script>
<script src="{{ url('js/laporan.js') }}"></script>
@stop