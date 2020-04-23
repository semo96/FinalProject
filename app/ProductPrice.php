<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    public function Product(){
        $this->belongsTo('App\Product','PriceID');
    }
}
