<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['libelle_cat' => 'Lecture et écriture'],
            ['libelle_cat' => 'Calcul'],
            ['libelle_cat' => 'Sciences'],
            ['libelle_cat' => 'Éveil et découverte'],
            ['libelle_cat' => 'Langues'],
            ['libelle_cat' => 'Compétences numériques'],
            ['libelle_cat' => 'Éducation artistique'],
            ['libelle_cat' => 'Éducation physique'],
            ['libelle_cat' => 'Culture générale'],
            ['libelle_cat' => 'Développement personnel'],
            ['libelle_cat' => 'Technologie et innovation'],
            ['libelle_cat' => 'Éducation civique et morale'],
            ['libelle_cat' => 'Compétences sociales'],
            ['libelle_cat' => 'Logique et raisonnement'],
            ['libelle_cat' => 'Expression orale'],
            ['libelle_cat' => 'Créativité'],
            ['libelle_cat' => 'Environnement et écologie'],
            ['libelle_cat' => 'Initiation à la recherche'],
            ['libelle_cat' => 'Pensée critique'],
            ['libelle_cat' => 'Économie et finances de base'],
            ['libelle_cat' => 'Orientation professionnelle'],
            ['libelle_cat' => 'Santé et bien-être'],
            ['libelle_cat' => 'Sécurité et prévention'],
        ];


        DB::table('categories')->insert($categories);
    }
}
