<div class="modal fade" id="editsupliermodal" tabindex="-1" role="dialog" aria-labelledby="mymodallabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-tittle"> Ubah Data Suplier</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" enctype="multipart/form-data" role="form" id="frmeditsup" action="{{url('/updatesuplier')}}" method="POST">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label for="nama" class="col-sm-3 control-label">Nama Suplier</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                <input class="form-control required" type="text" id="nama" name="nama" placeholder="Nama/Perusahaan Penyuplai Barang" oninvalid="this.setCustomValidity('Nama Suplier Tidak Boleh Kosong')" required/>
                            </div>                            
                        </div>
                        @if ($errors->has('nama'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="alamat" class="col-sm-3 control-label">Alamat Suplier</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" type="text" id="alamat" name="alamat" placeholder="Alamat Suplier">
                            </textarea>
                        </div>
                        @if ($errors->has('alamat'))
                            <span class="help-block">
                                <strong>{{ $errors->first('alamat') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="telp" class="col-sm-3 control-label">Telp Suplier</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                </span>
                                <input class="form-control" type="text" id="telp" name="telp" placeholder="Telp Suplier Barang"/>
                            </div>
                        </div>
                        @if ($errors->has('telp'))
                            <span class="help-block">
                                <strong>{{ $errors->first('telp') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-sm-3 control-label">Email Suplier</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                <input class="form-control" type="email" id="email" name="email" placeholder="Email Suplier Barang"/>
                            </div>
                        </div>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-8">
                            <button type="submit" class="btn btn-success"><i class="fa fa-btn fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>