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
            'amount' => 'required|numeric|min:1',
            'payment_type' => 'required',
            'recipient_name' => 'required',
            'recipient_address_nation' => 'required',
            'recipient_address_country' => 'required',
            'recipient_address_code' => 'required',
            'recipient_address' => 'required|string|between:10,255',
            'recipient_tel' => 'required',
            'recipient_email' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'amount.min' => "Please enter at least :min.",
            'payment_type.required' => "We need to know your Payment Method.",
            'recipient_name.required' => "We need to know your Recipient's Name.",
            'recipient_address_nation.required' => 'We need to know your Country.',
            'recipient_address_country.required' => 'We need to know your Region.',
            'recipient_address_code.required' => 'We need to know your Zip Code.',
            'recipient_address.required' => 'We need to know your Address.',
            'recipient_tel.required' => "We need to know your Recipient's Phone Number.",
            'recipient_email.required' => "We need to know your Recipient's Email.",
            'required' => 'We need to know your :attribute.',
            'recipient_address.between' => 'The Address must be between :min - :max words.',
        ];
    }
}
