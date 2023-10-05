<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
            "name" => ["required", "string", "max:20"],
            "subject" => ["required", "max:45", "min:3"],
            "message" => 'required|min:3|max:5000'
        ];
    }

    public function messages(){
        return [
            "name.required" => "Naam is verplicht",
            "name.string" => "naam mag geen cijfers bevatten",
            "name.max" => "naam mag niet meer dan 20 karakters bevatten",
            "subject.required" => "Onderwerp is verplicht",
            "subject.max" => "Onderwerp mag niet meer dan 45 karakters bevatten",
            "subject.min" => "Onderwerp moet tenminste 3 karakters bevatten",
            "message.required" => "Bericht is verplicht",
            "message.min" => "Bericht moet tenminste 3 karakters bevatten",
            "message.max" => "Bericht mag niet meer dan 500 karakters bevatten"
        ];
       
    }
}
