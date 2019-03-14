@extends('layouts.reportmasternota')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div>
                <table class="table table-bordered table-responsive" id="tbprintkredit">
                    <thead>
                        <tr>
                            <td>No.</td>
                            <td>No. Nota</td>
                            <td>Leasing</td>
                            <td>Tgl Penjualan</td>
                            <td>Nama Barang</td>
                            <td>Qty</td>
                            <td>Harga Jual</td>
                            <td>Disc</td>
                            <td>Nominal Disc.</td>
                            <td>Harga Jual Disc.</td>
                            <td>Harga Jual Net</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($juals as $key=>$jual)
                            @foreach($jual->detilpenjualans as $key=>$detil)
                            <tr>
                                <td><p>{{$key+1}}</p></td>
                                <td><p>{{$jual->no_nota}}</p></td>
                                <td><p>{{$jual->transaksi}}</p></td>
                                <td><p>{{$jual->tgl_jual}}</p></td>
                                <td><p>{{$detil->barang->barang}}</p></td>
                                <td><p>{{$detil->qty}}</p></td>
                                <td align="right"><p id="hrg_jual">{{$detil->hrg_jual}}</p></td>
                                <td align="right"><p>{{$detil->discount}} %</p></td>
                                <td align="right"><p id="nom_discount">{{$detil->nom_discount}}</p></td>
                                <td align="right"><p id="hrg_jual_discount">{{$detil->hrg_jual_discount}}</p></td>
                                <td align="right"><p id="hrg_jual_net">{{$detil->hrg_jual_net}}</p></td>
                            </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="10"><center><strong>Total :</strong></center></td>
                            <td align="right"><strong><p id="total"></p></strong></td>
                        </tr>
                        <tr>
                            <td colspan="11"><center><strong><p id="terbilang"></p></strong></center></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection