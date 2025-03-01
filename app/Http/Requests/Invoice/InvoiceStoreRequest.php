<?php

namespace App\Http\Requests\Invoice;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class InvoiceStoreRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        $this->merge([
            'discount' => $this->discount ?? 0,
            'tax' => $this->tax ?? 0,
            'total_payment' => $this->total_payment ?? 0,
        ]);
    }

    public function rules(): array
    {
        $rules = [
            'project_id'             => [
                'nullable',
                'integer',
                Rule::exists('projects', 'id')
            ],
            'customer_id'             => [
                'nullable',
                'integer',
            ],
            'invoice_no'    => 'required|string|max:255',
            'total_price'   => 'required|string|max:255',
            'discount'      => 'nullable|numeric',
            'tax'           => 'nullable|numeric',
            'grand_total'   => 'required|string|max:255',
            'total_payment' => 'nullable|numeric',
            'paid_date'     => 'nullable|date',
            'description'   => 'nullable|string|max:65535',
            'status'        => 'required|in:WAITING_PAYMENT,PAID',
        ];
        return $rules;
    }
}