@extends('adminlte::page')

@section('title', 'GalleriePOS')

@section('content_header')
    <center><h1>Penjualan Via Leasing</h1></center>
@stop

@section('content')
    @permission('showkredit')
    <center>
    <div style="margin-bottom:10px;">
        <a href="{{url('pdf/kredit')}}" class="btn btn-success">
            <i class="fa fa-btn fa-print"></i> 
            Print
        </a>
    </div>
    </center>
    @endpermission
    <!-- end alert -->
    <div class="table-responsive">
    	<table class="table table-bordered table-hover" id="tbstokall">
    		<thead>
    			<th>No.</th>
    			<th>No. Nota</th>
    			<th>No. Surat Jalan</th>
    			<th>Customer</th>
                <th>Telp</th>
    			<th>Leasing</th>
    			<th>Action</th>
    		</thead>
    		<tbody>
                @foreach($juals as $key=>$j)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$j->no_nota}}</td>
                        <td>{{$j->no_sjpenjualan}}</td>
                        <td>{{$j->customer->cust}}</td>
                        <td>{{$j->customer->telp}}</td>
                        <td>{{$j->transaksi}}</td>
                        <td>
                            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#detilpenjualankredit" data-id="{{$j->id}}"><i class="fa fa-btn fa-search"></i></a>
                            <a href="" class="btn btn-warning" data-toggle="modal" data-target="#updatekreditmodal" data-id="{{$j->id}}"><i class="fa fa-btn fa-pencil"></i></a>
                        </td>
                    </tr>
                @endforeach
    		</tbody>	
    	</table>
    </div>
@stop
@include('laporan.kredit.detilpenjualanmodal')
@include('laporan.kredit.updatekreditmodal')
@section('js')
<script src="{{ url('js/myjs.js') }}"></script>
<script src="{{ url('js/kredit.js') }}"></script>
<script src="{{ url('js/terbilang.js') }}"></script>
@stop