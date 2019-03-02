<div class="modal fade" id="formrolemodal" tabindex="-1" role="dialog" aria-labelledby="mymodallabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-tittle"> Create New Role</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" enctype="multipart/form-data" role="form" id="frmaddrole" action="{{url('/createrole')}}" method="POST">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label for="user_name" class="col-sm-2 control-label">Role</label>
                        <div class="col-sm-8">
                            <input type="text" id="role_name" name="role_name" class="form-control">
                        </div>
                        
                        @if ($errors->has('role_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('role_name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="user_name" class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-8">
                            <textarea id="description" name="description" class="form-control"></textarea>
                        </div>
                        @if ($errors->has('description'))
                            <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-1 col-sm-offset-2"><button type="submit" class="btn btn-success"><i class="fa fa-btn fa-save"></i> Simpan</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>