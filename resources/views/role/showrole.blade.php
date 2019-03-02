@extends('adminlte::page')

@section('title', 'GalleriePOS')

@section('content_header')
    <h1>Tipe Hak Akses</h1>
@stop

@section('content')
    <div class="row" style="margin-bottom:15px">
        <div class="col-sm-offset-5">
            <h3>Role/Hak Akses</h3>
        </div>
    </div>
    <!-- create role button -->
    <div style="margin-bottom:10px;">
        <a href="#formrolemodal" data-toggle="modal" data-target="#formrolemodal" class="btn btn-success">
            <i class="fa fa-btn fa-plus"></i> 
            Create New Role
        </a>
    </div>
    <!-- end alert -->
    @if(Session::has('message'))
         <div class="alert {{ Session::get('alert-class', 'alert-info') }}">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <strong>{{ Session::get('message') }}</strong>
        </div>
    @endif
    <!-- table -->
    <div class="table-responsive">
    	<table class="table table-bordered table-hover" id="tbpermissionuser">
    		<thead>
    			<tr>
                    <th>No.</th>
                    <th>Nama Hak Akses</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
    		</thead>
    		<tbody>
                @foreach($roles as $key=>$role)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$role->name}}</td>
                        <td>{{$role->description}}</td>
                        <td>
                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#updaterolemodal" data-role_id="{{$role->id}}" data-role_name="{{$role->name}}" data-description="{{$role->description}}"><i class="fa fa-btn fa-pencil"></i></a>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleterolemodal" data-role_id="{{$role->id}}" data-role_name="{{$role->name}}" data-description="{{$role->description}}"><i class="fa fa-btn fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
    		</tbody>	
    	</table>
    </div>
@stop
@include('role.formrolemodal')
@include('role.updaterolemodal')
@include('role.deleterolemodal')
@section('js')
<script src="{{ url('js/myjs.js') }}"></script>
<script src="{{ url('js/permissionmodal.js') }}"></script>
@stop