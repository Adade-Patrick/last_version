<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class superAdminRegisterInfoRequest extends FormRequest
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
            'nom'=> 'required|string|max:50',
            'prenom' => 'required|string|max:50',
            'date_N' => 'required|date|before:today',
            'lieu_N'=> 'required|string|max:50',
            'sexe'  => 'required|in:Homme,Femme',
            'email' => 'required|email|unique:users,email',
            'nationalite'=> 'required|string|max:50',
            'ville_residence'=> 'required|string|max:50',
            'telephone'=> ['required', 'regex:/^\d{2}\s\d{3}\s\d{2}\s\d{2}$/'],
            'name'=> 'required|string|unique:users,name|max:50',
            'password'=> 'required|string|min:6',
        ];

    }
    public function messages(): array{
        return [
                'nom.required'              => 'Le champ nom est obligatoire.',
                'prenom.required'           => 'Le champ prénom est obligatoire.',
                'date_N.required'           => 'La date de naissance est obligatoire.',
                'date_N.date'               => 'La date de naissance doit être une date valide.',
                'date_N.before'             => 'La date de naissance doit être antérieure à aujourd’hui.',
                'lieu_N.required'           => 'Le lieu de naissance est obligatoire.',
                'sexe.required'             => 'Le sexe est obligatoire.',
                'sexe.in'                   => 'Le sexe doit être Homme ou Femme.',
                'email.required'            => 'L’email est obligatoire.',
                'email.email'               => 'L’email doit être valide.',
                'email.unique'              => 'Cet email est déjà utilisé.',
                'nationalite.required'      => 'La nationalité est obligatoire.',
                'ville_residence.required' => 'La ville de résidence est obligatoire.',
                'telephone.required'        => 'Le numéro de téléphone est obligatoire.',
                'telephone.regex'           => 'Le numéro doit être au format : 06 671 73 35.',

                'name.required'             => 'Le nom d’utilisateur est obligatoire.',
                'name.unique'               => 'Ce nom d’utilisateur est déjà utilisé.',
                'password.required'         => 'Le mot de passe est obligatoire.',
                'password.min'              => 'Le mot de passe doit contenir au moins 6 caractères.',
            ];

        }
}
