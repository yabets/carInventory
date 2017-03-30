<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoundCar extends Model
{
    public $fillable = [];

    public function found(){
        return $this->belongsToMany('App\CallRecord', 'App\Car');
    }

    public function car(){
        return $this->belongTo('App\Car');
    }

    public function callRecord(){
        return $this->belongsTo('App\CallRecord', 'call_id');
    }
}
