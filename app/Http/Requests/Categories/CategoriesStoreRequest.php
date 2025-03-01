<?php

namespace App\Http\Requests\Categories;

use App\Helper\Helper;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CategoriesStoreRequest extends FormRequest
{
    public function rules(): array
    {
        $rules = [
            'image_icon'            => 'required|
                                        image|
                                        mimes:jpeg,png,jpg,gif,svg,webp|
                                        max:'.env('IMAGE_UPLOAD_SIZE'),
            'parent_id'             => [
                                        'nullable',
                                        'integer',
                                        Rule::exists('categories', 'id')
                                    ],
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