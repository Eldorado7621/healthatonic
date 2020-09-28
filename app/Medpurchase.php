<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medpurchase extends Model
{
    protected $fillable = [
        'qtty','purchase_price','sales_price','uploaded_by',
    ];
	
	 public function medicine()
    {
        return $this->belongsTo('App\Medicine');
    }
	public function user()
    {
        return $this->belongsTo('App\User');
    }
	
	
	
}