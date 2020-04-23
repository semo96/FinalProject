<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model

{
    public $timestamps=false;
    protected $primaryKey='Offer_ID';
    public function customers(){
     return   $this->belongsToMany('App\RegisteredCustomere','customer__offers','OfferID','CustomerID');
    }

    public function Offer_details(){
     return   $this->hasMany('App\Offer_Detail','OfferID');
    }
}
