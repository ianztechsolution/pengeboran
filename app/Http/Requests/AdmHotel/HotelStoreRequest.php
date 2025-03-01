<?php

namespace App\Http\Requests\AdmHotel;

use App\Helper\Helper;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class HotelStoreRequest extends FormRequest
{
    public function rules(): array
    {
        $rules = [
            'business_icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:' . env('IMAGE_UPLOAD_SIZE'),
            'business_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:' . env('IMAGE_UPLOAD_SIZE'),
            'business_name' => 'required|string|max:255',
            'business_email' => 'nullable|email|max:255|unique:adm_hotel,business_email',
            'business_phone' => 'nullable|string|max:20',
            'business_address' => 'nullable|string|max:500',
            //account
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
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
