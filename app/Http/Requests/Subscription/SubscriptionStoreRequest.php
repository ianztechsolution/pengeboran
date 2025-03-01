<?php

namespace App\Http\Requests\Subscription;

use App\Helper\Helper;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class SubscriptionStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
   
     public function rules(): array
     {
         return [
             'hotel_id' => ['required', 'exists:adm_hotel,id'],
             
             'title_en' => ['required', 'string', 'max:255'],
             'price_en' => ['required', 'numeric', 'min:0', 'max:9999999999999.99'],
             'note_en' => ['nullable', 'string'],
 
             'title_id' => ['nullable', 'string', 'max:255'],
             'price_id' => ['nullable', 'numeric', 'min:0', 'max:9999999999999'],
             'note_id' => ['nullable', 'string'],
 
             'duration_day' => ['required', 'integer', 'min:1'],
             'start_date' => ['required', 'date'],
             'status' => ['required', 'in:pending,active,inactive'],
         ];
     }
    protected function failedValidation(Validator $validator)
     {
         throw new HttpResponseException(
             Helper::resJson('Validation failed', $validator->errors(), 422)
         );
     }
   
}
