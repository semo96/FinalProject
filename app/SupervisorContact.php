<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupervisorContact extends Model
{
    public $timestamps=false;
    public function Supervisor (){

        $this->belongsTo('App\Supervisor ','Supervisor_ID');
    }
}
