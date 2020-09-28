<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregnanthealthtip extends Model
{
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subject','body', 'picture',
    ];

  
	 public function comments()
	 {
		return $this->hasMany(Comment::class);
      
    }
	
	
}
