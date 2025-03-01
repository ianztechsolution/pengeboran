<?php

namespace App\Http\Requests\Payment;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PaymentStoreRequest extends FormRequest
{
    public function rules(): array
    {
        $rules = [
            'customer_id'             => [
                'required',
                'integer',
                Rule::exists('users', 'id')
            ],
            'project_id'             => [
                'required',
                'integer',
                Rule::exists('projects', 'id')
            ],
            'invoice_id'    => 'nullable|integer',
            'total_payment' => 'nullable|numeric',
            'paid_date'     => 'nullable|date',
            'description'   => 'nullable|string|max:65535',
            'status'        => 'required|in:WAITING_PAYMENT,PAID',
        ];
        return $rules;
    }
}