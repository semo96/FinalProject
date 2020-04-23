<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReturnedProductsBillDetail extends Model
{
    public function  ReturnedProductsBill (){
        $this->belongsTo('App\ReturnedProductsBill ','Return_Bill_ID');
    }
}
