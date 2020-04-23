<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps=false;
    protected $primaryKey='Product_ID';
    protected $fillable=['Product_ID','Product_name','Product_status','Product_Description','Lot_num','CategoryID','Product_image'];

    public function ProductUniteOfMeasures(){
        return $this->belongsToMany('App\ProductUniteOfMeasure','p_unite_of_measures','Products_id','product_unite_of_measure_id');
    }


    public function ProductCategory(){
        $this->belongsTo('App\ProductCategory','CategoryID');
    }

    public function ProductPrice(){
        $this->belongsTo('App\ProductPrice','PriceID');
    }

    public function SalesBillDetail(){
        $this->belongsTo('App\SalesBillDetail','ProductID');
    }

    public function ERP_Bill_Detail(){
        $this->belongsTo('App\ERP_Bill_Detail','ProductID');
    }

    public function SalesOrderDetail (){
        $this->belongsTo('App\SalesOrderDetail ','ProductID');
    }
}
