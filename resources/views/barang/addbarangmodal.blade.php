<div class="modal fade" id="addbarangmodal" tabindex="-1" role="dialog" aria-labelledby="mymodallabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-tittle"> Tambah Data Barang</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" enctype="multipart/form-data" role="form" id="frmaddbarang" action="{{url('/createbarang')}}" method="POST">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label for="category_id" class="col-sm-3 control-label">Kategori Barang</label>
                        <div class="col-sm-9">
                            <select class="form-control required" id="category_id" name="category_id" oninvalid="this.setCustomValidity('Kategori Barang Belum Dipilih')" required autocomplete="off">
                                <option value="">--Pilih Kategori Barang--</option>
                                @foreach($kats as $key=>$kat)
                                    <option value="{{$kat->id}}">{{$kat->kategori}}</option>
                                @endforeach
                            </select>
                        </div>
                        @if ($errors->has('category_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('category_id') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="kd_barang" class="col-sm-3 control-label">Kode Barang</label>
                        <div class="col-sm-9">
                            <input class="form-control required" type="text" id="kd_barang" name="kd_barang" placeholder="Kode Barang" oninvalid="this.setCustomValidity('Kode Barang Tidak Boleh Kosong')" required/>                          
                        </div>
                        @if ($errors->has('kd_barang'))
                            <span class="help-block">
                                <strong>{{ $errors->first('kd_barang') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="barang" class="col-sm-3 control-label">Nama Barang</label>
                        <div class="col-sm-9">
                            <input class="form-control required" type="text" id="barang" name="barang" placeholder="Nama Barang" oninvalid="this.setCustomValidity('Nama Barang Tidak Boleh Kosong')" required/>                            
                        </div>
                        @if ($errors->has('barang'))
                            <span class="help-block">
                                <strong>{{ $errors->first('barang') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="merk_id" class="col-sm-3 control-label">Brand/Merk Barang</label>
                        <div class="col-sm-9">
                            <select class="form-control required" id="merk_id" name="merk_id" oninvalid="this.setCustomValidity('Merk/Brand Barang Belum Dipilih')" required autocomplete="off">
                                <option value="">--Pilih Brand--</option>
                                @foreach($merks as $key=>$merk)
                                    <option value="{{$merk->id}}">{{$merk->brand}}</option>
                                @endforeach
                            </select>
                        </div>
                        @if ($errors->has('merk_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('merk_id') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="satuan" class="col-sm-3 control-label">Satuan</label>
                        <div class="col-sm-9">
                            <input class="form-control required" type="text" id="satuan" name="satuan" placeholder="Satuan Barang : buah,set,unit...dll" oninvalid="this.setCustomValidity('Satuan Barang Tidak Boleh Kosong')" required/>
                        </div>
                        @if ($errors->has('satuan'))
                            <span class="help-block">
                                <strong>{{ $errors->first('satuan') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="hrg_beli" class="col-sm-3 control-label">Harga Beli</label>
                        <div class="col-sm-9">
                            <input class="form-control required" type="text" id="hrg_beli" name="hrg_beli" onblur="hrgbeli()" onclick="removedotbeli()" placeholder="Rp. 0,-" oninvalid="this.setCustomValidity('Harga Beli/Modal Barang Tidak Boleh Kosong')" autocomplete="off" required/>
                        </div>
                        @if ($errors->has('hrg_beli'))
                            <span class="help-block">
                                <strong>{{ $errors->first('hrg_beli') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="hrg_jual" class="col-sm-3 control-label">Harga Jual</label>
                        <div class="col-sm-9">
                            <input class="form-control required" type="text" id="hrg_jual" name="hrg_jual" onblur="hrgjual()" onclick="removedotjual()" placeholder="Rp. 0,-" oninvalid="this.setCustomValidity('Harga Jual Barang Tidak Boleh Kosong')" autocomplete="off" required/>
                        </div>
                        @if ($errors->has('hrg_jual'))
                            <span class="help-block">
                                <strong>{{ $errors->first('hrg_jual') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="stok" class="col-sm-3 control-label">Stok Barang</label>
                        <div class="col-sm-9">
                            <input class="form-control required" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');" type="number" id="stok" min="0" name="stok" placeholder="Stok Barang" oninvalid="this.setCustomValidity('Stok Barang Tidak Boleh Kosong')" required/>
                        </div>
                        @if ($errors->has('stok'))
                            <span class="help-block">
                                <strong>{{ $errors->first('stok') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="stok_min" class="col-sm-3 control-label">Stok Minimum</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="number" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');" id="stok_min" min="0" name="stok_min" placeholder="Stok Minimum Barang"/>
                        </div>
                        @if ($errors->has('stok_min'))
                            <span class="help-block">
                                <strong>{{ $errors->first('stok_min') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="discount" class="col-sm-3 control-label">Discount</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="number" id="discount" min="0" name="discount" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');" placeholder="Discount Penjualan"/>
                        </div>
                        @if ($errors->has('discount'))
                            <span class="help-block">
                                <strong>{{ $errors->first('discount') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-8">
                            <button type="submit" class="btn btn-success"><i class="fa fa-btn fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>