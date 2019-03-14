@extends('layouts.reportmaster')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div>
                <table class="table table-bordered table-responsive" id="tbstokall">
                    <thead>
                        <th>No.</th>
                        <th>Kode Barang</th>
                        <th>Kategori</th>
                        <th>Nama Barang</th>
                        <th>Brand</th>
                        <th>Stok</th>
                        <th>Satuan</th>
                        <th>Stok Minimal</th>
                    </thead>
                    <tbody>
                        @foreach($barangs as $key=>$barang)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$barang->kd_barang}}</td>
                                <td>{{$barang->category->kategori}}</td>
                                <td>{{$barang->barang}}</td>
                                <td>{{$barang->merk->brand}}</td>
                                <td>{{$barang->stok}}</td>
                                <td>{{$barang->satuan}}</td>
                                <td>{{$barang->stok_min}}</td>
                            </tr>
                        @endforeach
                    </tbody>    
                </table>
            </div>
        </div>
    </div>
@endsection