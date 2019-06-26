<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Seeker extends Model
{
	protected $fillable = [
		'first_name', 'last_name', 'gender', 'dob', 'marital', 'mobile', 'nationality', 'address'
	];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
