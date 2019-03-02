<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Barang;
class Merk extends Model
{
    protected $fillable=['brand'];

    public function barangs()
    {
    	return $this->hasMany('App\Barang');
    }

}
