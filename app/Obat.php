<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Obat extends Model
{
    //

    public function koneksi(){
       
        return $this->belongsToMany('App\Pembeli','koneksi','obat_id','pembeli_id');
        
    }
    
}
