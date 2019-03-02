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
    <!-- table -->
    <div class="table-responsive">
    	<table class="table table-bordered table-hover" id="tbpermissionuser">
    		<thead>
    			<tr>
                    <th>No.</th>
                    <th>Role Name</th>
                    <th>Permission</th>
                    <th>Action</th>
                </tr>
    		</thead>
    		<tbody>
                @foreach($roles as $key=>$r)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$r->name}}</td>
                        <td>
                            @foreach($r->perms as $key=>$p)
                                <ul>
                                    <li>{{$p->display_name}} - {{$p->description}}</li>
                                </ul>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{url('permissionrole/'.$r->id)}}" class="btn btn-warning"><i class="fa fa-btn fa-pencil"></i></a>
                            <a href="{{url('detachallpermissionrole/'.$r->id)}}" class="btn btn-danger"><i class="fa fa-btn fa-trash"></i></a>
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