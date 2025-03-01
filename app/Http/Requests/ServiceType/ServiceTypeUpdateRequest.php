<?php

namespace App\Http\Requests\ServiceType;

use App\Helper\Helper;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ServiceTypeUpdateRequest extends FormRequest
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
