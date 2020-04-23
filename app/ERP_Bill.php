<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ERP_Bill extends Model
{
    public function Salesperson(){
        $this->belongsToMany('App\Salesperson','SalespersonID');
    }

    public function ERP_Bill_Details(){
        $this->belongsToMany('App\ERP_Bill_Detail','ERP_Bill_ID');
    }
}
