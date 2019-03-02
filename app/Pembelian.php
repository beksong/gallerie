<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    protected $fillable=['suplier_id','no_faktur','tgl_faktur','jth_tempo','user_id','jenis','tgl_pengiriman','tgl_terima','no_sjpembelian'];

    public function suplier()
    {
    	return $this->belongsTo('App\Suplier');
    }

    public function detilpembelians()
    {
    	return $this->hasMany('App\Detilpembelian');
    }

    public function logpembelians()
    {
    	return $this->hasMany('App\Logpembelian');
    }
}
