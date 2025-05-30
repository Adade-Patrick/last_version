<?php
// app/Http/Controllers/EleveController.php

namespace App\Http\Controllers;

use App\Models\Eleve;
use App\Models\Cycle;
use App\Models\AnneeScolaire;
use App\Models\Classe;
use App\Models\User;
use Illuminate\Http\Request;

class EleveController extends Controller
{
    /** Display a listing of the resource. */
    public function index()
    {
        $eleves = Eleve::with(['cycle', 'anneeScolaire', 'classe', 'user'])->paginate(15);
        return view('traitements.eleve.index', compact('eleves'));
    }

    /** Show the form for creating a new resource. */
    public function create()
    {
        $cycle = Cycle::all();
        $annees = AnneeScolaire::all();
        $classes = Classe::all();
        $users = User::all();
        return view('traitements.eleve.create', compact('cycle', 'annees', 'classes', 'users'));
    }

    /** Store a newly created resource in storage. */
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'dateNaissance' => 'required|date',
        //     'telephone'      => 'required|string|max:20',
        //     'cycle_id'      => 'required|exists:cycle,id',
        //     'annee_scolaires_id' => 'required|exists:annee_scolaires,id',
        //     'classes_id'     => 'required|exists:classes,id',
        //     'users_id'       => 'required|exists:users,id',
        // ]);

        // Eleve::create($validated);

        return redirect()->route('traitements.eleve.index')->with('success', 'Élève créé avec succès.');
    }

    /** Display the specified resource. */
    public function show(Eleve $eleve)
    {
        return view('traitements.eleve.show', compact('eleve'));
    }

    /** Show the form for editing the specified resource. */
    public function edit(Eleve $eleve)
    {
        $cycle = Cycle::all();
        $annees = AnneeScolaire::all();
        $classes = Classe::all();
        $users = User::all();
        return view('traitements.eleve.edit', compact('eleve', 'cycle', 'annees', 'classes', 'users'));
    }

    /** Update the specified resource in storage. */
    public function update(Request $request, Eleve $eleve)
    {
        $validated = $request->validate([
            'dateNaissance' => 'required|date',
            'telephone'      => 'required|string|max:20',
            'cycle_id'      => 'required|exists:cycle,id',
            'annee_scolaires_id' => 'required|exists:annee_scolaires,id',
            'classes_id'     => 'required|exists:classes,id',
            'users_id'       => 'required|exists:users,id',
        ]);

        $eleve->update($validated);
        return redirect()->route('traitements.eleve.index')->with('success', 'Élève mis à jour avec succès.');
    }

    /** Remove the specified resource from storage. */
    public function destroy(Eleve $eleve)
    {
        $eleve->delete();
        return redirect()->route('traitements.eleve.index')->with('success', 'Élève supprimé avec succès.');
    }
}
