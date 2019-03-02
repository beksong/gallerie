@extends('adminlte::page')

@section('title', 'GalleriePOS')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('css/jquery-ui.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap-datetimepicker.min.css') }}">
    <style>
        .ui-autocomplete-loading {
            background: white url("../css/images/ui-anim_basic_16x16.gif") right center no-repeat;
        }
        .ui-autocomplete {
               max-height: 100px;
            overflow-y: auto;
            /* prevent horizontal scrollbar */
            overflow-x: hidden;
        }
    </style>
@stop

@section('content_header')
    <h1>Penjualan | Kasir : <strong>{{\Auth::User()->name}}</strong></h1>
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
    <div style="margin-bottom:30px"></div>
    <form class="form-horizontal" enctype="multipart/form-data" role="form" id="frmaddpenjualan" action="{{url('kasir/createnota')}}" method="post">
        {!! csrf_field() !!}

        <div class="form-group">
            <label for="tgl_jual" class="col-sm-2 control-label">Tanggal Penjualan</label>
            <div class="col-sm-4">
                <div class="input-group date">
                    <input class="form-control" type="text" id="tgl_jual" name="tgl_jual" value="{{\Carbon::now()->format('Y-m-d')}}" required readonly/>
                    <div class="input-group-addon">
                        <span class="fa fa-calendar"></span>
                    </div>
                </div>
            </div>
            @if ($errors->has('tgl_jual'))
                <span class="help-block">
                    <strong>{{ $errors->first('tgl_jual') }}</strong>
                </span>
            @endif
        </div>

        <input type="hidden" class="form-control" id="cust_id" name="cust_id">
        
        <div class="form-group">
            <label for="cust" class="col-sm-2 control-label">Nama Customer</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="cust" name="cust" placeholder="Nama Pembeli/Customer" required>
            </div>
        </div>

        <div class="form-group">
            <label for="cust" class="col-sm-2 control-label">Jenis Transaksi</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="transaksi" name="transaksi" placeholder="Cash / KreditPlus / FIF Spektra / Adira" required>
            </div>
        </div>


        <div class="form-group">
            <label for="kd_barang" class="col-sm-2 control-label">Nama Barang</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="kd_barangc" name="kd_barangc" placeholder="Nama Barang">
            </div>
            
        </div>

        <div class="form-group">
            <div class="table-responsive">
                <table class="table table-bordered" id="tbkasir">
                    <thead>
                        <tr>
                            <th class="col-xs-1">No</th>
                            <th class="col-xs-1">Kode Barang</th>
                            <th class="col-xs-2">Nama Barang</th>
                            <th class="col-xs-1">Qty | Satuan</th>
                            <th class="col-xs-1">Harga</th>
                            <th class="col-xs-1">Disc</th>
                            <th class="col-xs-1">Pot/Qty</th>
                            <th class="col-xs-1">Subtotal</th>
                            <th class="col-xs-1">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7"><h4 class="col-sm-offset-8"><strong>Total</strong></h4></td>
                            <td><input type="text" id="total" name="total" min="0" value="0" class="form-control" readonly></td>
                            <td>
                                @permission('create_kasir')
                                <button type="submit" class="btn btn-success"><i class="fa fa-btn fa-save"></i></button>
                                @endpermission
                            </td>
                        </tr>
                        <tr>
                            <td colspan="8"><strong><h3 id="terbilang" class="col-sm-offset-3">Terbilang : </h3></strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </form>
@stop

@section('js')
<script src="{{ url('js/jquery-ui.min.js')}}"></script>
<!-- <script src="{{ url('js/autoNumeric/AutoNumeric.js') }}"></script> -->
<script src="{{ url('js/bootstrap-datetimepicker.js') }}"></script>
<script src="{{ url('js/digitRupiah.js') }}"></script>
<script type="text/javascript" src="{{ url('js/kasir.js') }}"></script>
<script type="text/javascript" src="{{ url('js/terbilang.js') }}"></script>
@stop