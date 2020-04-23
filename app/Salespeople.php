<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salespeople extends Model
{  protected $primaryKey='SP_ID';
    public function SalespersonAddress(){
      return $this->hasMany('App\SalespersonAddress','SP_ID');
    }

    public function salespersonContact(){
       return $this->hasMany('App\salespersonContact','SalespersonID');
    }

    public function ERP_Bill(){
       return $this->belongsToMany('App\ERP_Bill','SalespersonID');
    }

    public function Tasks(){
        return $this->belongsToMany('App\Task','SalespersonID');
    }

    public function RegisteredCustomeres(){
        return $this->hasMany('App\RegisteredCustomere','SalespersonID');
    }

    public function SalesBills(){
    return    $this->belongsToMany('App\SalesBill','SalespersonID');
    }

    public function Supervisor(){
       return $this->belongsTo('App\Supervisor','supervisorID');
    }
}
