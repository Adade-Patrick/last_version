<?php

namespace App\Http\Controllers\api\resources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  \App\Models\Cycle;
class CycleController extends Controller
{
    //

    public function index()
    {   
        try {
        $cycles = Cycle::all();

        return response()->json([
            'message' => 'Liste des cycles',
            'data'=>Cycle::toArrayJson($cycles),
        ],200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'data'=>null,
            ],500);
        }
    }
}
