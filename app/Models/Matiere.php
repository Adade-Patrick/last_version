<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    use HasFactory;

    // Nom de la table (optionnel si différent du pluriel de la classe)
    protected $table = 'matiere';

    // Attributs assignables en masse
    protected $fillable = [
        'libelle_M',
        'cycle_id',
        'categorie_id',
        'classes_id',
        'prof_id',
    ];


    /**
     * Relation avec la classe.
     * Une matière appartient à une classe.
     */
    public function classe()
    {
        return $this->belongsTo(Classe::class, 'matiere_id');
    }

    /**
     * Relation avec le cycle.
     * Une matière appartient à un cycle.
     */
    public function cycle()
    {
        return $this->belongsTo(Cycle::class, 'matiere_id');
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'matiere_id');
    }


    // public function resultat()
    // {
    //     return $this->hasMany(Resultat::class, 'matiere_id');
    // }

    public function quizz()
    {
        return $this->hasMany(Quizz::class, 'matiere_id');
    }

    public function prof()
    {
        return $this->belongsTo(Prof::class, 'matiere_id');
    }

}
