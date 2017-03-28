<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    protected $fillable = ['name', 'phone', 'altphon', 'star', 'remark'];

    public function callRecords(){
        return $this->hasMany('App\CallRecord');
    }
}
