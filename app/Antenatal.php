<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Antenatal extends Model
{
    protected $fillable = [
        'phc','name','user_id','weeks','expected_delivery','dob','pre_birth','created_at','updated_at'
    ];
	 
	public function patient()
    {
        return $this->BelongsTo(Patient::class);
    }
}
