<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    //
    protected $fillable = ['brand', 'name', 'year', 'color', 'price', 'transmission', 'plate', 'location', 'meri', 'mileage', 'status', 'remark', 'owner_id', 'published', 'counter'];

    public function owner(){
        return $this->belongsTo('App\Owner');
    }
}


