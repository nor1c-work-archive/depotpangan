<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Admin\Customer as CustomerResource;

class CustomerBalance extends JsonResource
{
    public function toArray($request)
    {
        return [
            'balance_id' => $this->id,
            'customer_id' => new CustomerResource($this->whenLoaded('customer')),
            'amount' => $this->total,
            'type' => $this->type,
            'payment_method' => $this->payment_method,
            'transaction_date' => $this->created_at,
        ];
    }
}
