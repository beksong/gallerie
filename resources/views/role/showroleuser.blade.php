@extends('adminlte::page')

@section('title', 'GalleriePOS')

@section('content_header')
    <h1>Tipe Hak Akses</h1>
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
                    <th>User</th>
                    <th>Hak Akses</th>
                    <th>Action</th>
                </tr>
    		</thead>
    		<tbody>
                @foreach($users as $key=>$u)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$u->name}}</td>
                        <td>
                            @foreach($u->roles as $key=>$r)
                                {{$r->display_name}}
                            @endforeach
                        </td>
                        <td>
                            <a href="" data-target="#updateroleusermodal"  data-user-id="{{$u->id}}" data-username="{{$u->name}}" data-toggle="modal" class="btn btn-warning"><i class="fa fa-btn fa-pencil"></i></a>
                            <a href="{{url('detachroleuser/'.$u->id)}}" class="btn btn-danger"><i class="fa fa-btn fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
    		</tbody>	
    	</table>
    </div>
    @include('role.attachrolemodal')
@stop

@section('js')
<script src="{{ url('js/myjs.js') }}"></script>
<script src="{{ url('js/roleuser.js') }}"></script>
@stop