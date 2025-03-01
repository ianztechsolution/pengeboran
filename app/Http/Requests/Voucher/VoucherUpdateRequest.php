<?php

namespace App\Http\Requests\Voucher;

use Illuminate\Foundation\Http\FormRequest;

class VoucherUpdateRequest extends FormRequest
{
   
    public function rules(): array
    {
        return [
            'code' => 'required|string|unique:vouchers,code',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'type' => 'required|in:percentage,fixed_amount',
            'apply_method' => 'required|in:specific_product,specific_product_and_total_transaction',
            'status' => 'required|in:active,inactive',
            
            // English content (required)
            'title_en' => 'required|string',
            'period_en' => 'required|string',
            'value_en' => 'required|numeric|min:0',
            'minimum_total_transaction_en' => 'nullable|numeric|min:0',
            'short_description_en' => 'nullable|string',
            'description_en' => 'nullable|string',
            'terms_condition_en' => 'nullable|string',
            
            // Indonesian content (optional)
            'title_id' => 'nullable|string',
            'period_id' => 'nullable|string',
            'value_id' => 'nullable|numeric|min:0',
            'minimum_total_transaction_id' => 'nullable|numeric|min:0',
            'short_description_id' => 'nullable|string',
            'description_id' => 'nullable|string',
            'terms_condition_id' => 'nullable|string',
        ];
    }
}
