<?php

namespace App;

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

    public function roles()
    {
        return $this->belongsToMany('App\Role')->withTimestamps();
    }

    public function hasRole($role) {
        if($this->roles()->where('name', $role)->first()) {
            return true;
        }

        return false;
    }

    public function workhours() {
        return $this->hasMany('App\WorkHour');
    }

    public function freedays() {
        return $this->hasMany('App\FreeDay');
    }

    public function getRouteKeyName()
    {
        return 'name';
    }
}
