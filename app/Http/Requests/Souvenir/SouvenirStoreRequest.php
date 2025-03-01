<?php

namespace App\Http\Requests\Souvenir;

use App\Helper\Helper;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class SouvenirStoreRequest extends FormRequest
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
            'category_id'             => [
                                        'required',
                                        'integer',
                                        Rule::exists('categories', 'id')
                                    ],
            'title_en'              => 'required|string',
            'price_en'              => 'required|string',
            'short_description_en'  => 'required|string',
            'description_en'        => 'required|string',
            'note_en'               => 'nullable|string',

            'title_id'              => 'nullable|string',
            'price_id'              => 'nullable|string',
            'short_description_id'  => 'nullable|string',
            'description_id'        => 'nullable|string',
            'note_id'               => 'nullable|string',
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