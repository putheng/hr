<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	protected $fillable = [
		'name', 'phone', 'address', 'description', 'website', 'featured', 'blocked'
	];

    public function scopeLatest($query)
    {
        return $query->orderBy('id', 'desc');
    }

    public function scopeIsblocked($query)
    {
        return $query->where('blocked', true);
    }

    public function scopeIsNotblocked($query)
    {
        return $query->where('blocked', false);
    }

    public function scopeIsFeatured($query)
    {
        return $query->where('featured', true);
    }

    public function scopeIsNotFeatured($query)
    {
        return $query->where('featured', false);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function avatar()
    {
        return $this->hasOne(Image::class);
    }
}
