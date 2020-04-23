<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesOrder extends Model
{
    
    public function RegisteredCustomere(){
        $this->belongsTo('App\RegisteredCustomere','Customerid');
    }

    public function SalesOrderDetail(){
        $this->belongsToMany('App\SalesOrderDetail','OrderID');
    }
}
