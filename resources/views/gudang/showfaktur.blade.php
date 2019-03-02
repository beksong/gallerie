@extends('adminlte::page')

@section('title', 'GalleriePOS')

@section('content_header')
    <h1>History Pembelian/Nota Pembelian</h1>
@stop

@section('content')
    <div style="margin-bottom:10px;">
        <a href="{{url('/gudang/addpembelian')}}" class="btn btn-success">
            <i class="fa fa-btn fa-plus"></i> 
            Input Pembelian
        </a>
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
    	<table class="table table-bordered table-hover" id="tbfaktur">
    		<thead>
    			<th>No.</th>
    			<th>Nomor Nota</th>
    			<th>Tanggal Nota</th>
    			<th>Suplier</th>
                <th>Jatuh Tempo</th>
                <th>Jenis Transaksi</th>
                <th>Action</th>
    		</thead>
    		<tbody>
                @foreach($pembs as $key=>$pemb)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$pemb->no_faktur}}</td>
                        <td>{{$pemb->tgl_faktur}}</td>
                        <td>{{$pemb->suplier->nama}}</td>
                        <td>{{$pemb->jth_tempo}}</td>
                        <td>{{$pemb->jenis}}</td>
                        <td>
                            <a href="{{ url('gudang/showfaktur/'.$pemb->id) }}" class="btn btn-primary"><i class="fa fa-btn fa-search"></i></a>
                            <a href="" class="btn btn-danger" data-target="#hapuspembelianmodal" data-toggle="modal" data-pembelian_id="{{$pemb->id}}" data-no_faktur="{{$pemb->no_faktur}}" data-tgl_faktur="{{$pemb->tgl_faktur}}" data-suplier="{{$pemb->suplier->nama}}" data-jth_tempo="{{$pemb->jth_tempo}}"><i class="fa fa-btn fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
    		</tbody>	
    	</table>
    </div>
@stop
@include('gudang.hapuspembelianmodal')
@section('js')

<script src="{{ url('js/myjs.js') }}"></script>
<script src="{{ url('js/gudangdel.js') }}"></script>
@stop