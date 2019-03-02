<div class="modal fade" id="detilpenjualankasirtoday" tabindex="-1" role="dialog" aria-labelledby="mymodallabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-tittle"> Detail Penjualan</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-2">No. Nota </div><div class="col-sm-1">:</div><div class="col-sm-offset-3"> <p id="no_nota"></p></div>
                </div>
                <div class="row">
                    <div class="col-sm-2">Tanggal Nota </div><div class="col-sm-1">:</div><div class="col-sm-offset-3"> <p id="tgl_jual"></p></div>
                </div>
                <div class="row">
                    <div class="col-sm-2">Kasir </div><div class="col-sm-1">:</div><div class="col-sm-offset-3"> <p id="kasir"></p></div>
                </div>
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="tbpenjualankasirtoday">
                            <thead>
                                <tr>
                                    <th><center>No.</center></th>
                                    <th><center>Nama Barang</center></th>
                                    <th><center>Qty</center></th>
                                    <th><center>Harga Jual</center></th>
                                    <th><center>Discount</center></th>
                                    <th><center>Nom. Discount</center></th>
                                    <th><center>Hrg. Jual Discount</center></th>
                                    <th><center>Potongan</center></th>
                                    <th><center>Hrg Jual Netto</center></th>
                                </tr>
                                <tr>
                                    <th><center>1</center></th>
                                    <th><center>2</center></th>
                                    <th><center>3</center></th>
                                    <th><center>4</center></th>
                                    <th><center>5</center></th>
                                    <th><center>6</center></th>
                                    <th><center>7</center></th>
                                    <th><center>8</center></th>
                                    <th><center>9</center></th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7"><strong><center> Total Penjualan :</center></strong></td>
                                    <td colspan="2" align="right"><strong><p id="total"></p></strong></td>
                                </tr>
                                <tr>
                                    <td colspan="9">
                                        <strong><p id="terbilang">Terbilang :</p></strong>
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