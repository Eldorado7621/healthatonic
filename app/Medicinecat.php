<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicinecat extends Model
{
    protected $fillable = [
        'name', 'description','phc_id',
    ];
	
	 public function phcs()
    {
        return $this->belongsTo('App\Phc');
    }
	public function medicines()
	{
		return $this->hasMany('App\Medicine');
	}
	
	
}