<?php

namespace App\Http\Requests\Activities;

use App\Helper\Helper;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ActivitiesStoreRequest extends FormRequest
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
            'price_type_en'         => 'required|string|in:person,group',
            'highlight_en'          => 'required|string',
            'short_description_en'  => 'required|string',
            'description_en'        => 'required|string',
            'location_en'           => 'required|string',
            'what_to_bring_en'      => 'required|string',
            'note_en'               => 'nullable|string',
            'pickup_time_en'        => 'required|string',
            'package_detail_confirmation_en' => 'required|string',
            'payment_cancelation_policy_en'  => 'required|string',
            'gmap_link'             => 'nullable|string',
            'start_time'            => 'nullable|string',
            'minimum_slot'       => 'required|string',
            'duration_hour'      => 'required|string',

            'title_id'              => 'nullable|string',
            'price_id'              => 'nullable|string',
            'price_type_id'         => 'nullable|string|in:person,group',
            'highlight_id'          => 'nullable|string',
            'short_description_id'  => 'nullable|string',
            'description_id'        => 'nullable|string',
            'location_id'           => 'nullable|string',
            'what_to_bring_id'      => 'nullable|string',
            'note_id'               => 'nullable|string',
            'pickup_time_id'        => 'nullable|string',
            'package_detail_confirmation_id' => 'nullable|string',
            'payment_cancelation_policy_id'  => 'nullable|string',
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