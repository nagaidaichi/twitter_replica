<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function followings()
    {
        return $this->belongsToMany(User::class, 'followers', 'following', 'followed');
    }

    public function followed()
    {
        return $this->belongsToMany(User::class, 'followers', 'followed', 'following');
    }

    public function is_following($userId)
    {
        return $this->followings()->where('followed', $userId)->exists();
    }

    public function follow($userId)
    {
        $existing = $this->is_following($userId);
        $myself = $this->id == $userId;
    
        if (!$existing && !$myself) {
            $this->followings()->attach($userId);
        }
    }

    public function unfollow($userId)
    {
        $existing = $this->is_following($userId);
        $myself = $this->id == $userId;
    
        if ($existing && !$myself) {
            $this->followings()->detach($userId);
        }
    }

    public function tweet()
    {
        return $this->hasMany('App\Tweet');
    }
}

