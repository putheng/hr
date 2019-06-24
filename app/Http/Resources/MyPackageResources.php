<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MyPackageResources extends JsonResource
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
            'id' => $this->pivot->id,
            'title' => $this->title,
            'name' => $this->title,
            'post' => $this->post,
            'remain_post' => $this->post - $this->remain_post(),
            'cv' => $this->cv,
            'price' => $this->price,
            'days' => $this->days,
            'status' => $this->status(),
        ];
    }

    public function remain_post()
    {
        return \DB::table('listing_package_view')
            ->where('package_user_id', $this->pivot->id)->get()->count();
    }

    public function status()
    {
        return $this->post > $this->remain_post();
    }
}
