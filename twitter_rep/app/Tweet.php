<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    public function master()
    {
        return $this->hasMany('App\master');
    }
}
