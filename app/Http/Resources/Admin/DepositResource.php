<?php

namespace App\Http\Resources\Admin;

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
            'company' => $this->company->name,
            'gateway' => $this->gateway->name,
            'amount' => number_format($this->amount, 2),
            'transaction' => $this->transaction,
            'status' => ucfirst($this->status),
            'description' => $this->description,
            'date' => $this->created_at->format('l dS \of F Y h:i:s A'),
        ];
    }
}
