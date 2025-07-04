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

    public function matieres()
    {
        return $this->hasMany(Matiere::class, 'cycle_id');
    }

    public function to_json(){

        return [
            'id' => $this->id,
            'libelle_C' => $this->libelle_C,
            'classes' => Classe::toArrayJson($this->classes),
        ];  
    }

    public static function toArrayJson($data){
        $json = [];
        foreach($data as $cycle){
            $json[] = $cycle->to_json();
        }

        return $json;
    }

}

