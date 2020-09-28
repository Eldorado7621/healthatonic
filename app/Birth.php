<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Birth extends Model
{
    protected $fillable = [
        'father','mother','sex','weight','dob'
    ];
	 
	
}
