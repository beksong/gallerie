@extends('adminlte::page')

@section('title', 'GalleriePOS')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('css/jquery-ui.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('css/mycss.css')}}">
@stop
@section('content_header')
    <h1>Surat Jalan Penjualan</h1>
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
    			<th>No.</th>
    			<th>No. Nota</th>
    			<th>Tgl Jual</th>
                <th>No. SJ Penjualan</th>
                <th>Sopir</th>
                <th>Status</th>
                <th>Action</th>
    		</thead>
    		<tbody>
                @foreach($juals as $key=>$jual)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$jual->no_nota}}</td>
                        <td>{{$jual->tgl_jual}}</td>
                        <td>{{$jual->no_sjpenjualan}}</td>
                        <td>{{$jual->sopir}}</td>
                        <td>
                            @if($jual->status=='sj')
                                Surat Jalan
                            @else
                                {{$jual->status}}
                            @endif
                        </td>
                        <td>
                            @permission('update_sjpenjualan')
                            <a href="" data-target="#detilsjpenjualan" data-toggle="modal" data-penjualan_id="{{$jual->id}}" data-no_sjpenjualan="{{$jual->no_sjpenjualan}}"  data-no_nota="{{$jual->no_nota}}" data-tgl_jual="{{$jual->tgl_jual}}" data-tgl_kirim="{{$jual->tgl_kirim}}" data-sopir="{{$jual->sopir}}" class="btn btn-warning"><i class="fa fa-btn fa-pencil"></i></a>
                            @endpermission
                            @permission('print_sjpenjualan')
                            <a href="{{url('print/sjpenjualan/'.$jual->id)}}" class="btn btn-primary"><i class="fa fa-btn fa-print"></i></a>
                            @endpermission
                        </td>
                    </tr>
                @endforeach
    		</tbody>	
    	</table>
    </div>
@stop

@include('gudang.detilsjpenjualanmodal')

@section('js')
<script src="{{ url('js/jquery-ui.min.js')}}"></script>
<script src="{{ url('js/bootstrap-datetimepicker.js') }}"></script>
<script src="{{ url('js/myjs.js') }}"></script>
<script src="{{ url('js/showsjpembelian.js') }}"></script>
@stop