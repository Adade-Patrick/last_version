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
            // users
            // 'name' => 'required|string|unique:users,name',
            // 'email' => 'nullable|email|unique:users,email',
            // 'password' => 'required|string|min:8|confirmed',
            // // 'current_team_id' => 'nullable|exists:teams,id',
            // // 'profile_photo_path' => 'nullable|string|max:2048',

            // // info_perso
            // 'nom' => 'required|string|max:255',
            // 'prenom' => 'required|string|max:255',
            // 'date_N' => 'required|date',
            // 'lieu_N' => 'required|string|max:255',
            // 'sexe' => 'required|in:Masculin,Feminin',
            // 'nationalite' => 'required|string|max:255',
            // 'ville_residence' => 'required|string|max:255',
            // 'telephone' => 'required|string|max:20',
            // // classes
            // 'classe_id' => 'required|int|exists:classes,id',
        ];
    }

    function messages(){
        return [
             // users
            'name.required' => 'Le nom est obligatoire.',
            'name.unique' => 'Ce nom est déjà utilisé.',
            'email.email' => 'Le format de l\'adresse e-mail est invalide.',
            'email.unique' => 'Cette adresse e-mail est déjà utilisée.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
            'password.confirmed' => 'Les mots de passe ne correspondent pas.',
            // 'current_team_id.exists' => 'L\'équipe sélectionnée est invalide.',
            // 'profile_photo_path.max' => 'Le chemin de la photo ne peut pas dépasser 2048 caractères.',

            // info_perso
            'nom.required' => 'Le nom est obligatoire.',
            'prenom.required' => 'Le prénom est obligatoire.',
            'date_N.required' => 'La date de naissance est obligatoire.',
            'date_N.date' => 'La date de naissance doit être une date valide.',
            'lieu_N.required' => 'Le lieu de naissance est obligatoire.',
            'sexe.required' => 'Le sexe est obligatoire.',
            'sexe.in' => 'Le sexe doit être masculin ou féminin.',
            'nationalite.required' => 'La nationalité est obligatoire.',
            'ville_residence.required' => 'La ville de résidence est obligatoire.',
            'telephone.required' => 'Le numéro de téléphone est obligatoire.',

            // classes
            'classe_id.required' => 'L\'identifiant est incorrect.',
            'classe_id.exists' => 'La classe n\'existe pas.',

            // cycle
            'cycle_id.required' => 'L\'identifiant est incorrect.',
            'cycle_id.exists' => 'Le cycle n\'existe pas.',
        ];
    }
}