<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Admin\ProductDetail as ProductResource;

class Auction extends JsonResource {
    public function toArray($request) {
        return [
            'auction_id' => $this->id,
            'product' => $this->product->productDetail,
            'qty' => $this->qty,
            'unit' => $this->product->unit->detail[0]->name,
            'duration' => $this->duration,
            'starting_price' => $this->starting_price,
            'min_bid' => $this->min_bid,
            'multiplier_bid' => $this->multiplier_bid,
            'is_active' => $this->is_active,
        ];
    }
}
