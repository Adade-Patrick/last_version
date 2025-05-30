<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultat extends Model
{
    use HasFactory;

    protected $table = 'resultat';

    protected $fillable = [
        'eleves_id',
        'matiere_id',
        'evaluations_id',
    ];

    /**
     * Un résultat appartient à un élève.
     */
    public function eleve()
    {
        return $this->belongsTo(Eleve::class, 'eleves_id');
    }

    /**
     * Un résultat est lié à une matière.
     */
    public function matiere()
    {
        return $this->belongsTo(Matiere::class, 'matiere_id');
    }

    /**
     * Un résultat est issu d’une évaluation.
     */
    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class, 'evaluations_id');
    }
}
