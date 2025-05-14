<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    // Si ta table s'appelle vraiment 'admin' (au singulier), spécifie-la :
    protected $table = 'admin';

    protected $fillable = [
        'users_id',
        'info_perso_id',
    ];

    /**
     * Relation vers le modèle User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    /**
     * Relation vers le modèle InfoPerso
     */
    public function infoPerso()
    {
        return $this->belongsTo(InfoPerso::class, 'info_perso_id');
    }
}
