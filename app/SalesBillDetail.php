<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesBillDetail extends Model
{
    public function  Product(){
        $this->belongsToMany('App\Product','ProductID');
    }

    public function  SalesBill(){
        $this->belongsTo('App\SalesBill','Sale_Bill_ID');
    }
}
