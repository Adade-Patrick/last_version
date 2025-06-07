<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    use HasFactory;

    // Table associée (optionnel si le nom est "cours")
    protected $table = 'cours';

    // Champs autorisés pour le remplissage en masse
    protected $fillable = [
        'titre',
        'matiere_id',
        'prof_id',
        'description',
    ];

    public function matiere()
    {
        return $this->belongsTo(Matiere::class, 'matiere_id');
    }

    public function prof()
    {
        return $this->belongsTo(Prof::class, 'prof_id');
    }

    public function chapitres()
    {
        return $this->hasMany(Chapitre::class, 'cours_id');
    }
}
