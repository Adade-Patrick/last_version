<?php

namespace App\Http\Controllers\api\resources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AnneeScolaire;
class AnneeScolaireController extends Controller
{
    public function index()
    {   
        try {
        $anneeScolaire = AnneeScolaire::all();

        return response()->json([
            'message' => 'Liste des années scolaires',
            'data'=>$anneeScolaire,
        ],200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'data'=>null,
            ],500);
        }
    }
}
