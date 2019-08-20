<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function doctor() {

        return $this->belongsTo('App\Doctor');
    }

    public $timestamps = false;
}
