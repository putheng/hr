<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function path()
    {
    	return asset($this->path);
    }
}
