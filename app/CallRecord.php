<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CallRecord extends Model
{
    protected $fillable = ['found', 'wantSee', 'schedule', 'checked', 'seen', 'sold', 'Remark'];
    protected $dates = ['schedule'];

    public function buyer(){
        return $this->belongsTo('App\Buyer');
    }

    public function requestedCars(){
        return $this->hasMany('App\RequestedCar', 'call_id');
    }

    public function cars(){
        return $this->belongsToMany('App\Car', 'found_cars', 'call_id', 'car_id');
    }

    public function delete()
    {
        $this->requestedCars()->delete();

        return parent::delete();
    }

}
