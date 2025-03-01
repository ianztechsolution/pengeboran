<?php

namespace App\Http\Requests\Media;

use Illuminate\Foundation\Http\FormRequest;

class MediaStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type' => 'required|in:image,image_url,video,video_url',
            'thumbnail_en' => 'nullable|string|max:255',
            'image_en' => 'nullable|max:'.env('IMAGE_UPLOAD_SIZE'),
            'video_en' => 'nullable|max:'.env('VIDEO_UPLOAD_SIZE'),
            'caption_en' => 'nullable|string',
            'title_id' => 'nullable|string|max:255',
            'thumbnail_id' => 'nullable|string|max:255',
            'image_id' => 'nullable|string',
            'video_id' => 'nullable|string',
            'caption_id' => 'nullable|string',
            'visibility' => 'required|in:visible,invisible',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            Helper::resJson('Validation failed', $validator->errors(), 422)
        );
    }
}
