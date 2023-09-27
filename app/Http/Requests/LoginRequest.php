<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    public function messages(){
        return [
            "email.required" => "Email is verplicht",
            "email.string" => "Email mag geen cijfers bevatten",
            "email.email" => "Voer een geldige email in",

            "password.required" => "Wachtwoord is verplicht",
            
        ];
    }
}
