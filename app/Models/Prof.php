<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prof extends Model
{
    use HasFactory;

    // Laravel attendrait une table "profs", donc on précise ici le nom réel
    protected $table = 'prof';

    protected $fillable = [
        'users_id',
        'info_perso_id',
        'specialite',
    ];

    /**
     * Relation vers l'utilisateur associé
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    /**
     * Relation vers les informations personnelles
     */
    public function infoPerso()
    {
        return $this->belongsTo(InfoPerso::class, 'info_perso_id');
    }
}
