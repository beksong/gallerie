@extends('adminlte::page')

@section('title', 'GalleriePOS')

@section('content_header')
    <h1>Pengaturan Hak Akses User</h1>
@stop

@section('content')
    <div class="row" style="margin-bottom:15px">
        <div class="col-sm-offset-5">
            <h3>Hak Akses User Dalam Aplikasi</h3>
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
                    <th>Nama User</th>
                    <th>Hak Akses</th>
                    <th>Action</th>
                </tr>
    		</thead>
    		<tbody>
                @foreach($users as $key=>$user)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$user->name}}</td>
                        <td>
                            @if(count($user->roles)>0)
                                @foreach($user->roles as $key=>$perm)
                                    <ul>
                                        <li>{{$perm->name}}
                                            <ul>
                                                @foreach($perm->perms as $key=> $p)
                                                    <li>{{$p->display_name}}</li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                @endforeach
                            @endif
                        </td>
                        <td><a href="#" class="btn btn-warning" data-toggle="modal" data-target="#attachrolemodal" data-user_id="{{$user->id}}" data-user_name="{{$user->name}}" data-role_id="{{$perm->id}}" data-role_name="{{$perm->display_name}}"><i class="fa fa-btn fa-pencil"></i></a></td>
                    </tr>
                @endforeach
    		</tbody>	
    	</table>
    </div>
@stop
@include('role.attachrolemodal')
@section('js')
<script src="{{ url('js/myjs.js') }}"></script>
<script src="{{ url('js/permissionmodal.js') }}"></script>
@stop