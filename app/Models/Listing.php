<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Company;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Level;
use App\Models\Location;
use App\Models\Salary;
use App\Models\Term;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Listing extends Model
{
	use SoftDeletes;

	protected $dates = [
		'start', 'closing'
	];

    public function scopeIslive($q)
    {
        return $this->where('live', 1);
    }

    public function scopeIsNotlive($q)
    {
        return $this->where('live', 0);
    }

	public function getStartDateAttribute()
	{
		return $this->start->format('d-F-Y');
	}

	public function getClosingDateAttribute()
	{
		return $this->closing->format('d-F-Y');
	}

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function company()
    {
    	return $this->belongsTo(Company::class);
    }

    public function term()
    {
    	return $this->belongsTo(Term::class);
    }

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function level()
    {
    	return $this->belongsTo(Level::class);
    }

    public function experience()
    {
    	return $this->belongsTo(Experience::class);
    }

    public function salary()
    {
    	return $this->belongsTo(Salary::class);
    }

    public function education()
    {
    	return $this->belongsTo(Education::class);
    }

    public function location()
    {
    	return $this->belongsTo(Location::class);
    }
}
