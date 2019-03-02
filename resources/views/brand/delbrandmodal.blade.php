<div class="modal fade" id="delbrandmodal" tabindex="-1" role="dialog" aria-labelledby="mymodallabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-tittle"> Hapus brand Barang</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" enctype="multipart/form-data" role="form" id="frmdelbrand" action="{{url('/delbrand')}}" method="POST">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label for="brand" class="col-sm-4 control-label">Nama brand</label>
                        <div class="col-sm-8">
                            <input class="form-control required" type="text" id="brand" name="brand" readonly/>
                        </div>
                        @if ($errors->has('brand'))
                            <span class="help-block">
                                <strong>{{ $errors->first('brand') }}</strong>
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
                <strong>Menghapus brand juga akan mengakibatkan data barang yang berkaitan dengan brand tersebut terhapus!!!</strong>
            </div>
        </div>
    </div>
</div>