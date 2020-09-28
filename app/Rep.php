<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rep extends Model
{
    protected $fillable = [
        'comment_id','reply',
    ];
	
	 public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
	
	
}