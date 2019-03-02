<div class="modal fade" id="delkategorimodal" tabindex="-1" role="dialog" aria-labelledby="mymodallabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-tittle"> Hapus Kategori Barang</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" enctype="multipart/form-data" role="form" id="frmdelcat" action="{{url('/delcategory')}}" method="POST">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label for="kategori" class="col-sm-4 control-label">Nama Kategori</label>
                        <div class="col-sm-8">
                            <input class="form-control required" type="text" id="kategori" name="kategori" placeholder="Kategori Barang" readonly/>
                        </div>
                        @if ($errors->has('kategori'))
                            <span class="help-block">
                                <strong>{{ $errors->first('kategori') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                            <button type="submit" class="btn btn-danger"><i class="fa fa-btn fa-trash"></i> Hapus</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <strong>Menghapus kategori juga akan mengakibatkan data barang terhapus!!!</strong>
            </div>
        </div>
    </div>
</div>