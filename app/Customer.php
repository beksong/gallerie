<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable=['cust','telp','alamat'];

    public function penjualans()
    {
    	return $this->hasMany('App\Penjualan');
    }
}
