<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetails extends Model
{
    use HasFactory;
    public $timestamps = false;

    function getNameAttribute($value){
        return ucFirst($value);
    }

    function setPriceAttribute($val){
        return $this->attributes['price'] = $val.'rs./-';
    }

    function one2onerelation(){
        return $this->hasOne('App\Models\CustomerProduct');
    }
}
