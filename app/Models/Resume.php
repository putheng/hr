<?php

namespace App\Models;

use App\Models\File;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resume extends Model
{
	use SoftDeletes;

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function file()
    {
    	return $this->belongsTo(File::class);
    }
}
