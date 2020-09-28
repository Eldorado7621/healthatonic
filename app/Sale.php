<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'item','price','qtty','user_id','invoice_id','phc_id',
    ];
	public function user()
    {
        return $this->belongsTo(User::class);
    }
	public function phc()
    {
        return $this->belongsTo(Phc::class);
    }
	
}