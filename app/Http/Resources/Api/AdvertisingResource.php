<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class AdvertisingResource extends JsonResource
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
            'area' => $this->area($this->area),
            'link' => $this->link,
            'name' => $this->file->name,
            'path' => $this->file->path(),
            'status' => $this->live == 1 ? 'Enable' : 'Disable',
        ];
    }

    public function area($id)
    {
        $area = ['', 'One', 'Two', 'Three', 'Four'];

        return $area[$id];
    }
}
