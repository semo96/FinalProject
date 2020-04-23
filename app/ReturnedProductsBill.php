<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReturnedProductsBill extends Model
{
    public function  SalesBill(){
        $this->belongsTo('App\SalesBill','Sale_Bill_ID');
    }

    public function  ReturnedProductsBillDetails (){
        $this->belongsToMany('App\ReturnedProductsBillDetail ','Return_Bill_ID');
    }
}
