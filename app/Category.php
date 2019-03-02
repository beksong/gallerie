<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Barang;
class Category extends Model
{
    protected $fillable=['kategori'];

    public function barangs()
    {
    	return $this->hasMany('App\Barang');
    }
}
