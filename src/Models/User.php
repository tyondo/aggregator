<?php

namespace Tyondo\Aggregator\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'first_name','last_name','email', 'password', 'is_active' , 'role_id', 'photo_id', 'username',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function role()
    {
      return $this->belongsTo(config('aggregator.namespace').'Role');
    }
    public function photo()
    {
      return $this->belongsTo(config('aggregator.namespace').'Photo');
    }

    public function isAdmin()
    {
      if($this->role->name == 'administrator' && $this->is_active == 1)
      {
        return true;
      }
      return false;
    }
    public function canPost()
    {
      //setting role that can create posts
      $role = $this->role;
      if($role == 'author' || $role == 'admin')
        {
          return true;
        } else {
          return false;
        }
    }
    public function userProfile()
    {
      //each user has a single profile
        return $this->hasOne(config('aggregator.namespace').'UserProfile');
    }

    public function posts()
    {
      return $this->hasMany(config('aggregator.namespace').'Post');
    }
}
