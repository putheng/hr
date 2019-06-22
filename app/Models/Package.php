<?php

namespace App\Models;

use App\Models\Listing;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    public function getIsAvaliableAttribute()
    {
        return $this->remainPost > 0;
    }

    public function getRemainPostAttribute()
    {
        return ($this->post - (int) $this->listings()->where('user_id', auth()->id())->count());
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function users()
    {
    	return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function listings()
    {
        return $this->belongsToMany(Listing::class);
    }
}
