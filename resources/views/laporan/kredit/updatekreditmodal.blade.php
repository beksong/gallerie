<div class="modal fade" id="updatekreditmodal" tabindex="-1" role="dialog" aria-labelledby="mymodallabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-tittle"> Ubah Status Penjualan</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" enctype="multipart/form-data" role="form" id="frmupdatekreditmodal" action="{{url('penjualan/kredit')}}" method="POST">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <div class="col-sm-8">
                            <label class="control-label">Yakin akan mengubah status penjualan?</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-1">
                            <button type="submit" class="btn btn-success"><i class="fa fa-btn fa-save"></i> Ya</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                Ubah status / setelah pembayaran atas penjualan dilakukan oleh leasing
            </div>
        </div>
    </div>
</div>