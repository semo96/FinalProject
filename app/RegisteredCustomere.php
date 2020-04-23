<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegisteredCustomere extends Model
{

    protected $hidden = ['pivot'];
    protected $primaryKey='Customer_ID';
    public $timestamps=false;
    //desiable timestamp

    public function Salesperson(){
       return $this->belongsTo('App\Salespeople','SalespersonID');
    }

    public function SalesBills(){
        $this->belongsToMany('App\SalesBill','CustomerID');
    }

    /*public function CustomerAddress(){
        $this->belongsToMany('App\CustomerAddress','Customerid');
    }*/

    public function CustomerAddress(){
        $this->belongsToMany(CustomerAddress::class);
    }

    public function CustomerContacts(){
        $this->belongsToMany('App\CustomerContact','Customerid');
    }

    public function SalesOrders(){
        $this->belongsToMany('App\SalesOrder','Customerid');
    }

    public function Feedbacks(){
        $this->belongsToMany('App\Feedback','Cus_ID');
    }

    public function Offers(){
        $this->belongsToMany('App\Offer','customer__offers','CustomerID','OfferID');
    }
}
