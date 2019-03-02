<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Merk;
class Barang extends Model
{
    protected $fillable=['kd_barang','category_id','barang','satuan','hrg_beli','hrg_jual','stok','stok_min','discount','merk_id','ongkir_pembelian'];
    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function merk()
    {
    	return $this->belongsTo('App\Merk');
    }

    public function detilpembelians()
    {
    	return $this->hasMany('App\Detilpembelian');
    }

}
