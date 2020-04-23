<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ERP_Bill_Detail extends Model
{
    public function  Product(){
        $this->belongsToMany('App\Product','ProductID');
    }

    public function ERP_Bill (){
        $this->belongsTo('App\ERP_Bill ','ERP_Bill_ID');
    }

    public function Offer(){
        $this->belongsTo('App\Offer','OfferID');
    }
}
