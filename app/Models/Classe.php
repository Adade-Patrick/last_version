<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;


    protected $table = 'classes';

    protected $fillable = [
        'libelle_Cl',
        'cycle_id',
    ];

      public function eleves()
    {
        return $this->hasMany(Eleve::class, 'classes_id');
    }

      public function prof()
    {
        return $this->hasMany(Prof::class, 'classes_id');
    }
      public function cycle()
    {
        return $this->belongsTo(Cycle::class, 'cycle_id');
    }

      public function matiere()
    {
        return $this->hasMany(Matiere::class, 'classes_id');
    }

    public function quizz()
    {
        return $this->hasMany(Quizz::class, 'classes_id');
    }

}
