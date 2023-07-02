<?php

namespace App\Http\Requests\OrderPay;

use Illuminate\Foundation\Http\FormRequest;

class StoreECPayRequest extends FormRequest
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
        ];
    }

    public function messages(): array
    {
        return [
            'number' => 'We need to know your order number.',
        ];
    }
}
