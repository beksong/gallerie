@extends('adminlte::page')

@section('title', 'GalleriePOS')

@section('content_header')
    <h1>History Pembelian/Nota Pembelian</h1>
@stop

@section('content')
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
    			<th class="col-sm-1">No.</th>
    			<th class="col-sm-1">Nomor Sales Order / Nota Pembelian</th>
                <th class="col-sm-1">No. Surat Jalan</th>
    			<th class="col-sm-1">Tgl Pengiriman</th>
                <th class="col-sm-1">Tgl. Diterima / Barang Masuk</th>
                <th class="col-sm-1">Tgl. Nota</th>
                <th class="col-sm-1">Tgl. Jatuh Tempo</th>
    			<th class="col-sm-1">Suplier</th>
                <th class="col-sm-1">Action</th>
    		</thead>
    		<tbody>
                @foreach($pems as $key=>$p)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$p->no_faktur}}</td>
                        <td>{{$p->no_sjpembelian}}</td>
                        <td>{{$p->tgl_pengiriman}}</td>
                        <td>{{$p->tgl_terima}}</td>
                        <td>{{$p->tgl_faktur}}</td>
                        <td>{{$p->jth_tempo}}</td>
                        <td>{{$p->suplier->nama}}</td>
                        <td>
                            @permission('show_detilpembeliansj')
                            <a href="" class="btn btn-primary" data-target="#detilpembelianmodal" data-toggle="modal" data-pid="{{$p->id}}" data-no_faktur="{{$p->no_faktur}}" data-no_sjpembelian="{{$p->no_sjpembelian}}" data-tgl_pengiriman="{{$p->tgl_pengiriman}}" data-tgl_terima="{{$p->tgl_terima}}" data-tgl_faktur="{{$p->tgl_faktur}}" data-jth_tempo="{{$p->jth_tempo}}" data-suplier="{{$p->suplier->nama}}" data-jenis="{{$p->jenis}}"><i class="fa fa-btn fa-search"></i></a>
                            @endpermission
                            @permission('show_updatepembeliansjform')
                            <a href="{{url('pembelian/editsj/'.$p->id)}}" class="btn btn-warning"><i class="fa fa-btn fa-pencil"></i></a>
                            @endpermission
                            <!-- <a href="" class="btn btn-danger" data-target="#hapuspembelianmodal" data-toggle="modal" data-pembelian_id="{{$p->id}}" data-no_faktur="{{$p->no_faktur}}" data-tgl_faktur="{{$p->tgl_faktur}}" data-suplier="{{$p->suplier->nama}}" data-jth_tempo="{{$p->jth_tempo}}"><i class="fa fa-btn fa-trash"></i></a> -->
                        </td>
                    </tr>
                @endforeach
    		</tbody>	
    	</table>
    </div>
@stop
@include('pembelian.detilpembelianmodal')
@section('js')

<script src="{{ url('js/myjs.js') }}"></script>
<script src="{{ url('js/gudangdel.js') }}"></script>
@stop