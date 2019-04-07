<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    public function carmodel(){
         
         return $this->belongsTo('App\Carmodel');
    }

    public function carimg(){
    	return $this->hasMany('App\Carimg');
    }
}
