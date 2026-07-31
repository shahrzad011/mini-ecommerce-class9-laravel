<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CheckoutPostRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_province' => [
                'required',
                'string',
                'persian_alpha',
                'min:2',
                'max:100'
            ],

            'user_city' => [
                'required',
                'string',
                'min:2',
                'max:100'
            ],

            'user_address' => [
                'required',
                'string',
                'max:500'
            ],

            'user_postal_code' => [
                'required',
                'digits:10'
            ],

            'user_mobile' => [
                'required',
                'ir_mobile:zero',
                'digits:11'
            ],

            'description' => [
                'nullable',
                'persian_alpha',
                'string',
                'max:500'
            ],
        ];
    }
}
