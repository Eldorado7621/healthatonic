<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $fillable = [
        'name','medicinecat_id','purchase','sales','generic','qtty','effect','expire',
    ];
	
	 public function medicinecats()
    {
        return $this->belongsTo('App\Medicinecat');
    }
	public function medpurchases()
	{
		return $this->hasMany('App\Medpurchase');
	}
	
	
	
}