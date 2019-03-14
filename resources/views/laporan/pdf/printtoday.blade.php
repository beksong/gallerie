@extends('layouts.reportmaster')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div>
                <table class="table table-responsive table-bordered" id="tbprintall">
                    <thead>
                        <tr>
                            <td>No.</td>
                            <td>No. Nota</td>
                            <td>Tgl Penjualan</td>
                            <td>Kasir</td>
                            <td>Kode Barang</td>
                            <td>Nama Barang</td>
                            <td>Qty</td>
                            <td>Harga Beli</td>
                            <td>Harga Jual</td>
                            <td>Disc</td>
                            <td>Nominal Disc.</td>
                            <td>Harga Jual Disc.</td>
                            <td>Potongan</td>
                            <td>Ongkir</td>
                            <td>Harga Jual Net</td>
                            <td>Laba</td>
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
                            <td><strong>14</strong></td>
                            <td><strong>15=9-(11+13)</strong></td>
                            <td><strong>16=15-((8*5)+14)</strong></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($juals as $key=>$jual)
                            @foreach($jual->detilpenjualans as $k=>$d)
                                <tr>
                                    <td><p>{{$no++}}</p></td>
                                    <td><p>{{$jual->no_nota}}</p></td>
                                    <td><p>{{$jual->tgl_jual}}</p></td>
                                    <td><p>{{$jual->user->name}}</p></td>
                                    <td><p>{{$d->barang->kd_barang}}</p></td>
                                    <td><p>{{$d->barang->barang}}</p></td>
                                    <td><p>{{$d->qty}}</p></td>
                                    <td><p id="hrg_beli">{{$d->hrg_beli}}</p></td>
                                    <td><p id="hrg_jual">{{$d->hrg_jual}}</p></td>
                                    <td><p>{{$d->discount}} %</p></td>
                                    <td><p id="nom_discount">{{$d->nom_discount}}</p></td>
                                    <td><p id="hrg_jual_discount">{{$d->hrg_jual_discount}}</p></td>
                                    <td><p id="potongan_item">{{$d->potongan_item}}</p></td>
                                    <td><p id="ongkir_pembelian">{{$d->ongkir_pembelian}}</p></td>
                                    <td><p id="hrg_jual_net">{{$d->hrg_jual_net}}</p></td>
                                    <td><p id="laba">{{$d->hrg_jual_net - (($d->hrg_beli*$d->qty)+$d->ongkir_pembelian)}}</p></td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="15"><center><strong>Total Laba : </strong></center></td>
                            <td><strong><p id="labatotal"></p></strong></td>
                        </tr>
                        <tr>
                            <td colspan="16"><strong><p id="terbilang"></p></strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection