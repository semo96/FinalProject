<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalespersonAddress extends Model
{
    public function Salespeople(){
        return  $this->belongsTo('App\Salespeople','SP_ID');
    }
}
