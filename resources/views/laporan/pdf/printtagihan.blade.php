@extends('layouts.reportmaster')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div>
                <table class="table table-responsive table-bordered" id="tbprinttagihan">
                    <thead>
                        <tr>
                            <td>No.</td>
                            <td>No. Nota</td>
                            <td>Suplier</td>
                            <td>Tgl Nota</td>
                            <td>Jth. Tempo</td>
                            <td>Tgl Pengiriman</td>
                            <td>Tgl Terima</td>
                            <td>No. Sj Pembelian</td>
                            <td>Barang</td>
                            <td>Qty</td>
                            <td>Hrg Satuan</td>
                            <td>subtotal</td>
                            <td>Ongkir</td>
                        </tr>
                        <tr>
                            <td><strong>1</strong></td>
                            <td><strong>2</strong></td>
                            <td><strong>3</strong></td>
                            <td><strong>4</strong></td>
                            <td><strong>5</strong></td>
                            <td><strong>6</strong></td>
                            <td><strong>7</strong></td>
                            <td><strong>8</strong></td>
                            <td><strong>9</strong></td>
                            <td><strong>10</strong></td>
                            <td><strong>11</strong></td>
                            <td><strong>12</strong></td>
                            <td><strong>13</strong></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pembelian as $key=>$beli)
                            @foreach($beli->detilpembelians as $key=>$detil)
                            <tr>
                                <td><p>{{$key+1}}</p></td>
                                <td><p>{{$beli->no_faktur}}</p></td>
                                <td><p>{{$beli->suplier->nama}}</p></td>
                                <td><p>{{$beli->tgl_faktur}}</p></td>
                                <td><p>{{$beli->jth_tempo}}</p></td>
                                <td><p>{{$beli->tgl_pengiriman}}</p></td>
                                <td><p>{{$beli->tgl_terima}}</p></td>
                                <td><p>{{$beli->no_sjpembelian}}</p></td>
                                <td><p>{{$detil->barang->barang}}</p></td>
                                <td><p>{{$detil->qty}}</p></td>
                                <td><p id="hrgsatuan">{{$detil->hrgsatuan}}</p></td>
                                <td><p id="subtotal">{{$detil->subtotal}}</p></td>
                                <td><p id="ongkir">{{$detil->ongkir_pembelian}}</p></td>
                            </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="11"><center><strong>Total </strong></center></td>
                            <td><strong><p id="total"></p></strong></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="13"><strong><p id="terbilang"></p></strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection