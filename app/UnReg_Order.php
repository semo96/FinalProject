<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\UnReg_Order_Detail;

class UnReg_Order extends Model
{
    public function Unreg_customere(){
        $this->belongsTo('App\Unreg_customere','Unreg_Customerid');
    }

    public function UnReg_Order_Detail(){
        $this->belongsToMany('App\UnReg_Order_Detail','OrderID');
    }
}
