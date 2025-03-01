<?php

namespace App\Http\Requests\Order;

use App\Helper\Helper;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class OrderStoreRequest extends FormRequest
{
 
    public function rules(): array
    {
        return [
            'orderable_id' => 'required|integer',
            'orderable_type' => 'required|string', 
            'room_code' => 'required|string|max:50',
            'customer_name' => 'required|string|max:100',
            'customer_phone' => 'required|string',
            'done_proof' => 'nullable|string',
            'status' => 'required|in:pending,confirmed,on process,on delivery,done',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            Helper::resJson('Validation failed', $validator->errors(), 422)
        );
    }
}