<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderSecondRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'amount' => 'required|min:1',
            'payment_type' => 'required',
            'recipient_name' => 'required',
            'recipient_address_nation' => 'required',
            'recipient_address_country' => 'required',
            'recipient_address_code' => 'required',
            'recipient_address' => 'required|min:10|max:255',
            'recipient_tel' => 'required',
            'recipient_email' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'We need to know your :attribute.',
            'between' => 'The :attribute must be between :min - :max.',
        ];
    }
}
