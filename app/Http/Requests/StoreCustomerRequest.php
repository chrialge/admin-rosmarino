<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class StoreCustomerRequest extends FormRequest
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
            'name' => 'required|min: 3|max: 100',
            'last_name' => 'required|min: 3| max: 100',
            'birth_day' => 'required|date',
            'email' => 'required|email',
            'telephone' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Il nome e obbligatorio',
            'last_name.required' => 'Il cognome e obbligatorio',
            'email.required' => "L'email e obbligatorio",
            'telephone.numeric' => "Il numero di telefono deve esssere di sole cifre",
            'telephone.required' => "Il numero di telefono e obbligatorio",
            'birth_day.date' => 'La data di nascita e obbligatorio',
        ];
    }

    protected function failedValidation(Validator $validator)
    {

        if ($this->ajax()) {

            throw new HttpResponseException(response()->json($validator->errors(), 419));
        } else {
            throw (new ValidationException($validator))
                ->errorBag($this->errorBag)
                ->redirectTo($this->getRedirectUrl());
        }
    }
}
