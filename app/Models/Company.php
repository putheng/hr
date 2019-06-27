<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	protected $fillable = [
		'name', 'phone', 'address', 'description', 'website'
	];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function variation()
    {
    	return $this->morphTo();
    }

    public function avatar()
    {
        return $this->hasOne(Image::class);
    }
}
