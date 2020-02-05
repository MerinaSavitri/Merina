<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Stok extends Model
{
    public function obat(){
        return $this->belongsTo('App\Obat');
    }
}
