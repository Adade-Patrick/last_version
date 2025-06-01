<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use App\Models\Cycle;
use App\Models\Categorie;
use App\Models\Classe;
use App\Models\Prof;
use Illuminate\Http\Request;

class CreerMatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matieres = Matiere::all();
        // $cycles = Cycle::all();
        $categories = Categorie::all();
        $classes = Classe::all();
        $profs = Prof::all();
        return view('creer_matiere.index', compact('matieres', 'categories', 'classes', 'profs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all()); 
        try {
            $validatedData = $request->validate([
            'libelle_M' => 'required|string|max:50',
            // 'cycle_id' => 'required|exists:cycle,id',
            'categories_id' => 'required|exists:categories,id',
            'classes_id' => 'required|exists:classes,id',
            'prof_id' => 'required|exists:prof,id',
            ]);

            Matiere::create($validatedData);

            return redirect()->route('creer_matiere.index')->with('success', 'Cours ajouté avec succès.');
        } catch (\Exception $e) {
            return back()->with('error', 'Erreur lors de l’ajout du cours : ' . $e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
