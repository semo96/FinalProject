<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class salespersonContact extends Model
{
    public function Salespeople(){
      return  $this->belongsTo('App\Salespeople','SalespersonID');
    }
}
