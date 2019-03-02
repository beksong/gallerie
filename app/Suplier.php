<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suplier extends Model
{
    protected $fillable=['nama','alamat','telp','email'];

    public function pembelians()
    {
    	return $this->hasMany('App\Suplier');
    }
}
