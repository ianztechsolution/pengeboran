<?php

namespace App\Http\Requests\Banner;

use App\Helper\Helper;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class BannerStoreRequest extends FormRequest
{
   

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
          
            'photo_en.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:'.env('IMAGE_UPLOAD_SIZE'),
            'title_en' => 'required|string',
            'short_description_en' => 'nullable|string',
            'description_en' => 'nullable|string',

          
            'photo_id.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:'.env('IMAGE_UPLOAD_SIZE'),
            'title_id' => 'nullable|string',
            'short_description_id' => 'nullable|string',
            'description_id' => 'nullable|string',
            
            'position' => 'nullable|integer',
            'display' => 'required|in:show,hide'
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