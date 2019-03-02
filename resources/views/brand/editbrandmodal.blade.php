<div class="modal fade" id="editbrandmodal" tabindex="-1" role="dialog" aria-labelledby="mymodallabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-tittle"> Ubah Brand</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" enctype="multipart/form-data" role="form" id="frmeditbrand" action="" method="POST">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label for="brand" class="col-sm-4 control-label">Nama brand</label>
                        <div class="col-sm-8">
                            <input class="form-control required" type="text" id="brand" name="brand" placeholder="Brand/Merk Barang" oninvalid="this.setCustomValidity('Nama Brand Tidak Boleh Kosong')" required/>
                        </div>
                        @if ($errors->has('brand'))
                            <span class="help-block">
                                <strong>{{ $errors->first('brand') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                            <button type="submit" class="btn btn-success"><i class="fa fa-btn fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>