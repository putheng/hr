<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class PageResource extends JsonResource
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
            'content' => $this->content,
            'type_id' => $this->type_id(),
            'type_name' => $this->type_title(),
        ];
    }

    public function type_id()
    {
        return $this->types ? $this->types->id : null;
    }

    public function type_title()
    {
        return $this->types ? $this->types->title : null;
    }
}
