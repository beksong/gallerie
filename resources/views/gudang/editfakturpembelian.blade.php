@extends('adminlte::page')

@section('title', 'GalleriePOS')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('css/jquery-ui.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap-datetimepicker.min.css') }}">
    <style>
        .ui-autocomplete-loading {
            background: white url("../../css/images/ui-anim_basic_16x16.gif") right center no-repeat;
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
    <h1>Update Data Pembelian/Update Faktur Pembelian</h1>
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
    <form class="form-horizontal" enctype="multipart/form-data" role="form" id="frmeditpembelian" action="{{url('gudang/updatefaktur/'.$pemb->id)}}" method="post">
        {!! csrf_field() !!}
        <input type="hidden" id="subs" name="subs" value="{{$total}}">
        <div class="form-group">
            <label for="suplier_id" class="col-sm-2 control-label">Suplier</label>
            <div class="col-sm-4">
                <select class="form-control required" id="suplier_id" name="suplier_id" oninvalid="this.setCustomValidity('Suplier Belum Dipilih')" required autocomplete="off">
                    <option value="">--Pilih Suplier--</option>
                    @foreach($sups as $key=>$sup)
                        @if($sup->id==$pemb->suplier->id)
                            <option value="{{$sup->id}}" selected>{{$sup->nama}}</option>
                        @endif
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
            <label for="no_fak" class="col-sm-2 control-label">Nomor Faktur</label>
            <div class="col-sm-4">
                <input class="form-control" type="text" id="no_faktur" name="no_faktur" value="{{$pemb->no_faktur}}" oninvalid="this.setCustomValidity('Kode Barang Tidak Boleh Kosong')" required/>                          
            </div>
            @if ($errors->has('no_fak'))
                <span class="help-block">
                    <strong>{{ $errors->first('no_fak') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="tgl_faktur" class="col-sm-2 control-label">Tanggal Faktur</label>
            <div class="col-sm-4">
                <div class="input-group date">
                    <input class="form-control" type="date" id="tgl_faktur" name="tgl_faktur" value="{{$pemb->tgl_faktur}}" placeholder="Tanggal Faktur Pembelian Barang" oninvalid="this.setCustomValidity('Tanggal Faktur Pembelian Barang Tidak Boleh Kosong')" required readonly="true"/>
                    <div class="input-group-addon">
                        <span class="fa fa-calendar"></span>
                    </div>
                </div>
            </div>
            @if ($errors->has('tgl_faktur'))
                <span class="help-block">
                    <strong>{{ $errors->first('tgl_faktur') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="jth_tempo" class="col-sm-2 control-label">Jatuh Tempo</label>
            <div class="col-sm-4">
                <input class="form-control" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');" type="number" id="jth_tempo" name="jth_tempo" value="{{Carbon::parse($pemb->jth_tempo)->diffInDays(Carbon::parse($pemb->tgl_faktur))}}" placeholder="Lamanya Pembayaran Kredit" oninvalid="this.setCustomValidity('Tanggal Jatuh Tempo Tidak Boleh Kosong')"/>
            </div>
            @if ($errors->has('tgl_faktur'))
                <span class="help-block">
                    <strong>{{ $errors->first('jth_tempo') }}</strong>
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
                <table class="table table-bordered" id="tbpembelian">
                    <thead>
                        <tr>
                            <th class="col-sm-1 col-xs-1">No</th>
                            <th class="col-sm-1 col-xs-1">Kode Barang</th>
                            <th class="col-sm-3 col-xs-3">Nama Barang</th>
                            <th class="col-sm-1 col-xs-1">Quantity</th>
                            <th class="col-sm-2 col-xs-1">Harga Satuan</th>
                            <th class="col-sm-2 col-xs-1">Subtotal</th>
                            <th class="col-sm-2 col-xs-1">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pemb->detilpembelians as $key=>$detil)
                            <tr>
                                <td>
                                    {{$key+1}}
                                </td>
                                <td>
                                    <input type="hidden" id="barang_id" name="barang_id[]" value="{{$detil->barang->id}}">
                                    <input type="text" id="kd_barang" name="kd_barang[]" value="{{$detil->barang->kd_barang}}" class="form-control col-sm-2" readonly>
                                </td>
                                <td>
                                    <input type="text" id="barang" name="barang[]" value="{{$detil->barang->barang}}" class="form-control col-sm-2" readonly>
                                </td>
                                <td>
                                    <input type="text" id="qty" name="qty[]" onchange="hitungsubtotal()" data-field="qty" value="{{$detil->qty}}" class="form-control col-sm-2">
                                </td>
                                <td>
                                    <input type="text" id="hrg_satuan" name="hrg_satuan[]" onchange="hitungsubtotal()" data-field="hrg_satuan" value="{{$detil->hrgsatuan}}" class="form-control col-sm-2">
                                </td>
                                <td>
                                    <input type="text" id="subtotal" name="subtotal[]" value="{{$detil->subtotal}}" data-field="subtotal" class="form-control col-sm-2" readonly>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger"><i class="fa fa-btn fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5"><center><h4><strong>Total</strong></h4></center></td>
                            <td><center><h4><strong><input type="text" id="total" name="total" min="0" value="{{$total}}" class="form-control" readonly></strong></h4></center></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8">
                <button type="submit" class="btn btn-success"><i class="fa fa-btn fa-save"></i> Simpan</button>
            </div>
        </div>
    </form>
@stop

@section('js')
<script src="{{ url('js/jquery-ui.min.js')}}"></script>
<script src="{{ url('js/autoNumeric.js') }}"></script>
<script src="{{ url('js/bootstrap-datetimepicker.js') }}"></script>
<script type="text/javascript" src="{{ url('js/gudang.js') }}"></script>
@stop