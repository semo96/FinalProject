<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstalmentsBond extends Model
{
    public function SalesBill(){
        $this->belongsTo('App\SalesBill','SalesBillID');
    }
}
