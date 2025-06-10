<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Eleve extends Model
{
    use HasFactory;

    protected $table = 'eleves';

    protected $fillable = [
        'users_id',
        'info_perso_id',
        'classes_id',
        'matricule',
        'cycle_id',
        'annee_scolaires_id'
    ];

    public function createMatricule($nom)
     {
         if ($this->matricule) {

            return;
        }
        $year = date('Y');
        $nbre = DB::table('eleves')->whereYear('created_at', $year)->count()+1;
        $lettre =  strtoupper(substr($nom, 0, 1));
        $matricule = "MAT". $year .$lettre . str_pad($nbre, 4, '0', STR_PAD_LEFT) ;
        $this->matricule = $matricule ;

     }

     public function to_json()
{
    return [
        'id' => $this->id,
        'matricule' => $this->matricule,
        'user_name' => $this->users ? $this->users->name : null,
        'classe' => $this->classes ? $this->classes->libelle_Cl : null,
        'cycle' => $this->cycle ? $this->cycle->libelle_C : null,
        'annee_scolaire' => $this->annee_scolaires_ ? $this->annee_scolaires_->libelle_A : null,
        'created_at' => $this->created_at ? $this->created_at->toDateTimeString() : null,
        'updated_at' => $this->updated_at ? $this->updated_at->toDateTimeString() : null,
    ];
}

    /**
     * Relations
     */

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function infoPerso()
    {
        return $this->belongsTo(InfoPerso::class, 'info_perso_id');
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class, 'classes_id');
    }

    public function cycle()
    {
        return $this->belongsTo(Cycle::class, 'cycle_id');
    }

    public function annee_scolaires_()
    {
        return $this->belongsTo(Annee_scolaire::class, 'annee_scolaires_id');
    }

    public function resultats()
    {
        return $this->hasMany(Resultat::class, 'eleves_id');
    }

}
