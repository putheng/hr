<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
	use SoftDeletes;

	protected $fillable = ['question', 'answer'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
