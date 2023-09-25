<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            "first_name" => ["required", "string", "max:20"],
            "preposition" => ["nullable", "string", "max:4"],
            "last_name" => ["required", "string", "max:20"],
            "email" => ["sometimes", 'unique:users,email,'.Auth::user()->id, "max:100", "email"],
            "password" => ["required", "min:8", "confirmed"],
            "password_confirmation" => "required_with:password|same:password"
         
        ];
    }

    public function messages(){
        return [
            "first_name.required" => "Voornaam is verplicht",
            "first_name.string" => "Voornaam mag geen cijfers of speciale tekens bevatten",
            "first_name.max" => "Voornaam mag niet meer dan 20 karakters bevatten",
            "preposition.string" => "Tussenvoegsel mag geen cijfers of speciale tekens bevatten",
            "preposition.max" => "Tussenvoegsel mag niet meer dan 4 karakters bevatten",
            "last_name.required" => "Achternaam is verplicht",
            "last_name.string" =>  "Achternaam mag geen cijfers of speciale tekens bevatten",
            "last_name.max" => "Achternaam mag niet meer dan 20 karakters bevatten",
            "email.required" => "Email is verplicht",
            "email.max" => "Email mag niet meer dan 100 karakters bevatten",
            "email.unique" => "email is al in gebruik",
            "password.required" => "Wachtwoord is verplicht",
            "password.min" => "Wachtwoord moet meer dan 8 karakters bevatten",
            "password.confirmed" => "",
            "password_confirmation.required_with" => "Herhaal nieuwe wachtwoord",
            "password_confirmation.same:password" =>  "het herhaalde wachtoord komt niet overeen met nieuwe wachtwoord"
        ];
    }
}
