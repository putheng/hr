<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentGateway extends Model
{
	protected $fillable = [
		'name', 'minimum', 'recipient', 'status'
	];

	public function photo()
	{
		return '/images/payments/'. strtolower($this->name) .'.png';
	}
}
