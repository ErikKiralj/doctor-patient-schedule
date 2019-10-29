<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    public $timestamps = false;

    public function doctor() {
        return $this->belongsTo('App\Doctor');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function service(){
        return $this->belongsTo('App\Service');
    }
}
