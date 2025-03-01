<?php

namespace App\Http\Requests;

use App\Helper\Helper;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class AdmSettingStoreRequest extends FormRequest
{
    public function rules(): array
    {

        $rules = [
            'business_name' => 'nullable|string|max:255',
            'business_address' => 'nullable|string',
            'business_about' => 'nullable|string',
            'business_gmap_link' => 'nullable|url',
            'business_phone' => 'nullable|string|max:20',

            'midtrans_sandbox_key' => 'nullable|string',
            'midtrans_production_key' => 'nullable|string',
            'midtrans_merchant_id' => 'nullable|string',
            'midtrans_mode' => 'nullable|in:sandbox,production',

            'smtp_host' => 'nullable|string',
            'smtp_port' => 'nullable|integer',
            'smtp_username' => 'nullable|string',
            'smtp_password' => 'nullable|string',
            'smtp_encryption' => 'nullable|in:tls,ssl',
            'smtp_from_name' => 'nullable|string',

            'zendesk_key' => 'nullable|string',
            'maintenance_mode' => 'required|in:active,inactive',

            'business_icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'business_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
