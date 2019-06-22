<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DepositResource extends JsonResource
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
            'gateway' => $this->gateway->name,
            'amount' => number_format($this->amount, 2),
            'transaction' => $this->transaction,
            'status' => ucfirst($this->status),
            'date' => $this->created_at->format('l dS \of F Y h:i:s A'),
        ];
    }
}
