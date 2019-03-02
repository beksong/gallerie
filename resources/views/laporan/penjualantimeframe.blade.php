@extends('adminlte::page')

@section('title', 'GalleriePOS')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('css/jquery-ui.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap-datetimepicker.min.css') }}">
@stop

@section('content_header')
    <h1>Print Penjualan Dengan Rentang Waktu</h1>
@stop

@section('content')
@if(Session::has('message'))
     <div class="alert {{ Session::get('alert-class', 'alert-info') }}">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <strong>{{ Session::get('message') }}</strong>
    </div>
@endif

    <form class="form-horizontal" enctype="multipart/form-data" role="form" id="frmpenjualantimeframe" action="{{url('pdf/timeframes')}}" method="post">
        {!! csrf_field() !!}

        <div class="form-group">
            <label for="tgl_awal" class="col-sm-2 control-label">Tanggal Penjualan dari</label>
            <div class="col-sm-4">
                <div class="input-group date">
                    <input class="form-control" type="text" id="tgl_awal" name="tgl_awal" placeholder="Tanggal Penjualan Dari" oninvalid="this.setCustomValidity('Tanggal Faktur Pembelian Barang Tidak Boleh Kosong')" required readonly="true"/>
                    <div class="input-group-addon">
                        <span class="fa fa-calendar"></span>
                    </div>
                </div>
            </div>
            @if ($errors->has('tgl_awal'))
                <span class="help-block">
                    <strong>{{ $errors->first('tgl_awal') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="tgl_akhir" class="col-sm-2 control-label">Sampai Dengan Tanggal</label>
            <div class="col-sm-4">
                <div class="input-group date">
                    <input class="form-control" type="text" id="tgl_akhir" name="tgl_akhir" placeholder="Sampai Dengan Penjualan Tanggal" oninvalid="this.setCustomValidity('Tanggal Faktur Pembelian Barang Tidak Boleh Kosong')" required readonly="true"/>
                    <div class="input-group-addon">
                        <span class="fa fa-calendar"></span>
                    </div>
                </div>
            </div>
            @if ($errors->has('tgl_akhir'))
                <span class="help-block">
                    <strong>{{ $errors->first('tgl_akhir') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <div class="col-sm-4 col-sm-offset-2">
                @permission('printpenjualantimeframes')
                <button type="submit" class="btn btn-success"><i class="fa fa-btn fa-print"></i> Cetak</button>
                @endpermission
            </div>
        </div>

    </form>
@stop
@section('js')
<script src="{{ url('js/jquery-ui.min.js')}}"></script>
<script src="{{ url('js/bootstrap-datetimepicker.js') }}"></script>
<script type="text/javascript" src="{{ url('js/penjualantimeframe.js') }}"></script>
@stop