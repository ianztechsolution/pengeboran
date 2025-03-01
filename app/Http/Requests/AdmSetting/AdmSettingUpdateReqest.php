<?php

namespace App\Http\Requests\AdmSetting;

use Illuminate\Foundation\Http\FormRequest;

class AdmSettingUpdateReqest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
   

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $maxFileSize = env('IMAGE_UPLOAD_SIZE');

        $rules = [
            'business_name' => 'nullable|string|max:255',
            'business_address' => 'nullable|string',
            'business_about' => 'nullable|string',
            'business_gmap_link' => 'nullable|string',
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
            'maintenance_mode' => 'nullable|in:active,inactive',

            'business_icon' => "nullable|image|mimes:jpeg,png,jpg,gif,webp|max:$maxFileSize",
            'business_logo' => "nullable|image|mimes:jpeg,png,jpg,gif,webp|max:$maxFileSize",
           
        ];
        return $rules;
    }
}
