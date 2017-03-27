<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CallRecord extends Model
{
    protected $fillable = [];

    public function buyer(){
        return $this->belongsTo('App\Buyer');
    }

    public function requestedCars(){
        return $this->hasMany('App\RequestedCar');
    }

    public function foundCars(){
        return $this->hasMany('App\FounddCar');
    }

}
