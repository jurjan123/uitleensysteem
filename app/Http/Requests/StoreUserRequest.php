<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
   
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "first_name" => ["required", "string", "max:20"],
            "last_name" => ["required", "string", "max:20"],
            "email" => ["required", "unique:users,email", "max:100", "email"],
            "password" => ["required", "confirmed"],
            "password_confirmation" => 'required|required_with:password|same:password' 
        ];
    }

    public function messages(){
        return [
            "first_name.required" => "Voornaam is verplicht",
            "first_name.string" => "Voornaam moeten letters zijn",
            "first_name.max" => "Voornaam mag niet langer dan 20 karakters zijn",
            "last_name.required" => "Achternaam is verplicht",
            "last_name.string" => "Achternaam moeten letters zijn",
            "last_name.max" => "Achternaam mag niet langer dan 20 karakters zijn",
            "email.required" => "Email is verplicht",
            "email.string" => "Email moeten letters zijn",
            "email.unique" => "Email is al in gebruik",
            "email.max" => "Email mag niet langer dan 100 karakters zijn",
            "password.required" => "Vul nieuwe wachtwoord in",
            "password_confirmation.required" => "Herhaal nieuwe wachtwoord",
           
            "password.confirmed" => "het herhaalde wachtoord komt niet overeen met het nieuwe wachtwoord",
        ];
    }
}
