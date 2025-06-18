<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quizz extends Model
{
    use HasFactory;

    protected $table = 'quizz';

    protected $fillable = [
        'titre',
        'matiere_id',
        'prof_id',
        'classes_id',
        'date_publication',
    ];

    /**
     * Le quizz appartient à une matière.
     */
    public function matiere()
    {
        return $this->belongsTo(Matiere::class, 'matiere_id');
    }

    /**
     * Le quizz appartient à un professeur.
     */
    public function prof()
    {
        return $this->belongsTo(Prof::class, 'prof_id');
    }

    /**
     * Le quizz est destiné à une classe.
     */
    public function classes()
    {
        return $this->belongsTo(Classes::class, 'classes_id');
    }

    /**
     * Un quizz peut avoir plusieurs questions.
     */
    public function questions()
    {
        return $this->hasMany(Question::class, 'quizz_id');
    }



}
