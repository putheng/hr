<?php

namespace App\Http\Resources\Admin;

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
            'role' => $this->roles()->first()->name,
            'listings' => $this->listings(),
            'deposits' => $this->deposits(),
            'employers' => $this->employers(),
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
}
