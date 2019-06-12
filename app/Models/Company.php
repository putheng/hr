<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function variation()
    {
    	return $this->morphTo();
    }
}
