<?php

namespace App\Http\Requests\Package;

use App\Helper\Helper;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class PackageStoreRequest extends FormRequest
{
    public function rules(): array
    {
        $rules = [
            'packageble_type'       => 'required',
            'packageble_id'         => 'required',

            'name_en'               => 'required|string',
            'detail_en'             => 'nullable|string',

            'name_id'               => 'nullable|string',
            'detail_id'             => 'nullable|string',
        ];
        return $rules;
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            Helper::resJson('Validation failed', $validator->errors(), 422)
        );
    }
}