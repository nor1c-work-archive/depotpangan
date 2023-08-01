<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerBalanceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'type' => 'required|in:deposit,withdraw',
            'total' => 'required',
            'payment_method' => 'required|in:midtrans',
        ];
    }
}
