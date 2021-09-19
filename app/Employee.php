<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function signs(){
        return $this->hasMany('App\Sign');
    }
}
