<?php

namespace App\Http\Requests\PaymentChannel;

use Illuminate\Foundation\Http\FormRequest;

class PaymentChannelStoreRequest extends FormRequest
{
    public function rules(): array
    {
        $rules = [
            'name'          => 'required|string',
            'description'   => 'nullable|string',
            'status'        => 'required|in:AKTIF,TIDAK_AKTIF',
        ];
        return $rules;
    }
}