<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class AuctionRequest extends FormRequest {
    public function authorize() {
        return true;
    }

    public function rules(Request $request) {
        return [
            'product_id' => 'required|integer|exists:product,id',
            'qty' => 'required|min:1|integer',
            'duration' => 'required',
        ];
    }

    public function attribute() {
        return [
            'attributes' => 'required|array|exists:attributes,id',
        ];
    }
}
