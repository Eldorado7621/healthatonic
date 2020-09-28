<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'name','address','email','phnNo',
    ];
	 
	 public function phcs()
    {
        return $this->belongsToMany('App\Phc');
    }
	public function referrals()
	{
		return $this->hasMany('App\Referral');
	}
	public function antenatals()
	{
		return $this->hasMany('App\Antenatal');
	}
	public function diagnoses()
	{
		return $this->hasMany('App\Diagnose');
	}
}