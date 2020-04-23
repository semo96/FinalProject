<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    public function  Products(){
        $this->belongsToMany('App\Product','CategoryID');
    }
}
