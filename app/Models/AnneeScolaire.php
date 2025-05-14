<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnneeScolaire extends Model
{
    use HasFactory;

    // Déclare le nom de la table si elle ne suit pas la convention Laravel (ici, c'est 'annee_scolaires')
    protected $table = 'annee_scolaires';

    // Les attributs qui peuvent être massivement assignés
    protected $fillable = [
        'libelle_A',
    ];

    /**
     * Exemple de relation : Si tu veux lier une année scolaire à des classes (relation "hasMany")
     * (à condition d'ajouter une clé étrangère dans la table 'classes' pour 'annee_scolaire_id')
     */
    public function classes()
    {
        return $this->hasMany(Classe::class, 'annee_scolaire_id');
    }

    public function eleves()
    {
        return $this->hasMany(Eleves::class, 'eleves_id');
    }
}
