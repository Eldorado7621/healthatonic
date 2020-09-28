<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'coment','user_id','pregnanthealthtip_id',
    ];
	
	
	 public function pregnanthealthtips()
    {
        return $this->belongsTo(Pregnanthealthtip::class);
    }
	 public function user()
    {
        return $this->belongsTo(User::class);
    }
	public function reps()
    {
		return $this->hasMany(Rep::class);
      
    }
	
	
}