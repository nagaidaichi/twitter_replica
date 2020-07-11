<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    public function follower() 
    {
        return $this->belongsTo('App\Follower');
    }

    public function tweet() 
    {
        return $this->belongsTo('App\Tweet');
    }
    
}
