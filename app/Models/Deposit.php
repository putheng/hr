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

    public function gateway()
    {
    	return $this->belongsTo(PaymentGateway::class);
    }
}
