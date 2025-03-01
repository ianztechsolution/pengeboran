<?php

namespace App\Http\Requests\Project;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProjectUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        $rules = [
            'payment_channel_id'             => [
                'nullable',
                'integer',
                Rule::exists('payment_channels', 'id')
            ],
            'title'         => 'nullable|string|max:255',
            'date'          => 'nullable|date|string',
            'address'       => 'nullable|string|max:65535',
            'description'   => 'nullable|string|max:65535',
            'status'        => 'nullable|in:REQUEST_APPROVAL,WAITING_PAYMENT,SCHEDULED,DONE,CANCELED',
        ];
        return $rules;
    }
}
