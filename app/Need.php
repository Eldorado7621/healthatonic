<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Need extends Model
{
    protected $fillable = [
        'item', 'uploaded_by','verified','brief_desc','qtty','price','picture'
    ];
	
	 public function phcs()
    {
        return $this->belongsToMany('App\Phc');
    }
	 public function user()
    {
        return $this->belongsTo(User::class);
    }
}