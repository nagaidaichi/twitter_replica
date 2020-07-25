<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getUserTimeLine($user_id) 
    {
        return $this->whereIn('user_id', [$user_id])->get();
    }
}
