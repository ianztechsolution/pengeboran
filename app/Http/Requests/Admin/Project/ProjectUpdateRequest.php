<?php

namespace App\Http\Requests\Admin\Project;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProjectUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        $rules = [
            'technician_id'             => [
                'nullable',
                'integer',
                Rule::exists('users', 'id')
            ],
            'status'        => 'required|in:REQUEST_APPROVAL,WAITING_PAYMENT,SCHEDULED,DONE,CANCELED',
        ];
        return $rules;
    }
}
