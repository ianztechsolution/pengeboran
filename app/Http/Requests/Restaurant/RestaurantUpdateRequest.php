<?php

namespace App\Http\Requests\Restaurant;

use App\Helper\Helper;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class RestaurantUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'image_icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:'.env('IMAGE_UPLOAD_SIZE'),
            'name_en' => 'required|string|max:255',
            'short_description_en' => 'nullable|string|max:255',
            'description_en' => 'nullable|string',
            'name_id' => 'nullable|string|max:255',
            'short_description_id' => 'nullable|string|max:255',
            'description_id' => 'nullable|string',
            'image_en.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:'.env('IMAGE_UPLOAD_SIZE'),
            'image_id.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:'.env('IMAGE_UPLOAD_SIZE'),
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            Helper::resJson('Validation failed', $validator->errors(), 422)
        );
    }
}
