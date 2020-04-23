<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Supervisor extends  Authenticatable

{    
   public $timestamps=false;
   protected $table='supervisors';
    protected $fillable=['sup_first_name','sup_last_name','username','password','job_title','sup_status','is_Admin','sup_image'];

    protected $hidden = [
        'password', 'remember_token',
    ];
    public function roles(){
      return  $this->belongsToMany('App\Role','user__roles','RoleID','userID');
    }

    public function SupervisorContacts(){
       return $this->belongsToMany('App\SupervisorContact','supervisorID');
    }

    public function Tasks(){
       return $this->belongsToMany('App\Task','supervisorID');
    }

    public function Salespeople(){
       return $this->hasMany('App\Salespeople','supervisorID');
    }
}
