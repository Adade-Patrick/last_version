<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;

class RegisterUsersRequest extends FormRequest
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
            'name' =>'nullable|string|min:2|max:255',
            // 'email' =>'required|string|email|max:255|unique:users',
            'password' =>'required|string|min:8|confirmed',
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
            'name.min' => 'Le nom doit faire minimum 2 caractères.',
            'name.max' => 'Le nom ne doit pas dépasser 50 caractères.',
            // 'email.max' => 'L\'adresse email ne doit pas dépasser 255 caractères.',
            // 'email.unique' => 'Cette adresse email est déjà utilisée.',
            // 'email.required' => 'L\'adresse email est obligatoire.',
            // 'email.email' => 'L\'adresse email n\'est pas valide.',
            // 'email.unique' => 'Cette adresse email est déjà utilisée.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.min' => 'Le mot de passe doit faire minimum 6 caractères.',
            'password.confirmed' => 'Les mots de passe ne correspondent pas.',
        ];
    }
}
