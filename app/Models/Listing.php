<?php

namespace App\Models;

use App\Filters\ListingFilter;
use App\Models\Category;
use App\Models\Company;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Level;
use App\Models\ListingPackage;
use App\Models\Location;
use App\Models\Package;
use App\Models\Salary;
use App\Models\Term;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Listing extends Model
{
	use SoftDeletes;

	protected $dates = [
		'start', 'closing'
	];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeFilter(Builder $builder, Request $request, array $filters = [])
    {
        return (new ListingFilter($request))->add($filters)->filter($builder);
    }

    public function scopeIslive($query)
    {
        return $query->where('live', true);
    }

    public function scopeLatest($query)
    {
        return $query->orderBy('id', 'desc');
    }

    public function scopeIsNotlive($query)
    {
        return $query->where('live', 0);
    }

    public function scopeIsExpired($query)
    {
        return $query->whereDate('expires_at', '<=', Carbon::now());
    }

    public function scopeIsNotExpired($query)
    {
        return $query->whereDate('expires_at', '>=', Carbon::now());
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

    public function packages()
    {
        return $this->belongsToMany(Package::class);
    }

    public function urgent()
    {
        return $this->belongsTo(Urgent::class);
    }

    public function package()
    {
        return $this->hasOne(ListingPackage::class);
    }
}
