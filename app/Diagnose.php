<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnose extends Model
{
    protected $fillable = [
        'prescription', 'diagnose',
    ];
	 
	  public function threads()
    {
        return $this->belongsToMany('App\Thread');
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