<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendEmailRequest extends FormRequest
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
            'clients' => 'required|string',
            'object' =>  "required|string",
            'description' => 'required|string'
        ];
    }



    public function messages()
    {
        return [
            'client.required' => 'Devi scegliere uno dei contatti',
            'object.required' => "Inserire l'oggetto dell'email",
            'message.required' => "Inserisci il messaggio dell'email",
        ];
    }
}
