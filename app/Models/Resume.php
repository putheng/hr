<?php

namespace App\Models;

use App\Models\File;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resume extends Model
{
	use SoftDeletes;

	public function scopeLatest($query)
	{
		return $query->orderBy('id', 'desc');
	}

    public function scopeCv($query)
    {
        return $query->where('type', 2);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function file()
    {
    	return $this->belongsTo(File::class);
    }
}
