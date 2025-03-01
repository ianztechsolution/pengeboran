<?php

namespace App\Http\Requests\AdmHotel;

use App\Models\Hotel;
use App\Helper\Helper;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class HotelUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        $user_id = Hotel::find($this->route('hotel'))->user_id;
        
        $rules = [
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:' . env('IMAGE_UPLOAD_SIZE'),
            'first_name' => 'required|string',
            'last_name' => 'nullable|string',
            'email' => 'required|string|email|unique:users,email,' . $user_id,
            'password' => 'nullable|string|min:8'
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
