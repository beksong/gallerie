@extends('layouts.reportmasternota')
@section('content')
    <div class="container">
        <div class="row">
            <!-- left side -->
            <div class="col-xs-6" style="padding-right:20px">
                <center><strong><p><u>Nota Penjualan</u></p></strong></center>
                <!-- invoice data -->
                <div class="col-xs-3">No. Nota Penjualan</div><div class="col-xs-offset-3">: {{$jual->no_nota}}</div>
                <div class="col-xs-3">No. Surat Jalan</div><div class="col-xs-offset-3">: {{$jual->no_sjpenjualan}}</div>
                <div class="col-xs-3">Tgl Jual</div><div class="col-xs-offset-3">: {{$jual->tgl_jual}}</div>
                <!-- customer data -->
                <div class="col-xs-3">Customer</div><div class="col-xs-offset-3">: {{$jual->customer->cust}}</div>
                <div class="col-xs-3">Telp</div><div class="col-xs-offset-3">: {{$jual->customer->telp}}</div>
                <div class="col-xs-3">Alamat</div><div class="col-xs-offset-3">: {{$jual->customer->alamat}}</div>
                <!-- left table -->
                <!-- perubahan -->
                <div class="table-responsive">
                  <table class="table table-bordered" id="tbprintnotapenjualan">
                      <thead>
                          <tr>
                              <td>No.</td>
                              <td>Nama Barang</td>
                              <td>Qty</td>
                              <td>Satuan</td>
                              <td>Harga Satuan</td>
                              <td>Discount</td>
                              <td>Potongan</td>
                              <td>Subtotal</td>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($jual->detilpenjualans as $key=>$d)
                              <tr>
                                  <td>{{$key+1}}</td>
                                  <td><p>{{$d->barang->barang}}</p></td>
                                  <td><p>{{$d->qty}}</p></td>
                                  <td><p>{{$d->barang->satuan}}</p></td>
                                  <td align="right"><p id="hrg_jual">{{$d->hrg_jual}}</p></td>
                                  <td align="right"><p id="nom_discount">{{$d->nom_discount}}</p></td>
                                  <td align="right"><p id="potongan_item">{{$d->potongan_item}}</p></td>
                                  <td align="right"><p id="hrg_jual_net">{{$d->hrg_jual_net}}</p></td>
                              </tr>
                          @endforeach
                      </tbody>
                      <tfoot>
                          <tr>
                              <td colspan="7"><strong><center><p>Grand Total</p></center></strong></td>
                              <td align="right"><p id="grandtotal"></p></td>
                          </tr>
                          <tr>
                              <td colspan="8"><center><strong><p id="terbilang"></p></strong></center></td>
                          </tr>
                      </tfoot>
                  </table>
                </div>
                <div class="col-xs-3">
                    <center><p>Customer</p></center>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <center><p>(............................)</p></center>
                </div>
                <div class="col-xs-offset-6">
                    <center><p>Hormat Kami</p></center>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <center><p>( {{\Auth::user()->name}} )</p></center>
                </div>
            </div>
            <!-- right side -->
            <div class="col-xs-6" style="padding-left:20px">
                <center><strong><p><u>Nota Penjualan</u></p></strong></center>
                <!-- invoice data -->
                <div class="col-xs-3">No. Nota Penjualan</div><div class="col-xs-offset-3">: {{$jual->no_nota}}</div>
                <div class="col-xs-3">No. Surat Jalan</div><div class="col-xs-offset-3">: {{$jual->no_sjpenjualan}}</div>
                <div class="col-xs-3">Tgl Jual</div><div class="col-xs-offset-3">: {{$jual->tgl_jual}}</div>
                <!-- customer data -->
                <div class="col-xs-3">Customer</div><div class="col-xs-offset-3">: {{$jual->customer->cust}}</div>
                <div class="col-xs-3">Telp</div><div class="col-xs-offset-3">: {{$jual->customer->telp}}</div>
                <div class="col-xs-3">Alamat</div><div class="col-xs-offset-3">: {{$jual->customer->alamat}}</div>
                <!-- right table -->
                <table class="table table-bordered table-responsive" id="tbprintnotapenjualan">
                    <thead>
                        <tr>
                            <td>No.</td>
                            <td>Nama Barang</td>
                            <td>Qty</td>
                            <td>Satuan</td>
                            <td>Harga Satuan</td>
                            <td>Discount</td>
                            <td>Pot/Qty</td>
                            <td>Subtotal</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jual->detilpenjualans as $key=>$d)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td><p>{{$d->barang->barang}}</p></td>
                                <td><p>{{$d->qty}}</p></td>
                                <td><p>{{$d->barang->satuan}}</p></td>
                                <td align="right"><p id="hrg_jual">{{$d->hrg_jual}}</p></td>
                                <td align="right"><p id="nom_discount">{{$d->nom_discount}}</p></td>
                                <td align="right"><p id="potongan_item">{{$d->potongan_item}}</p></td>
                                <td align="right"><p id="hrg_jual_net">{{$d->hrg_jual_net}}</p></td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7"><strong><center><p>Grand Total</p></center></strong></td>
                            <td align="right"><p id="grandtotal"></p></td>
                        </tr>
                        <tr>
                            <td colspan="8"><center><strong><p id="terbilang"></p></strong></center></td>
                        </tr>
                    </tfoot>
                </table>
                <div class="col-xs-3">
                    <center><p>Customer</p></center>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <center><p>(............................)</p></center>
                </div>
                <div class="col-xs-offset-6">
                    <center><p>Hormat Kami</p></center>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <center><p>( {{\Auth::user()->name}} )</p></center>
                </div>
            </div>
        </div>
    </div>
@endsection
