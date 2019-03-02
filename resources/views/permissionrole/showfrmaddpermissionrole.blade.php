@extends('adminlte::page')

@section('title', 'GalleriePOS')

@section('content_header')
    <h1>Pengaturan Hak Akses User</h1>
@stop

@section('content')
    <div class="row" style="margin-bottom:15px">
        <div class="col-sm-offset-5">
            <h3>Permission Role</h3>
        </div>
    </div>
    <!-- end alert -->
    @if(Session::has('message'))
         <div class="alert {{ Session::get('alert-class', 'alert-info') }}">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <strong>{{ Session::get('message') }}</strong>
        </div>
    @endif
    <div class="row">
        <div class="col-sm-12">
            <form id="permissionrole" class="form-horizontal" role="form" method="POST" action="{{ url('permissionrole/addperms/'.$role->id) }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-sm-2 control-label">Role</label>

                    <div class="col-sm-6">
                        <input id="nama" type="text" class="form-control" name="nama" value="{{ $role->display_name }}" readonly>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-sm-2 control-label">Hak Akses Dalam Aplikasi:</label>
                    <div class="col-sm-3">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="all" id="all" value="1"> Pilih Semua
                                </label>
                            </div>
                        </div>
                </div>

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    @foreach($permissions as $key=>$p)
                        <div class="col-sm-3">
                            <div class="checkbox">
                                <label>
                                    @if(in_array($p->id,$pid))
                                        <input type="checkbox" name="permission_id[]" id="permission_id" value="{{$p->id}}" class="permission_id" checked>{{$p->display_name}} - {{$p->description}}
                                    @else
                                        <input type="checkbox" name="permission_id[]" id="permission_id" value="{{$p->id}}" class="permission_id">{{$p->display_name}} - {{$p->description}}
                                    @endif
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="form-group">
                    <div class="col-sm-1 col-sm-offset-2">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-btn fa-save"></i> simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @include('permission.addpermissionmodal')
    @include('permission.updatepermissionmodal')
@stop

@section('js')
<script src="{{ url('js/myjs.js') }}"></script>
<script src="{{ url('js/permissionmodal.js') }}"></script>
@stop