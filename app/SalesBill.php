<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesBill extends Model
{
    public function Salesperson(){
        $this->belongsTo('App\Salesperson','SalespersonID');
    }

    public function RegisteredCustomere(){
        $this->belongsTo('App\RegisteredCustomere','CustomerID');
    }

    public function InstalmentsBonds(){
        $this->belongsToMany('App\InstalmentsBond ','SalesBillID');
    }

    public function  SalesBillDetails(){
        $this->belongsToMany('App\SalesBillDetail','Sale_Bill_ID');
    }

    public function  ReturnedProductsBills(){
        $this->belongsToMany('App\ReturnedProductsBill','Sale_Bill_ID');
    }

  
}
