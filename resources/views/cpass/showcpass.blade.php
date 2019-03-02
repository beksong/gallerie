@extends('adminlte::page')

@section('csrf')
    <meta id="token" name="token" value="{{ csrf_token() }}">
@stop

@section('title', 'Gallerie | POS')

@section('content_header')
    <h1>Ubah Password</h1>
@stop

@section('content')
    <!-- alert -->
    @if(Session::has('message'))
         <div class="alert {{ Session::get('alert-class', 'alert-info') }}">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <strong>{{ Session::get('message') }}</strong>
        </div>
    @endif
    <!-- end alert -->

    <div class="row">
        <div class="col-sm-12">
            <form class="form-horizontal" enctype="multipart/form-data" role="form" id="frmaddbrand" action="{{url('/changepass/change')}}" method="POST">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label for="oldpass" class="col-sm-2 control-label">Password Lama</label>
                        <div class="col-sm-4">
                            <input class="form-control required" type="password" id="oldpass" name="oldpass" placeholder="Password Lama" oninvalid="this.setCustomValidity('Password Lama Tidak Boleh Kosong')" required/>
                        </div>
                        @if ($errors->has('oldpass'))
                            <span class="help-block">
                                <strong>{{ $errors->first('oldpass') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="newpass" class="col-sm-2 control-label">Password Baru</label>
                        <div class="col-sm-4">
                            <input class="form-control required" type="password" id="newpass" name="newpass" placeholder="Password Baru" oninvalid="this.setCustomValidity('Password Baru Tidak Boleh Kosong')" required/>
                        </div>
                        @if ($errors->has('newpass'))
                            <span class="help-block">
                                <strong>{{ $errors->first('newpass') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <button type="submit" class="btn btn-info"><i class="fa fa-btn fa-save"></i> Ubah</button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
@stop

@section('js')
<script src="{{ url('js/myjs.js') }}"></script>
<script src="{{ url('js/brand.js') }}"></script>

@stop