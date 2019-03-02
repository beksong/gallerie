@extends('adminlte::page')

@section('title', 'GalleriePOS')

@section('content_header')
    <h1>History Pembelian/Nota Pembelian</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-sm-2">
            <a href="{{ url('gudang/showupdatefaktur/'.$pembelian->id) }}" class="btn btn-warning"><i class="fa fa-btn fa-pencil"></i> Edit Nota Pembelian</a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2"><strong>Nomor Nota Pembelian</strong></div>
        <div class="col-sm-2"><strong>: {{$pembelian->no_faktur}}</strong></div>
        <div class="col-sm-3"><strong>Tanggal Nota Pembelian</strong></div>
        <div class="col-sm-2"><strong>: {{$pembelian->tgl_faktur}}</strong></div>
         <div class="col-sm-2"><strong>Jenis Transaksi</strong></div>
        <div class="col-sm-1"><strong>: {{$pembelian->jenis}}</strong></div>
    </div>
    <div class="row">
        <div class="col-sm-2"><strong>Suplier</strong></div>
        <div class="col-sm-2"><strong>: {{$pembelian->suplier->nama}}</strong></div>
        <div class="col-sm-3"><strong>Jatuh Tempo Pembayaran</strong></div>
        <div class="col-sm-2"><strong>: {{$pembelian->jth_tempo}}</strong></div>
    </div>
    <div class="table-responsive">
    	<table class="table table-bordered table-hover" id="tbfakturid">
    		<thead>
    			<th>No.</th>
    			<th>Kode Barang</th>
    			<th>Nama Barang</th>
    			<th>Qty</th>
                <th>Harga Satuan</th>
                <th>Subtotal</th>
    		</thead>
    		<tbody>
                @foreach($pembelian->detilpembelians as $key=>$pemb)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$pemb->barang->kd_barang}}</td>
                        <td>{{$pemb->barang->barang}}</td>
                        <td>{{$pemb->qty}}</td>
                        <td>{{$pemb->hrgsatuan}}</td>
                        <td>{{$pemb->subtotal}}</td>
                    </tr>
                @endforeach
    		</tbody>	
    	</table>
    </div>
@stop

@section('js')

<script src="{{ url('js/myjs.js') }}"></script>
<!-- <script src="{{ url('js/barang.js') }}"></script> -->
@stop