<?php

namespace App\Http\Requests\PaymentChannel;

use App\Helper\Helper;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class PaymentChannelUpdateRequest extends FormRequest
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
