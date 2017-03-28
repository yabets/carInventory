<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $fillable = ['name', 'phone', 'altPhone', 'remark', 'Owner'];

    public function cars(){
        return $this->hasMany('App\Car');
    }
}
