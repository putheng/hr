<?php

namespace App;

use App\Models\Company;
use App\Models\Deposit;
use App\Models\Image;
use App\Models\Listing;
use App\Models\Package;
use App\Models\Resume;
use App\Models\Seeker;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function listings()
    {
        return $this->hasMany(Listing::class);
    }

    public function favorite()
    {
        return $this->belongsToMany(Listing::class)->withTimestamps();
    }

    public function packages()
    {
        return $this->belongsToMany(Package::class)->withTimestamps()->withPivot('id');
    }

    public function company()
    {
        return $this->hasOne(Company::class);
    }

    public function seeker()
    {
        return $this->hasOne(Seeker::class);
    }

    public function avatar()
    {
        return $this->hasOne(Image::class);
    }

    public function picture()
    {
        if($this->avatar){
            return $this->avatar->path();
        }

        return '/images/empty-profile-picture.png';
    }

    public function deposits()
    {
        return $this->hasMany(Deposit::class);
    }

    public function dashboard()
    {
        if($this->hasRole('admin|super-admin')){
            return route('admin.index');
        }

        if($this->hasRole('employer')){
            return route('employer.index');
        }
    }

    public function myresumes()
    {
        return $this->hasMany(Resume::class);
    }

    public function resumes()
    {
        return $this->belongsToMany(Resume::class);
    }
}
