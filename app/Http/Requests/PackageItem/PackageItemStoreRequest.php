<?php

namespace App\Http\Requests\PackageItem;

use App\Helper\Helper;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class PackageItemStoreRequest extends FormRequest
{
    public function rules(): array
    {
        $rules = [
            'package_id'             => [
                'required',
                'integer',
                Rule::exists('packages', 'id')
            ],

            'minimum_order'         => 'required|numeric',
            'name_en'               => 'required|string',
            'price_en'              => 'nullable|numeric',

            'name_id'               => 'nullable|string',
            'price_id'              => 'nullable|numeric',
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