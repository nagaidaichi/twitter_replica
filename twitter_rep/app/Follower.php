<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    public function master()
    {
        return $this->hasMany('App\master');
    }
}
