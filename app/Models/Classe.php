<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    // Déclare le nom de la table si elle ne suit pas la convention Laravel (ici, c'est "classes")
    protected $table = 'classes';

    // Les attributs qui peuvent être massivement assignés
    protected $fillable = [
        'libelle_Cl',
    ];

    /**
     * Relation avec les élèves (un prof peut avoir plusieurs élèves)
     */
    public function eleves()
    {
        return $this->hasMany(Eleve::class, 'classe_id');
    }
}
