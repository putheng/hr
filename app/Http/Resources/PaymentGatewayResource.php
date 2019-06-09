<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentGatewayResource extends JsonResource
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
            'max' => $this->minimum,
            'recipient' => $this->recipient,
            'status' => $this->status == 'enable' ? true : false,
            'image' => $this->photo(),
        ];
    }
}
