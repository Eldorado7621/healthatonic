<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    protected $fillable = [
        'patient_id','situation','user_id','phc_id','referred_to'
    ];
	public function user()
    {
        return $this->belongsTo(User::class);
    }
	public function phc()
    {
        return $this->belongsTo(Phc::class);
    }
	public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
	
}