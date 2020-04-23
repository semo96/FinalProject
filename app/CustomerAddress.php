<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    public $timestamps=false;

    protected $table = 'customer_addresses';
    protected $casts = [ 'location_name' => 'array', 'Area' => 'array'];
    
    public function RegisteredCustomere(){
        $this->belongsTo('App\RegisteredCustomere','Customerid');
    }
}
