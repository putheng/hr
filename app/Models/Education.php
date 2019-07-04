<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
	protected $fillable = [
		'name'
	];
	
    public function scopeLatest($query)
    {
        return $query->orderBy('id', 'desc');
    }
}
