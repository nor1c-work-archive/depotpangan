<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShippmentWithCityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'shippment_price' => 'required|string|max:255',
            'state_id' => 'required|exists:states,id',
            'country_id' => 'required|exists:countries,id',
            'city_id' => 'required',
        ];
    }
}
