<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
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
            'message' => $this->message,
            'username' => $this->user->name,
            'user_id' => $this->user_id,
            'class' => $this->getClass(),
        ];
    }

    public function getClass()
    {
        return $this->user_id == auth()->id();
    }
}
