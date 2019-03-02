<div class="modal fade" id="detilpenjualankredit" tabindex="-1" role="dialog" aria-labelledby="mymodallabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-tittle"> Detail Penjualan Kredit</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-3">No. Nota </div><div class="col-xs-offset-3" id="no_nota"></div>
                </div>
                <div class="row">
                    <div class="col-xs-3">Tanggal Nota </div><div class="col-xs-offset-3" id="tgl_jual"></div>
                </div>
                <div class="row">
                    <div class="col-xs-3">Kasir </div><div class="col-xs-offset-3" id="kasir"></div>
                </div>
                <div class="row">
                    <div class="col-xs-3">No. Surat Jalan</div><div class="col-xs-offset-3" id="no_sjpenjualan"></div>
                </div>
                <div class="row">
                    <div class="col-xs-3">Cust</div><div class="col-xs-offset-3" id="cust"></div>
                </div>
                <div class="row">
                    <div class="col-xs-3">Leasing</div><div class="col-xs-offset-3" id="transaksi"></div>
                </div>
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="tbdetilpenjualankredit">
                            <thead>
                                <tr>
                                <td>No.</td>
                                <td>Nama Barang</td>
                                <td>Qty</td>
                                <td>Satuan</td>
                                <td>Harga Jual</td>
                                <td>Discount</td>
                                <td>Potongan</td>
                                <td>Subtotal</td>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7"><strong><center> Total:</center></strong></td>
                                    <td align="right"><strong><p id="total"></p></strong></td>
                                </tr>
                                <tr>
                                    <td colspan="8">
                                        <strong><center><p id="terbilang">Terbilang :</p></center></strong>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>