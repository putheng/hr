<?php

namespace App\Models;

use App\Models\PaymentGateway;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function scopeLatest($query)
    {
        return $query->orderBy('id', 'desc');
    }

    public function scopeIsPending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeIsAccepted($query)
    {
        return $query->where('status', 'accepted');
    }

    public function scopeIsRejected($query)
    {
        return $query->where('status', 'rejected');
    }

    public function gateway()
    {
    	return $this->belongsTo(PaymentGateway::class);
    }

    public function getCompanyAttribute()
    {
    	return $this->user->company;
    }
}
