<?php

namespace App\Http\Resources\Seeker;

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
        $seeker = $this->seeker;

        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'usd' => $this->usd,
            'role' => $this->roles()->first()->name,
            'first_name' => $seeker->first_name,
            'last_name' => $seeker->last_name,
            'last_name' => $seeker->last_name,
            'gender' => ucfirst($seeker->gender),
            'dob' => $seeker->dob,
            'marital' => $seeker->marital,
            'mobile' => $seeker->mobile,
            'nationality' => $seeker->nationality,
            'address' => $seeker->address,
            'avatar' => $this->avatar(),
        ];
    }

    public function seeker()
    {
        return $this->seeker;
    }

    public function avatar()
    {
        if($this->avatar){
            return $this->avatar->path();
        }

        return '/images/empty-profile-picture.png';
    }
}
