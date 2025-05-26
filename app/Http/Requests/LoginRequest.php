<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'password' => 'required',
        ];
    }

    function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json(
            [
               'message' => 'The given data was invalid.',
                'errors' => $validator->errors()
            ],
            422  // Unprocessable Entity (HTTP status code 422)
        ));
    }

    function messages(){
        return [
            'name.required' => 'Le nom d\'utilisateur est obligatoire.',
            'name.name' => 'Le nom d\'utilisateur n\'est pas valide.',
            'password.required' => 'Le mot de passe est obligatoire.',
        ];
    }
}
