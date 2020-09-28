<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title','name', 'email','address', 'password',
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
	 public function phcs()
    {
        return $this->belongsToMany('App\Phc');
    }
	public function needs()
    {
		return $this->hasMany(Need::class);
      
    }
	public function comments()
    {
		return $this->hasMany(Comment::class);
      
    }
	public function sales()
	{
		return $this->hasMany('App\Sale');
	}
	public function maintenances()
	{
		return $this->hasMany('App\Maintenance');
	}
	public function referrals()
	{
		return $this->hasMany('App\Referral');
	}
	public function medpurchases()
	{
		return $this->hasMany('App\Medpurchase');
	}
}
