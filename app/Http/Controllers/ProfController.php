<?php

namespace App\Http\Controllers;

use App\Models\Prof;
use App\Models\Classe;
use App\Models\Cycle;
use App\Models\User;
use App\Models\AnneeScolaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profs = Prof::with(['user', 'classe', 'cycle', 'anneeScolaire'])->paginate(10);
        return view('actors.prof.index', compact('profs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = Classe::all();
        $cycles = Cycle::all();
        $annees = AnneeScolaire::all();
        return view('actors.prof.create', compact('classes', 'cycles', 'annees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:50',
            'prenom' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'dateNaissance' => 'required|date',
            'telephone' => 'required|string|max:10',
            'classe_id' => 'required|exists:classes,id',
            'cycle_id' => 'required|exists:cycles,id',
            'annee_scolaire_id' => 'required|exists:annee_scolaires,id',
        ]);

        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'prof',
        ]);

        Prof::create([
            'user_id' => $user->id,
            'dateNaissance' => $request->dateNaissance,
            'telephone' => $request->telephone,
            'classe_id' => $request->classe_id,
            'cycle_id' => $request->cycle_id,
            'annee_scolaire_id' => $request->annee_scolaire_id,
        ]);

        return redirect()->route('actors.prof.index')->with('success', 'Prof ajouté avec succès.');
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
        $classes = Classe::all();
        $cycles = Cycle::all();
        $annees = AnneeScolaire::all();
        return view('actors.prof.edit', compact('prof', 'classes', 'cycles', 'annees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nom' => 'required|string|max:50',
            'prenom' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email,' . $prof->user->id,
            'dateNaissance' => 'required|date',
            'telephone' => 'required|string|max:10',
            'classe_id' => 'required|exists:classes,id',
            'cycle_id' => 'required|exists:cycles,id',
            'annee_scolaire_id' => 'required|exists:annee_scolaires,id',
        ]);

        $prof->user->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
        ]);

        $prof->update([
            'dateNaissance' => $request->dateNaissance,
            'telephone' => $request->telephone,
            'classe_id' => $request->classe_id,
            'cycle_id' => $request->cycle_id,
            'annee_scolaire_id' => $request->annee_scolaire_id,
        ]);

        return redirect()->route('actors.prof.index')->with('success', 'Prof mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prof->user->delete();
        $prof->delete();
        return redirect()->route('actors.prof.index')->with('success', 'Prof supprimé avec succès.');
    }
}
