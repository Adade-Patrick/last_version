<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Cycle;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $classes = Classe::all();
        $classes = Classe::with('cycle')->get();
        $cycles = Cycle::all();
        return view('classe.index', ['classes' => $classes, 'cycles' => $cycles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $cycles = Cycle::all();
        // return view('classe.create', compact('cycles'));
    }

    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request)
    {

        // Validation des données
        $validatedData = $request->validate([
            'libelle_Cl' => 'required|unique:classes,libelle_Cl',
            'cycle_id' => 'required|exists:cycle,id',
        ]);

        // Création de la classe
        try{
            Classe::create($validatedData);

            // Redirection avec message de succès
            return redirect()->route('classe.index')->with('success', 'Classe ajoutée avec succès');

        }catch(Exception $e){
            return redirect()->back()->withErrors([
                "Une erreur s'est produite a la creation de la classe"
            ]);
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
    public function edit(Classe $classe)
    {
        $cycle = Cycle::all();
        return view('classe.edit', compact('classes', 'cycles'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:classes,id',
            'libelle_Cl' => 'required|string|max:255',
            'cycle_id' => 'required|exists:cycle,id',
        ]);

        $classe = Classe::findOrFail($request->id);
        $classe->update([
            'libelle_Cl' => $request->libelle_Cl,
            'cycle_id' => $request->cycle_id,
        ]);

        return redirect()->route('classe.index')->with('success', 'Classe mise à jour avec succès');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $classe = Classe::findOrFail($id);
        $classe->delete();

        return redirect()->route('classe.index')->with('success', 'Classe supprimée avec succès.');
    }
}


