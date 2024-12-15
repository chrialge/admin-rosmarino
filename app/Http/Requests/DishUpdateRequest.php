<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DishUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min: 3|max:100',
            'price' => 'required',
            'typology' => 'required',
            'allergies' => 'array|nullable',
            'description' => 'string|nullable',
            'image' => 'image|nullable'
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'Il nome e obbligatorio',
            'typology.required' => 'La tipologia e obbligatorio',
            'price.required' => 'Il prezzo e obbligatorio'
        ];
    }
}
