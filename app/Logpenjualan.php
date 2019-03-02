<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logpenjualan extends Model
{
    protected $fillable=['user_id','penjualan_id','description'];
}
