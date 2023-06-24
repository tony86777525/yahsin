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
            'number' => 'required|min:17|max:17',
            'address' => 'required|min:10|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'address.required' => 'We need to know your address.',
        ];
    }
}
