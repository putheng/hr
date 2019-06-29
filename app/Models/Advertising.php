<?php

namespace App\Models;

use App\Models\File;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advertising extends Model
{
    use SoftDeletes;
    
    public function scopeIslive($query)
    {
        return $query->where('live', 1);
    }

    public function scopeLatest($query)
    {
        return $query->orderBy('id', 'desc');
    }

    public function scopeIsNotlive($query)
    {
        return $query->where('live', 0);
    }
    
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function file()
    {
    	return $this->belongsTo(File::class);
    }
}
