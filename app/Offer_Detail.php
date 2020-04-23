<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer_Detail extends Model
{
    public $timestamps=false;
    protected $primaryKey='Offer_Detais_ID';
    protected $fillable=['Quantity','discount','Offer_desc','product_unite_of_measure','ProductID','CategoryID','PriceID','OfferID'];
    public function products()
    {
        return $this->belongsTo('App\Product','ProductID');
    }
    public function ProductUniteOfMeasures()
    {
        return $this->belongsTo('App\ProductUniteOfMeasure','product_unite_of_measure_id');
    }
    public function Offer(){
       return $this->belongsTo('App\Offer','OfferID');
    }
    //
}
