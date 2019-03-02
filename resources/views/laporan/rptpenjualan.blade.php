@extends('adminlte::page')

@section('title', 'GalleriePOS')

@section('content_header')
    <h1>Laporan Penjualan</h1>
@stop

@section('content')
    <div class="row" style="margin-bottom:15px">
        <div class="col-sm-offset-5">
            <h3>History Penjualan | Semua Waktu</h3>
        </div>
        <div class="col-sm-offset-5 col-sm-2">
            @permission('printallpenjualan')
            <a href="{{ url('pdf/printall')}}" class="btn btn-primary"><i class="fa fa-btn fa-print"></i> Print</a>
            @endpermission
            @permission('previewallpenjualan')
            <a href="{{ url('pdf/previewall')}}" target="_blank" class="btn btn-warning"><i class="fa fa-btn fa-search"></i> Preview</a>
            @endpermission
        </div>
    </div>
    <!-- end alert -->
    <div class="table-responsive">
    	<table class="table table-bordered table-hover" id="tbrpthariini">
    		<thead>
    			<tr>
                    <th>No.</th>
                    <th>Nomor Nota</th>
                    <th>Tanggal Nota</th>
                    <th>Kasir</th>
                    <th>Detail</th>
                </tr>
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
@include('laporan.detilpenjualanmodal')
@stop

@section('js')
<script src="{{ url('js/myjs.js') }}"></script>
<script src="{{ url('js/laporan.js') }}"></script>
@stop