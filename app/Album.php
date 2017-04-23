<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    //
    public function album()
    {
        return $this->belongsTo('App\Song');
    }
}
