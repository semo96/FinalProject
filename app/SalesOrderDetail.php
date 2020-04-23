<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesOrderDetail extends Model
{
    public function  Products(){
        $this->belongsToMany('App\Product','ProductID');
    }

    public function  SalesOrder(){
        $this->belongsTo('App\SalesOrder','OrderID');
    }
}
