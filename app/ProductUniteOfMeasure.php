<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductUniteOfMeasure extends Model

{
    protected $primaryKey='product_unite_of_measure_id';
    public function Product(){
       return $this->belongsToMany('App\Product','p_unite_of_measures','product_unite_of_measure_id','Products_id');
    }
}
