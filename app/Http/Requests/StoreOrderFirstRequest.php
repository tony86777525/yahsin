<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderFirstRequest extends FormRequest
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
            'name' => 'required|min:3|max:255',
            'email' => 'required|email',
            'country' => 'required',
//            'captcha' => 'required|captcha',
            'files' => 'required|array',
            'files.*' => 'file|max:512000|mimes:pdf,png,jpeg,jpg',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'We need to know your name.',
            'email.required' => 'We need to know your email.',
            'email.email' => 'Please enter a valid email address.',
            'country.required' => 'We need to know your country.',
//            'address.required' => 'We need to know your address.',
            'files.array' => 'Invalid files.',
            'files.*.file' => 'Invalid file.',
            'files.*.max' => 'The file size should not exceed :max KB.',
            'files.*.mimes' => 'The file must be a PDF.',
//            'captcha' => '驗證碼錯誤, 請重新輸入',
        ];
    }
}
