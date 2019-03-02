@extends('adminlte::page')

@section('csrf')
    <meta id="token" name="token" value="{{ csrf_token() }}">
@stop

@section('title', 'Gallerie | POS')

@section('content_header')
    <h1>Master Data Customer</h1>
@stop

@section('content')

<a href="" class="btn btn-success" style="margin-bottom:10px;" data-toggle="modal" data-target="#addcustomermodal"><i class="fa fa-btn fa-plus"></i>
    Tambah Data Customer
</a>

<!-- alert -->
@if(Session::has('message'))
     <div class="alert {{ Session::get('alert-class', 'alert-info') }}">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <strong>{{ Session::get('message') }}</strong>
    </div>
@endif
<!-- end alert -->
<div class="table-responsive">
	<table class="table table-bordered table-hover" id="tbcustomer">
		<thead>
			<th>No.</th>
			<th>Nama</th>
            <th>Alamat</th>
            <th>Telp</th>
			<th>Action</th>
		</thead>
		<tbody>
           @foreach($custs as $key=>$cust)
           <tr>
                <td>{{$key+1}}</td>
                <td>{{$cust->cust}}</td>
                <td>{{$cust->alamat}}</td>
                <td>{{$cust->telp}}</td>
                <td>
                    <a href="" class="btn btn-warning" data-toggle="modal" data-target="#editcustomermodal" data-id="{{$cust->id}}" data-cust="{{$cust->cust}}" data-telp="{{$cust->telp}}" data-alamat="{{$cust->alamat}}"><i class="fa fa-btn fa-pencil"></i></a>
                    <a href="" class="btn btn-danger" data-toggle="modal" data-target="#delcustomermodal"  data-id="{{$cust->id}}" data-cust="{{$cust->cust}}" data-telp="{{$cust->telp}}" data-alamat="{{$cust->alamat}}"><i class="fa fa-btn fa-trash"></i></a>
                </td>
           </tr>
           @endforeach
		</tbody>	
	</table>
</div>
    <!-- modal -->
    @include('customer.addcustomermodal')
    @include('customer.editcustomermodal')
    @include('customer.delcustomermodal')
@stop

@section('js')
<script src="{{ url('js/myjs.js') }}"></script>
<script src="{{ url('js/customer.js') }}"></script>

@stop