<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unreg_customere extends Model
{
    public function UnReg_Orders(){
        $this->belongsToMany('App\UnReg_Order','Unreg_Customerid');
    }
}
