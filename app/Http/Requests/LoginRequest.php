<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'name' => 'required|string|exists:users,name',
            'password' => 'required|string|min:6|max:20',
        ];
    }

    public function messages()
    {

        return [
            'name.required' => 'Le nom d\'utilisateur est requis.',
            'name.string' => 'Le nom d\'utilisateur doit être une chaîne de caractères.',
            'name.exists' => 'Ce nom d\'utilisateur n\'existe pas.',

            'password.required' => 'Le mot de passe est requis.',
            'password.string' => 'Le mot de passe doit être une chaîne de caractères.',
            'password.min' => 'Le mot de passe doit contenir au moins 6 caractères.',
            'password.max' => 'Le mot de passe ne doit pas dépasser 20 caractères.',
        ];
    }
}
