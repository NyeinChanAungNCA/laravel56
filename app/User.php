<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

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

    public function avatar(){
        return 'https://www.gravatar.com/avatar/' . md5($this->email) . 'x?s=45&d=mm';
    }

    public function artical(){
        return $this->hasMany('App\Artical');
    }
    public function role(){
        return $this->belongsToMany('App\Role');
    }
}
