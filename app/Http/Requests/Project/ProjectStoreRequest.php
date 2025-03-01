<?php

namespace App\Http\Requests\Project;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProjectStoreRequest extends FormRequest
{
    public function rules(): array
    {
        $rules = [
            'customer_id'             => [
                'required',
                'integer',
                Rule::exists('users', 'id')
            ],
            'payment_channel_id'             => [
                'required',
                'integer',
                Rule::exists('payment_channels', 'id')
            ],
            'title'         => 'required|string|max:255',
            'date'          => 'required|date',
            'address'       => 'nullable|string|max:65535',
            'description'   => 'nullable|string|max:65535',
            'status'        => 'required|in:REQUEST_APPROVAL,WAITING_PAYMENT,SCHEDULED,DONE,CANCELED',
        ];
        return $rules;
    }
}