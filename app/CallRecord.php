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

    public function cars(){
        return $this->belongsToMany('App\Car', 'found_cars', 'car_id', 'call_id');
    }

}
