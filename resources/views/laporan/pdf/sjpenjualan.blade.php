@extends('layouts.reportmaster')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <center><h4><u>Surat Jalan</u></h4></center>
        </div>
    </div>
    <div class="row">
            <div class="col-xs-3">No. Nota</div><div class="col-xs-offset-3"> <p id="no_nota">: {{$jual->no_nota}}</p></div>
            <div class="col-xs-3">No. Surat Jalan</div><div class="col-xs-offset-3"> <p id="no_sjpenjualan">: {{$jual->no_sjpenjualan}}</p></div>
            <div class="col-xs-3">Tgl Kirim</div><div class="col-xs-offset-3"> <p id="tgl_jual">: {{$jual->tgl_kirim}}</p></div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <p>
                Kepada Yth,<br>
                Bapak/Ibu {{$jual->customer->cust}}<br>
                {{$jual->customer->alamat}}<br>
                {{$jual->customer->telp}}<br>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <p>Bersama ini kami kirimkan sejumlah barang sebagai berikut :</p>
            <div class="table-responsive">
                <table class="table table-bordered" id="tbprintall">
                    <thead>
                        <tr>
                            <td>No.</td>
                            <td>Kode Barang</td>
                            <td>Nama Barang</td>
                            <td>Qty</td>
                            <td>Satuan</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jual->detilpenjualans as $key=>$d)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td><p>{{$d->barang->kd_barang}}</p></td>
                                <td><p>{{$d->barang->barang}}</p></td>
                                <td><p>{{$d->qty}}</p></td>
                                <td><p id="hrg_beli">{{$d->barang->satuan}}</p></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <p align="justify">Mohon untuk dilakukan pengecekan kembali sebelum petugas pengirim barang kami, meninggalkan tempat Bapak/Ibu {{$jual->customer->cust}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4">
            <center><p>Pengirim</p></center>
            <br>
            <br>
            <br>
            <br>
            <br>
            <center><p>( {{$jual->sopir}} )</p></center>
        </div>
        <div class="col-xs-4">
            <center><p>Gudang</p></center>
            <br>
            <br>
            <br>
            <br>
            <br>
            <center><p>( {{$jual->gudang}} )</p></center>
        </div>
        <div class="col-xs-4">
            <center><p>Customer</p></center>
            <br>
            <br>
            <br>
            <br>
            <br>
            <center><p>(............................)</p></center>
        </div>
    </div>
@endsection