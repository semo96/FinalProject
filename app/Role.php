<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps=false;
    public function supervisors(){
        $this->belongsToMany('App\Supervisor','user__roles','RoleID','userID');
    }
}
