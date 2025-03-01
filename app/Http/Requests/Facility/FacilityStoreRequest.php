<?php

namespace App\Http\Requests\Facility;

use App\Helper\Helper;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class FacilityStoreRequest extends FormRequest
{
    public function rules(): array
    {
        $rules = [
            'images_en'              => 'required|array',
            'images_en.*'            => 'required|
                                        image|
                                        mimes:jpeg,png,jpg,gif,svg,webp|
                                        max:'.env('IMAGE_UPLOAD_SIZE'),
            'images_id.*'            => 'nullable|
                                        image|
                                        mimes:jpeg,png,jpg,gif,svg,webp|
                                        max:'.env('IMAGE_UPLOAD_SIZE'),

            'title_en'              => 'required|string',
            'short_description_en'  => 'nullable|string',
            'description_en'        => 'nullable|string',

            'title_id'              => 'nullable|string',
            'short_description_id'  => 'nullable|string',
            'description_id'        => 'nullable|string',
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