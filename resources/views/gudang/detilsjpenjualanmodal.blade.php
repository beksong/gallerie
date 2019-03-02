<div class="modal fade" id="detilsjpenjualan" tabindex="-1" role="dialog" aria-labelledby="mymodallabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-tittle"> Update Surat Jalan Penjualan</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4">No. Nota Penjualan</div><div class="col-sm-1">:</div><div class="col-sm-offset-3"> <p id="no_nota"></p></div>
                </div>
                <div class="row">
                    <div class="col-sm-4">No. Surat Jalan</div><div class="col-sm-1">:</div><div class="col-sm-offset-3"> <p id="no_sjpenjualan"></p></div>
                </div>
                <div class="row">
                    <div class="col-sm-4">Tgl Jual</div><div class="col-sm-1">:</div><div class="col-sm-offset-3"> <p id="tgl_jual"></p></div>
                </div><!-- end description -->
                <br>
                <div class="row">
                    <form class="form-horizontal" enctype="multipart/form-data" role="form" id="frmeditsjpenjualan" action="{{url('gudang/sjpenjualan')}}" method="post">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label for="tgl_kirim" class="col-sm-2 control-label">Tanggal Pengiriman</label>
                            <div class="col-sm-4">
                                <div class="input-group date">
                                    <input class="form-control" type="text" id="tgl_kirim" name="tgl_kirim" placeholder="Tanggal Pengiriman" oninvalid="this.setCustomValidity('Tanggal Faktur Pembelian Barang Tidak Boleh Kosong')" required readonly="true"/>
                                    <div class="input-group-addon">
                                        <span class="fa fa-calendar"></span>
                                    </div>
                                </div>
                            </div>
                            @if ($errors->has('tgl_kirim'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tgl_kirim') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="sopir" class="col-sm-2 control-label">Sopir</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="sopir" name="sopir" placeholder="Nama Sopir" oninvalid="this.setCustomValidity('Nama Sopir Harus Diisi')" required>
                            </div>
                            @if ($errors->has('sopir'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('sopir') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-8">
                                <button type="submit" class="btn btn-success"><i class="fa fa-btn fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </form>

                </div><!-- end form update -->
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="tbsjpenjualanmodal">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Qty</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div><!-- end table -->
            </div>
        </div>
    </div>
</div>