<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnReg_Order_Detail extends Model
{
    
    public function  Products(){
        $this->belongsToMany('App\Product','ProductID');
    }

    public function  UnReg_Order(){
        $this->belongsTo('App\UnReg_Order','OrderID');
    }
}
