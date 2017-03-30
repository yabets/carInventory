<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestedCar extends Model
{
    protected $fillable = ['brand', 'name', 'type','year', 'color', 'pricefrom', 'transmission', 'plate', 'priceto', 'meri', 'status', 'remark'];


    public function callRecord(){
        return $this->belongsTo('App\CallRecord');
    }
}
