<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $table = 'evaluations';

    protected $fillable = [
        'chapitre_id',
        'titre',
        'date_evaluation',
        'type',
        'duree',
    ];

    public function chapitre()
    {
        return $this->belongsTo(Chapitre::class, 'chapitre_id');
    }



}
