<?php

namespace App\Models;

use App\Models\Listing;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Urgent extends Model
{
    public function listing()
    {
    	return $this->belongsTo(Listing::class);
    }

    public function scopeIsLive($query)
    {
    	return $this->whereDate('expired_at', '>=', Carbon::now());
    }
}
