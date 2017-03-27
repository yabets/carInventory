<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestedCar extends Model
{
    protected $fillable = [];

    public function callRecord(){
        return $this->belongsTo('App\CallRecord');
    }
}
