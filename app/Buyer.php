<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    protected $fillable = [];

    public function callRecords(){
        return $this->hasMany('App\CallRecord');
    }
}
