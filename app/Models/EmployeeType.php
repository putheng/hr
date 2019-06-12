<?php

namespace App\Models;

use App\Models\Company;
use Illuminate\Database\Eloquent\Model;

class EmployeeType extends Model
{
    protected $fillable = ['name'];

    public function company()
    {
    	return $this->morphMany(Company::class, 'variation');
    }
}
