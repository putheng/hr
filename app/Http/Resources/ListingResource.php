<?php

namespace App\Http\Resources;

use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ListingResource extends JsonResource
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
            'title' => $this->title,
            'user' => new UserResource($this->user),
            'company' => $this->company->name,
            'start' => $this->startDate,
            'closing' => $this->closingDate,
            'term' => optional($this->term)->name,
            'category' => optional($this->category)->name,
            'level' => optional($this->level)->name,
            'experience' => optional($this->experience)->name,
            'salary' => optional($this->salary)->name,
            'education' => optional($this->education)->name,
            'location' => optional($this->location)->name,

            'description' => $this->description,
            'requirement' => $this->requirement,
            'slug' => $this->slug,
        ];
    }
}
