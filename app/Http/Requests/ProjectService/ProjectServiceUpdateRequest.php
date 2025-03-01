<?php

namespace App\Http\Requests\ProjectService;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProjectServiceUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        $rules = [
            'service_type_id'             => [
                'nullable',
                'integer',
                Rule::exists('service_types', 'id')
            ],
            'technician_id' => 'nullable|integer',
            'description'   => 'nullable|string|max:65535',
            'status'        => 'nullable|in:REQUEST_APPROVAL,WAITING_PAYMENT,SCHEDULED,DONE,CANCELED',
        ];
        return $rules;
    }
}
