<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DynamicField extends Model
{
    protected $fillable = [
        'item', 'uploaded_by','verified','brief_desc','qtty','price','picture'
    ];
}