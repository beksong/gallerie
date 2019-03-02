<div class="modal fade" id="hapuspembelianmodal" tabindex="-1" role="dialog" aria-labelledby="mymodallabel" aria-hidden="true">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-tittle"> Yakin Akan Menghapus Data Pembelian?</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" enctype="multipart/form-data" role="form" id="frmdelpembelian" action="{{url('gudang/delpembelian')}}" method="POST">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label for="no_faktur" class="col-sm-3 control-label">Nomor Faktur</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" id="no_faktur" name="no_faktur" readonly/>                          
                        </div>
                        @if ($errors->has('no_faktur'))
                            <span class="help-block">
                                <strong>{{ $errors->first('no_faktur') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="tgl_faktur" class="col-sm-3 control-label">Tanggal Faktur</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" id="tgl_faktur" name="tgl_faktur" readonly/>                          
                        </div>
                        @if ($errors->has('tgl_faktur'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tgl_faktur') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="suplier" class="col-sm-3 control-label">Suplier</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" id="suplier" name="suplier" readonly/>                          
                        </div>
                        @if ($errors->has('suplier'))
                            <span class="help-block">
                                <strong>{{ $errors->first('suplier') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="jth_tempo" class="col-sm-3 control-label">Jatuh Tempo</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" id="jth_tempo" name="jth_tempo" readonly/>                          
                        </div>
                        @if ($errors->has('jth_tempo'))
                            <span class="help-block">
                                <strong>{{ $errors->first('jth_tempo') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button class="btn btn-danger form-control" type="submit"><i class="fa fa-btn fa-trash"></i> Hapus</Button>                          
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>