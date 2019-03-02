<div class="modal fade" id="updateroleusermodal" tabindex="-1" role="dialog" aria-labelledby="mymodallabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-tittle"> Beri Hak Akses Ke User</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" enctype="multipart/form-data" role="form" id="frmupdateroleusermodal" action="{{url('/attachpermission')}}" method="POST">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label for="user_name" class="col-sm-2 control-label">Nama User</label>
                        <div class="col-sm-8">
                            <input type="text" id="username" name="username" class="form-control" readonly>
                        </div>
                        @if ($errors->has('user_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('user_name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="user_name" class="col-sm-2 control-label">Hak Akses User</label>
                        <div class="col-sm-8">
                           <select id="role_id" name="role_id" class="form-control">
                                <option value="">--Pilih Hak Akses--</option>
                                @foreach($roles as $key=>$r)
                                    <option value="{{$r->id}}">{{$r->display_name}}</option>
                                @endforeach
                           </select>
                        </div>
                        @if ($errors->has('role_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('role_name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                            <div class="col-sm-1"><button type="submit" class="btn btn-success"><i class="fa fa-btn fa-save"></i> Simpan</button></div>    
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>