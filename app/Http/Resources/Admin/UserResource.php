<?php

namespace App\Http\Resources\Admin;

use App\Models\Seeker;
use App\Models\{Company, Deposit, Listing};
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'usd' => $this->usd,
            'avatar' => $this->avatar(),
            'role' => $this->roles()->first()->name,
            'listings' => $this->listings(),
            'deposits' => $this->deposits(),
            'employers' => $this->employers(),
            'seekers' => $this->seekers(),
        ];
    }

    public function listings()
    {
        return Listing::get()->count();
    }

    public function deposits()
    {
        return Deposit::get()->count();
    }

    public function employers()
    {
        return Company::get()->count();
    }

    public function seekers()
    {
        return Seeker::get()->count();
    }

    public function avatar()
    {
        if($this->avatar){
            return $this->avatar()->orderBy('id', 'desc')->first()->path();
        }

        return '/images/empty-profile-picture.png';
    }
}
