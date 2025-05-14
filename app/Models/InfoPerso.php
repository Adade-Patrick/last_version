<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoPerso extends Model
{
    use HasFactory;

    protected $table = 'info_perso';

    protected $fillable = [
        'nom',
        'prenom',
        'date_N',
        'lieu_N',
        'sexe',
        'nationalite',
        'ville_residence',
        'telephone',
        'email',
    ];

    
    public function admin()
    {
        return $this->hasOne(Admin::class, 'info_perso_id');
    }

    public function prof()
    {
        return $this->hasOne(Prof::class, 'prof_id');
    }

    public function eleves()
    {
        return $this->hasOne(Eleves::class, 'eleves_id');
    }

}
