<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logpembelian extends Model
{
    protected $fillable=['user_id','pembelian_id','ketlog'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function pembelian()
    {
    	return $this->belongsTo('App\Pembelian');
    }
}
