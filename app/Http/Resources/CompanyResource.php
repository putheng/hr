<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $company = $request->user()->company;

        return [
            'id' => $company->id,
            'name' => $company->name,
            'phone' => $company->phone,
            'email' => $company->email,
            'website' => $company->website,
            'address' => $company->address,
            'website' => $company->website,
            'about' => $company->description,
            'avatar' => $this->avatar($company),
        ];
    }

    public function avatar($company)
    {
        if($company->avatar){
            return $company->avatar->path();
        }

        return '/images/empty-profile-picture.png';
    }
}
