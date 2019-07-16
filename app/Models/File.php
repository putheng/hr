<?php

namespace App\Models;

use App\Models\Resume;
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
    	return asset('uploads/'.$this->path);
    }

    public function resume()
    {
    	return $this->hasOne(Resume::class);
    }
}
