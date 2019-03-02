<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detilpembelian extends Model
{
    protected $fillable=['pembelian_id','barang_id','qty','hrgsatuan','subtotal','ongkir_pembelian'];

    public function pembelian()
    {
    	return $this->belongsTo('App\Pembelian');
    }

    public function barang()
    {
    	return $this->belongsTo('App\Barang');
    }
}
