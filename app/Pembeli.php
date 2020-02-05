<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Pembeli extends Model
{
    public function pembeli(){
        return $this->belongsTo('App\Karyawan');
    }

    public function koneksi(){
        return $this->belongsToMany('App\Obat','koneksi','pembeli_id','obat_id');
    }
}
