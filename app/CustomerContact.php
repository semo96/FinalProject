<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerContact extends Model
{
    public $timestamps=false;

    protected $fillable = ['phone_number','email_address'];

    
    public function RegisteredCustomere(){
        $this->belongsTo('App\RegisteredCustomere','Customerid');
    }
}
