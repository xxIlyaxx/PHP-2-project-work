<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    //
    public function songs()
    {
        return $this->hasMany('App\Album');
    }
}
