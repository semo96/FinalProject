<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public function Colors(){
        $this->belongsToMany('App\Color','colorID');
    }

    public function AreasCoordinate(){
        $this->belongsToMany('App\AreasCoordinate','AreaID');
    }

    public function Tasks(){
        $this->belongsToMany('App\Task','Task_Area_ID');
    }
}
