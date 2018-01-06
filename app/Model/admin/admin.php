<?php

namespace App\Model\admin;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class admin extends Authenticatable
{
    use Notifiable;


  public function roles()
  {
  	return $this->belongsToMany('App\Model\admin\role');
  }

  protected $fillable = [
        'name', 'email', 'password', 'phone', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    
    public function setPasswordAttribute($value)
    {

        $this->attributes['password'] = bcrypt($value);

    }


    public function getNameAttribute($value)
    {

    	return ucfirst($value);
    }



}
