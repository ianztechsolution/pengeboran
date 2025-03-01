<?php

namespace App\Http\Requests\ProjectService;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProjectServiceStoreRequest extends FormRequest
{
    public function rules(): array
    {
        $rules = [
            'service_type_id'             => [
                'required',
                'integer',
                Rule::exists('service_types', 'id')
            ],
            'project_id'             => [
                'required',
                'integer',
                Rule::exists('projects', 'id')
            ],
            'technician_id' => 'nullable|integer',
            'description'   => 'nullable|string|max:65535',
            'status'        => 'required|in:REQUEST_APPROVAL,WAITING_PAYMENT,SCHEDULED,DONE,CANCELED',
        ];
        return $rules;
    }
}