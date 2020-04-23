<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreasCoordinate extends Model
{
    public function Area(){
        $this->belongsTo('App\Area','AreaID');
    }
}
