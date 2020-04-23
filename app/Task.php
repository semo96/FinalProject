<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public $timestamps=false;

    public function Supervisor(){
        $this->belongsTo('App\Supervisor');
    }

    public function Salesperson(){
        $this->belongsTo('App\Salesperson','SalespersonID');
    }

    public function Area (){
        $this->belongsTo('App\Area ','Task_Area_ID');
    }
}
