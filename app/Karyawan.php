<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Karyawan extends Model
{
    public function pembeli(){
        return $this->hasMany('App\Pembeli');
    }
}
