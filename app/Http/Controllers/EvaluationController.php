<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\Chapitre;
use App\Models\Cours;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cours = Cours::all();
        $chapitres = Chapitre::all();
        $evaluations = Evaluation::with('chapitre')->get();
        return view('int_prof.evaluation', compact('evaluations', 'chapitres', 'cours'));
    }

    /**
     * Show the form for creating a new resource.
     */
     public function create()
    {
        $chapitres = Chapitre::all();
        return view('int_prof.evaluation', compact('chapitres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'chapitre_id' => 'required|exists:chapitres,id',
            'titre' => 'required|string|',
            'date_evaluation' => 'required|date',
            'type' => 'required|string|',
            'duree' => 'required|int|',
        ]);

        Evaluation::create([
            'chapitre_id' => $request->chapitre_id,
            'titre' => $request->titre,
            'date_evaluation' => $request->date_evaluation,
            'type' => $request->type,
            'duree' => $request->duree,
        ]);

        return redirect()->route('int_prof.evaluation')->with('success', 'Évaluation ajoutée avec succès.');
    }

    public function show($id)
        {
            try{
                $evaluation=Evaluation::where('id',$id)->first();
                return view('int_prof.evaluation',compact('cours'));

            }catch(\Exception $e){
                 return redirect()->back()->with('error', 'Une erreur est survenue : ' . $e->getMessage());
            }
        }

    public function update(Request $request)
    {
        // 1. Valider les données
        $validated = $request->validate([
            'chapitre_id' => 'required|exists:chapitres,id',
            'titre' => 'required|string',
            'date_evaluation' => 'required|date',
            'type' => 'required|string',
            'duree' => 'required|integer',
        ]);

        // 2. Récupérer l'évaluation à modifier
        $evaluation = Evaluation::findOrFail($id);

        // 3. Mettre à jour les champs
        $evaluation->chapitre_id = $validated['chapitre_id'];
        $evaluation->titre = $validated['titre'];
        $evaluation->date_evaluation = $validated['date_evaluation'];
        $evaluation->type = $validated['type'];
        $evaluation->duree = $validated['duree'];

        // 4. Sauvegarder les modifications
        $evaluation->save();

        // 5. Rediriger ou retourner une réponse
        return redirect()->back()->with('success', 'Évaluation mise à jour avec succès.');
    }


    public function destroy($id)
    {
        $evaluations = Evaluation::findOrFail($id);
        $evaluations->delete();
        return redirect()->route('int_prof.evaluation')->with('success', 'Evaluation supprimé.');
    }

}
