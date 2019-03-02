@extends('adminlte::page')

@section('title', 'GalleriePOS')

@section('content_header')
    <h1>History Surat Jalan/DO Pembelian</h1>
@stop

@section('content')
    @permission('create_sjpembelian')
    <div style="margin-bottom:10px;">
        <a href="{{url('sjpembelian/frm')}}" class="btn btn-success">
            <i class="fa fa-btn fa-plus"></i> 
            Input Surat Jalan/DO Pembelian
        </a>
    </div>
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
    	<table class="table table-bordered table-hover" id="tbsjpembelian">
    		<thead>
    			<th>No.</th>
    			<th>Nomor Surat Jalan</th>
    			<th>Tgl Pengiriman</th>
                <th>Tgl Terima/Gudang In</th>
                <th>Suplier</th>
    			<th>No. Sales Order/Nota Pembelian</th>
                <th>Action</th>
    		</thead>
    		<tbody>
                @foreach($pembs as $key=>$pemb)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$pemb->no_sjpembelian}}</td>
                        <td>{{$pemb->tgl_pengiriman}}</td>
                        <td>{{$pemb->tgl_terima}}</td>
                        <td>{{$pemb->suplier->nama}}</td>
                        <td>{{$pemb->no_faktur}}</td>
                        <td>
                            @permission('show_detilsjpembelian')
                            <a href="" data-target="#detilsjpembelianmodal" data-toggle="modal" data-pembelian_id="{{$pemb->id}}" data-no_sjpembelian="{{$pemb->no_sjpembelian}}" data-tgl_pengiriman="{{$pemb->tgl_pengiriman}}" data-tgl_terima="{{$pemb->tgl_terima}}" data-suplier="{{$pemb->suplier->nama}}" data-no_salesorder="{{$pemb->no_faktur}}" class="btn btn-primary"><i class="fa fa-btn fa-search"></i></a>
                            @endpermission
                        </td>
                    </tr>
                @endforeach
    		</tbody>	
    	</table>
    </div>
@stop

@section('js')
@include('gudang.detilsjpembelianmodal')
<script src="{{ url('js/myjs.js') }}"></script>
<script src="{{ url('js/showsjpembelian.js') }}"></script>
@stop