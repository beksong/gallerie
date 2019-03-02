@extends('adminlte::page')

@section('title', 'GalleriePOS')

@section('content_header')
    <h1>Pengaturan Hak Akses User</h1>
@stop

@section('content')
    <div class="row" style="margin-bottom:15px">
        <div class="col-sm-offset-5">
            <h3>Permission</h3>
        </div>
    </div>
    <!-- create permission button button -->
    <div style="margin-bottom:10px;">
        <a href="" data-toggle="modal" data-target="#addpermissionmodal" class="btn btn-success">
            <i class="fa fa-btn fa-plus"></i> 
            Create New Permission
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
                    <th>Name</th>
                    <th>Display Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
    		</thead>
    		<tbody>
                @foreach($perms as $key=>$p)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$p->name}}</td>
                        <td>{{$p->display_name}}</td>
                        <td>{{$p->description}}</td>
                        <td>
                            <a href="" data-target="#updatepermissionmodal" data-toggle="modal" data-id="{{$p->id}}" data-name="{{$p->name}}" data-description="{{$p->description}}" class="btn btn-warning"><i class="fa fa-btn fa-pencil"></i></a>
                            <a href="{{url('/deletepermission/'.$p->id)}}" class="btn btn-danger"><i class="fa fa-btn fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
    		</tbody>	
    	</table>
    </div>
    @include('permission.addpermissionmodal')
    @include('permission.updatepermissionmodal')
@stop

@section('js')
<script src="{{ url('js/myjs.js') }}"></script>
<script src="{{ url('js/permissionmodal.js') }}"></script>
@stop