<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = 'question';

    protected $fillable = [
        'evaluations_id',
        'quizz_id',
        'notes',
        'reponses',
    ];

    // Une question appartient à une évaluation
    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class, 'evaluations_id');
    }

    // Une question appartient à un quizz
    public function quizz()
    {
        return $this->belongsTo(Quizz::class, 'quizz_id');
    }
}
