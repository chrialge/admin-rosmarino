<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class StoreReservationRequest extends FormRequest
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
            'customer_name' => 'required|max:100',
            'customer_last_name' => 'required|max:100',
            'customer_email' => 'required|email',
            'customer_telephone' => 'required|numeric',
            'person' => 'required|numeric',
            'date' => 'required',
            'hour_reservation' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'customer_name.required' => 'Il nome e obbligatorio',
            'customer_last_name.required' => 'Il cognome e obbligatorio',
            'customer_email.required' => "L'email e obbligatorio",
            'customer_telephone.required' => "Il numero di telefono e obbligatorio",
            'person.required' => 'Il numero di persone e obbligatorio',
            'date.required' => 'La data e obbligatoria',
            'hour_reservation.required' => "l'ora e obbligatorio",
        ];
    }
}
