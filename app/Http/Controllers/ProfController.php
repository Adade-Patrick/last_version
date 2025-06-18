<?php

namespace App\Http\Controllers;

use App\Models\Prof;
use App\Models\Classe;
use App\Models\Cycle;
use App\Models\User;
use App\Models\Cours;
use App\Models\InfoPerso;
use App\Models\AnneeScolaire;
use App\Models\Matiere;
use Illuminate\Http\Request;
use App\Http\Requests\profRegisterInfoRequest;
use Illuminate\Support\Facades\Hash;


class ProfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profs = Prof::with(['user', 'cycle','classes', 'anneeScolaire'])->paginate(10);
        return view('traitements.prof.index', compact('profs'));
    }


    public function dasboard()
    {
        $recentCours = Cours::with('prof')->latest()->take(5)->get();
        compact('recentCours');
        return view('int_prof.dashboard');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $classes = Classe::all();
        $cycle = Cycle::all();
        $annees = AnneeScolaire::all();
        return view('actors.prof.create', compact('classes', 'cycle', 'annees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(profRegisterInfoRequest $request)
    // {

    //     // dd($request->all());
    //     $validatedData = $request->validated();
    //     try{
    //         // Enregistrement dans info_perso
    //         $infoPerso = InfoPerso::create([
    //             'nom' => $validatedData['nom'],
    //             'prenom' => $validatedData['prenom'],
    //             'date_N' => $validatedData['date_N'],
    //             'lieu_N' => $validatedData['lieu_N'],
    //             'sexe' => $validatedData['sexe'],
    //             'nationalite' => $validatedData['nationalite'],
    //             'ville_residence' => $validatedData['ville_residence'],
    //             'telephone' => $validatedData['telephone'],
    //         ]);

    //     $user = User::create([
    //         'name' => $validatedData['name'],
    //         'email' => $validatedData['email'],
    //         'password' => bcrypt($validatedData['password']),
    //         'role' => 'prof',
    //     ]);

    //     Prof::create([
    //         'users_id' => $user->id,
    //         'info_perso_id' => $infoPerso->id,
    //         'specialite' => "physique",
    //     ]);

    //     return redirect()->route('traitements.prof.index')->with('success', 'Prof ajouté avec succès.');
    //     }catch(\Exception $e){
    //         // dd($e);
    //     }
    // }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('traitements.prof.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $classes = Classe::all();
        $cycle = Cycle::all();
        $annees = AnneeScolaire::all();
        return view('actors.prof.edit', compact('prof', 'classes', 'cycle', 'annees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // 1. Validation des données
        $validated = $request->validate([
            'users_id' => 'required|exists:users,id',
            'info_perso_id' => 'required|exists:info_persos,id',
            'specialite' => 'required|string|max:255',
        ]);

        // 2. Recherche du professeur
        $Prof = Prof::findOrFail($id);

        // 3. Mise à jour
        $Prof->update($validated);

        // 4. Redirection avec message de succès
        return redirect()->route('traitements.prof.index')->with('success', 'Professeur mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prof = Prof::findOrFail($id);
        $prof->delete();
        return redirect()->route('traitements.prof.index')->with('success', 'Prof supprimé avec succès.');
    }
}
