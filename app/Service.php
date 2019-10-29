<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
   
    public function appointment() {
        return $this->hasMany('App\Appointment');
    }

    public function service() {
        return $this->belongsTo('App\Service');
    }

    public $timestamps = false;
}
