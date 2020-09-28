<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phc extends Model
{
    protected $fillable = [
        'name', 'address','state','lga',
    ];
	 public function users()
    {
        return $this->belongsToMany('App\User');
    }
	 public function needs()
    {
        return $this->belongsToMany('App\Need');
    }
	 public function patients()
    {
        return $this->belongsToMany('App\Patient');
    }
	 public function medicinecats()
    {
        return $this->belongsToMany('App\Medicinecat');
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
	public function diagnoses()
	{
		return $this->hasMany('App\Diagnose');
	}
}
