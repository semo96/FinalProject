<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    public function RegisteredCustomere(){
        $this->belongsTo('App\RegisteredCustomere','Cus_ID');
    }
}
