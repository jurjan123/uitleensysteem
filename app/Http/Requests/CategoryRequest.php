<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'title' => 'required|min:3|max:100',
            'description' => 'required|min:3|max:5000',
            "image" => "nullable|mimes:jpeg,png,jpg,gif,svg,webp|max:3048",
        ];
    }

    public function messages(){
        return [
        
        "title.required" => "Titel is verplicht",
        "title.min" => "Titel moet minimaal 3 karakters bevatten",
        "title.max" => "Titel mag niet meer dan 100 karakters bevatten",

        "description.required" => "Beschrijving is verplicht",
        "description.min" => "Beschrijving moet minimaal 3 karakters bevatten",
        "description.max" => "Beschrijving mag niet meer dan 100 karakters bevatten",

        "image.mimes" => "De afbeelding moet een jpeg,png,jpg,gif,svg zijn",
        "image.max" => "De afbeelding mag niet groter zijn dan 3mb",
        ];
    }
}
