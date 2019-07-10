<?php

namespace App\Models;

use App\Models\PageType;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function types()
	{
		return $this->belongsTo(PageType::class, 'type');
	}
}
