<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detilpenjualan extends Model
{
    protected $fillable=['penjualan_id','barang_id','qty','hrg_jual','hrg_beli','discount','nom_discount','hrg_jual_discount','potongan_item','hrg_jual_net','ongkir_pembelian'];

    public function penjualan()
    {
    	return $this->belongsTo('App\Penjualan');
    }

    public function barang()
    {
    	return $this->belongsTo('App\Barang');
    }
}
