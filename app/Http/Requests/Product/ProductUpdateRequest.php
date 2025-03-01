<?php

namespace App\Http\Requests\Product;

use App\Helper\Helper;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'code' => [
                'required',
                function ($attribute, $value, $fail) {
                    $exists = \DB::table('products')
                        ->where('code', $value)
                        ->where('hotel_id', auth()->user()->hotel_id)
                        ->where('id', '!=', $this->route('product')->id)
                        ->exists();

                    if ($exists) {
                        $fail("The $attribute has already been taken.");
                    }
                },
            ],
            'name_en' => 'required|string|max:255',
            'short_description_en' => 'nullable|string|max:255',
            'description_en' => 'nullable|string',
            'name_id' => 'nullable|string|max:255',
            'short_description_id' => 'nullable|string|max:255',
            'description_id' => 'nullable|string',
            'availability' => 'required|in:available,inavailable',
            'image_en.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_id.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            Helper::resJson('Validation failed', $validator->errors(), 422)
        );
    }
}
