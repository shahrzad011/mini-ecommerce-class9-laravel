<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class EditProfilePostRequest extends FormRequest
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
            'first_name' => [
                'required',
                'persian_alpha',
                'min:2',
                'max:150'
            ],
            'last_name' => [
                'required',
                'persian_alpha',
                'min:2',
                'max:150'
            ],
            'email' => [
                'nullable',
                'email',
                'unique:users,email,' . auth()->id()
            ],

            'mobile' => [
                'required',
                'string',
                'ir_mobile:zero',
                'unique:App\Models\User,mobile,' . auth()->id()

            ],

            'password' => [
                'nullable',
                'min:8',
                'confirmed'
            ],

        ];
    }
}
