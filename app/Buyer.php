<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    protected $fillable = ['name', 'phone', 'altPhone', 'star', 'remark'];

    public function callRecords(){
        return $this->hasMany('App\CallRecord');
    }

    public function delete()
    {
        $this->callRecords()->delete();

        return parent::delete();
    }
}
