<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $fillable = [
        'item','description','user_id','phc_id',
    ];
	public function users()
    {
        return $this->belongsTo(User::class);
    }
	public function phcs()
    {
        return $this->belongsTo(Phc::class);
    }
	
}