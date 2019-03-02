<div class="modal fade" id="delcustomermodal" tabindex="-1" role="dialog" aria-labelledby="mymodallabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-tittle"> Ubah Data Customer</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form" id="frmdelcustomer" action="{{url('editcustomer')}}" method="post">
                    {!! csrf_field() !!}
                    <input type="hidden" type="text" id="cust_id" name="cust_id">
                    <div class="form-group">
                        <label for="cust" class="col-sm-3 control-label">Nama Customer</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="cust" name="cust" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="telp" class="col-sm-3 control-label">Telepon</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="telp" name="telp" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="alamat" class="col-sm-3 control-label">Alamat Customer</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" id="alamat" name="alamat" readonly></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-8">
                            <button type="submit" class="btn btn-danger"><i class="fa fa-btn fa-save"></i> Hapus</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>