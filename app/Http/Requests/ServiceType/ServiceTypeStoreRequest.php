<?php

namespace App\Http\Requests\ServiceType;

use Illuminate\Foundation\Http\FormRequest;

class ServiceTypeStoreRequest extends FormRequest
{
    public function rules(): array
    {
        $rules = [
            'name'          => 'required|string',
            'price'         => 'required|numeric',
            'status'        => 'required|in:AKTIF,TIDAK_AKTIF',
        ];
        return $rules;
    }
}