<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_evaluation',
        'chapitre_id',
    ];

    public function chapitre()
    {
        return $this->belongsTo(Chapitre::class);
    }

    public function resultat()
    {
        return $this->hasMany(Resultat::class, 'evaluations_id');
    }

    public function questions()
    {
        return $this->hasMany(Question::class, 'evaluations_id');
    }


}
