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
        /*table
        {
            counter-reset: rowNumber;
        }

        table tr > td:first-child
        {
            counter-increment: rowNumber;
        }

        table tr td:first-child::before
        {
            content: counter(rowNumber);
            min-width: 1em;
            margin-right: 0.5em;
        }*/
    </style>
@stop

@section('content_header')
    <h1>Tambah Data Surat Jalan/DO Pembelian</h1>
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
    <form class="form-horizontal" enctype="multipart/form-data" role="form" id="frmaddsjpembelian" action="{{url('sjpembelian/createsjpembelian')}}" method="post">
        {!! csrf_field() !!}

        <div class="form-group">
            <label for="suplier_id" class="col-sm-2 control-label">Suplier</label>
            <div class="col-sm-3">
                <select class="form-control required" id="suplier_id" name="suplier_id" oninvalid="this.setCustomValidity('Suplier Belum Dipilih')" required autocomplete="off">
                    <option value="">--Pilih Suplier--</option>
                    @foreach($sups as $key=>$sup)
                        <option value="{{$sup->id}}">{{$sup->nama}}</option>
                    @endforeach
                </select>
            </div>
            @if ($errors->has('suplier_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('suplier_id') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="no_faktur" class="col-sm-2 control-label">Nomor Sales Order/Nota Pembelian</label>
            <div class="col-sm-3">
                <input class="form-control required" type="text" id="no_faktur" name="no_faktur" placeholder="Nomor Faktur/Nota Pembelian Barang dari Suplier/Nomor Sales Order" oninvalid="this.setCustomValidity('Nomor Sales Order / No. Nota Pembelian Tidak Boleh Kosong')" required/>                          
            </div>
            @if ($errors->has('no_faktur'))
                <span class="help-block">
                    <strong>{{ $errors->first('no_faktur') }}</strong>
                </span>
            @endif
            <!-- nomor surat jalan -->
            <label for="no_sjpembelian" class="col-sm-2 control-label">Nomor Surat Jalan</label>
            <div class="col-sm-3">
                <input class="form-control required" type="text" id="no_sjpembelian" name="no_sjpembelian" placeholder="Nomor Surat Jalan Pengiriman Barang" oninvalid="this.setCustomValidity('No. Sj. Pembelian / DO. Pembelian Tidak Boleh Kosong')" required/>                          
            </div>
            @if ($errors->has('no_sjpembelian'))
                <span class="help-block">
                    <strong>{{ $errors->first('no_sjpembelian') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="tgl_pengiriman" class="col-sm-2 control-label">Tanggal Pengiriman</label>
            <div class="col-sm-3">
                <div class="input-group date">
                    <input class="form-control datepicker" type="date" id="tgl_pengiriman" name="tgl_pengiriman" placeholder="Tanggal Pengiriman Barang Oleh Suplier" oninvalid="this.setCustomValidity('Tanggal Faktur Pembelian Barang Tidak Boleh Kosong')" required readonly="true"/>
                    <div class="input-group-addon">
                        <span class="fa fa-calendar"></span>
                    </div>
                </div>
            </div>
            @if ($errors->has('tgl_pengiriman'))
                <span class="help-block">
                    <strong>{{ $errors->first('tgl_pengiriman') }}</strong>
                </span>
            @endif
            <!-- tgl barang diterima -->
            <label for="tgl_terima" class="col-sm-2 control-label">Tanggal Barang Diterima</label>
            <div class="col-sm-3">
                <div class="input-group date">
                    <input class="form-control" type="date" id="tgl_terima" name="tgl_terima" placeholder="Tanggal Barang Diterima" oninvalid="this.setCustomValidity('Tanggal Faktur Pembelian Barang Tidak Boleh Kosong')" required readonly="true"/>
                    <div class="input-group-addon">
                        <span class="fa fa-calendar"></span>
                    </div>
                </div>
            </div>
            @if ($errors->has('tgl_terima'))
                <span class="help-block">
                    <strong>{{ $errors->first('tgl_terima') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="kd_barang" class="col-sm-2 control-label">Kode Barang</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="kd_barangc" name="kd_barangc" placeholder="Kode Barang">
            </div>
        </div>

        <div class="form-group">
            <div class="table-responsive">
                <table class="table table-bordered" id="tbsjpembelian">
                    <thead>
                        <tr>
                            <th class="col-sm-1 col-xs-1">No</th>
                            <th class="col-sm-1 col-xs-1">Kode Barang</th>
                            <th class="col-sm-3 col-xs-3">Nama Barang</th>
                            <th class="col-sm-1 col-xs-1">Quantity</th>
                            <th class="col-sm-2 col-xs-1">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td>
                                @permission('save_sjpembelian')
                                <button type="submit" class="btn btn-success"><i class="fa fa-btn fa-save"></i> Simpan Surat Jalan</button>
                                @endpermission
                            </td>
                            <td colspan="2"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </form>
@stop

@section('js')
<script src="{{ url('js/jquery-ui.min.js')}}"></script>
<script src="{{ url('js/autoNumeric.js') }}"></script>
<script src="{{ url('js/bootstrap-datetimepicker.js') }}"></script>
<script type="text/javascript" src="{{ url('js/gudangadd.js') }}"></script>
@stop