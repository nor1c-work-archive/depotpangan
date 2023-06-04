<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\Country as CountryResource;
use App\Http\Resources\Admin\State as StateResource;
use Illuminate\Http\Resources\Json\JsonResource;

class City extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'state_id' => $this->state_id,
            'country_id' => $this->country_id,
            'status' => $this->status,
            'country' => new CountryResource($this->whenLoaded('country')),
            'state' => new StateResource($this->whenLoaded('state')),
        ];
    }
}
