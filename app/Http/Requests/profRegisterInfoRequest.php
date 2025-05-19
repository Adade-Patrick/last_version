<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class profRegisterInfoRequest extends FormRequest
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
            'nom' => ['required', 'string', 'max:50'],
            'prenom' => ['required', 'string', 'max:50'],
            'date_N' => ['required', 'date'],
            'lieu_N' => ['required', 'string', 'max:50'],
            'sexe' => ['required', 'in:Homme,Femme'],
            'email' => ['required', 'email', 'unique:users,email'],
            'nationalite' => ['required', 'string', 'max:50'],
            'ville_residence' => ['required', 'string', 'max:50'],
            'telephone' => ['required', 'regex:/^\d{2}\s\d{3}\s\d{2}\s\d{2}$/'],
            'name' => ['required', 'string', 'max:255', 'unique:users,name'],
            'password' => ['required', 'string', 'min:8'],
            'specialite' => ['required', 'string', 'max:50'],
        ];

    }

    public function messages(): array{
        return [
            'nom.required' => 'Le nom est obligatoire.',
            'nom.string' => 'Le nom doit être une chaîne de caractères.',
            'nom.max' => 'Le nom ne doit pas dépasser 50 caractères.',

            'prenom.required' => 'Le prénom est obligatoire.',
            'prenom.string' => 'Le prénom doit être une chaîne de caractères.',
            'prenom.max' => 'Le prénom ne doit pas dépasser 50 caractères.',

            'date_N.required' => 'La date de naissance est obligatoire.',
            'date_N.date' => 'La date de naissance doit être une date valide.',

            'lieu_N.required' => 'Le lieu de naissance est obligatoire.',
            'lieu_N.string' => 'Le lieu de naissance doit être une chaîne de caractères.',
            'lieu_N.max' => 'Le lieu de naissance ne doit pas dépasser 50 caractères.',

            'sexe.required' => 'Le sexe est obligatoire.',
            'sexe.in' => 'Le sexe doit être soit Homme soit Femme.',

            'email.required' => 'L\'adresse email est obligatoire.',
            'email.email' => 'L\'adresse email doit être valide.',
            'email.unique' => 'Cette adresse email est déjà utilisée.',

            'nationalite.required' => 'La nationalité est obligatoire.',
            'nationalite.string' => 'La nationalité doit être une chaîne de caractères.',
            'nationalite.max' => 'La nationalité ne doit pas dépasser 50 caractères.',

            'ville_residence.required' => 'La ville de résidence est obligatoire.',
            'ville_residence.string' => 'La ville doit être une chaîne de caractères.',
            'ville_residence.max' => 'La ville ne doit pas dépasser 50 caractères.',

            'telephone.required' => 'Le numéro de téléphone est obligatoire.',
            'telephone.regex' => 'Le format du numéro est invalide. Exemple : 06 123 45 67',

            'name.required' => 'Le nom d\'utilisateur est obligatoire.',
            'name.string' => 'Le nom d\'utilisateur doit être une chaîne de caractères.',
            'name.max' => 'Le nom d\'utilisateur ne doit pas dépasser 50 caractères.',
            'name.unique' => 'Ce nom d\'utilisateur est déjà pris.',

            'password.required' => 'Le mot de passe est obligatoire.',
            'password.string' => 'Le mot de passe doit être une chaîne de caractères.',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',

            'specialite.required' => 'La spécialité est obligatoire.',
            'specialite.string' => 'La spécialité doit être une chaîne de caractères.',
            'specialite.max' => 'La spécialité ne doit pas dépasser 50 caractères.',
        ];
    }
}
