<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $fillable=['tgl_jual','no_nota','total_nomdiscount','total_potongan','pot_tambahan','total_net','user_id','no_sjpenjualan','tgl_kirim','sopir','gudang','status','customer_id','transaksi'];

    public function detilpenjualans()
    {
    	return $this->hasMany('App\Detilpenjualan');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function customer()
    {
    	return $this->belongsTo('App\Customer');
    }
}
