<?php

namespace App\Models;

use App\Models\Company;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['path'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function path()
    {
        return '/images/avatar' . $this->path;
    }

    public function cover()
    {
        return config('image.path.cover') . $this->path;
    }
}
