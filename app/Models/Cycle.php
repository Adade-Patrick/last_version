<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cycle extends Model
{
    use HasFactory;

    // Nom explicite de la table (optionnel ici car le nom suit la convention Laravel pour les modèles au singulier)
    protected $table = 'cycle';

    // Colonnes pouvant être assignées en masse
    protected $fillable = [
        'libelle_C',
    ];

    /**
     * Exemple de relation : un cycle peut avoir plusieurs classes (si une telle relation existe)
     */
    public function classes()
    {
        return $this->hasMany(Classe::class, 'cycle_id');
    }
}
