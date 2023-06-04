<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CityCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
