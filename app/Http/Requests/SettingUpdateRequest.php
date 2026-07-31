<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SettingUpdateRequest extends FormRequest
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
            'settings' => [
                'required',
                'array'
            ],

            'settings.footer_about' => [
                'nullable',
                'string'
            ],

            'settings.footer_title' => [
                'nullable',
                'string',
                'max:255'
            ],

            'settings.footer_phone' => [
                'nullable',
                'string',
                'max:50'
            ],

            'settings.footer_email' => [
                'nullable',
                'email',
                'max:255'
            ],

            'settings.footer_address' => [
                'nullable',
                'string'
            ],

            'settings.footer_instagram' => [
                'nullable',
                'url',
                'max:255'
            ],

            'settings.footer_linkedin' => [
                'nullable',
                'url',
                'max:255'
            ],

        ];
    }

    public function attributes(): array
    {
        return [

            'settings.footer_about' => 'متن درباره فروشگاه',

            'settings.footer_title' => 'عنوان فروشگاه',

            'settings.footer_phone' => 'شماره تماس',

            'settings.footer_email' => 'ایمیل',

            'settings.footer_address' => 'آدرس',

            'settings.footer_instagram' => 'لینک اینستاگرام',

            'settings.footer_linkedin' => 'لینک لینکدین',

        ];
    }
}
