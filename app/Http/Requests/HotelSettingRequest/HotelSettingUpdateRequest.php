<?php

namespace App\Http\Requests\HotelSettingRequest;

use App\Helper\Helper;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class HotelSettingUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        $maxFileSize = env('IMAGE_UPLOAD_SIZE');

        $rules = [
            'business_icon' => "nullable|image|mimes:jpeg,png,jpg,gif,webp|max:$maxFileSize",
            'business_logo' => "nullable|image|mimes:jpeg,png,jpg,gif,webp|max:$maxFileSize",
            'business_name' => 'nullable|string|unique:settings,business_name',
            'business_username' => 'nullable|string|unique:settings,business_username',
            'business_address' => 'nullable|string',
            'business_about' => 'nullable|string',
            'business_gmap_link' => 'nullable|string',
            'business_phone' => 'nullable|string',
            'business_email' => 'nullable|string|email',
            'business_color' => 'nullable|string',
            'business_font' => 'nullable|string',
            'zendesk_key' => 'nullable|string',
            'whatsapp_support' => 'nullable|string',
            'smtp_host' => 'nullable|string',
            'smtp_port' => 'nullable|integer',
            'smtp_username' => 'nullable|string',
            'smtp_password' => 'nullable|string',
            'smtp_encryption' => 'nullable|in:tls,ssl',
            'smtp_from_name' => 'nullable|string',
            'notification_email_status' => 'nullable|in:active,inactive',
            'module_activity_status' => 'nullable|in:active,inactive',
            'module_food_beverage_status' => 'nullable|in:active,inactive',
            'module_souvenir_status' => 'nullable|in:active,inactive',
            'module_amanities_status' => 'nullable|in:active,inactive',
            'module_facility_status' => 'nullable|in:active,inactive',
            'module_event_status' => 'nullable|in:active,inactive',
            'module_destination_status' => 'nullable|in:active,inactive',
            'module_information_status' => 'nullable|in:active,inactive',
            'module_banner_status' => 'nullable|in:active,inactive',
            'module_promo_status' => 'nullable|in:active,inactive',
            'module_media_status' => 'nullable|in:active,inactive',
            'module_zendesk_live_status' => 'nullable|in:active,inactive',
            'module_whatsapp_live_status' => 'nullable|in:active,inactive',
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
