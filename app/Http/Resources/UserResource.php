<?php

namespace App\Http\Resources;

use App\Http\Resources\ListingResource;
use App\Http\Resources\RoleResource;
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
            'roles' => RoleResource::collection($this->roles),
            'listings' => $this->listings->count(),
            'packages' => $this->packages->count(),
            'deposit_pending' => $this->deposit('pending'),
            'deposit_accepted' => $this->deposit('accepted')
        ];
    }

    public function deposit($status)
    {
        $deposit = $this->deposits()->where('status', $status);
        if($deposit->count()){
            return number_format(
                $this->deposits()->where('status', $status)->sum('amount'), 2
            );
        }

        return '0.00';
    }
}
