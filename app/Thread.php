<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $fillable = [
        'prescription', 'diagnose',
    ];
	 public function diagnoses()
    {
        return $this->belongsToMany('App\Diagnose');
    }
	 
}