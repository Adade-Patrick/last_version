<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matiere;
use App\Models\Cours;
use Illuminate\Support\Facades\Validator;
class ProfCoursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
          try{
            $prof = auth()->user()->prof;
            $query = Cours::query();
            $matiereQuery = Matiere::query();

            // dd($prof);
            if($prof){

                $query->where(function($q) use ($prof){
                    $q->where('prof_id',$prof->id);
                } );

                $matiereQuery->where(function($q) use ($prof){
                    $q->where('prof_id',$prof->id);
                } );
            }

            $cours = $query->orderBy('created_at','desc')->paginate(10);
            $matieres = $matiereQuery->get();
            // dd($matieres);

            return view('int_prof.cours',['cours'=>$cours,'matieres'=>$matieres]);

        }catch(\Exception $e){
            dd($e);
        }

    }

    /**
     * Show the form for creating a new resource.
     */

    public function store(Request $request)
    {
        try {
            // dd($request->all());
            $validator = Validator::make($request->all(), [
                'titre' => 'required|string|max:255',
                'imageUrl' => 'nullable|image|max:1024|mimes:jpeg,png,jpg,gif,svg,webp',
                'matiere_id' => 'required|integer|exists:matiere,id',
                'description' => 'nullable|string',
            ]);
            $prof = auth()->user()->prof;

            // dd($prof);
            if(!$prof){
                return redirect()->back()->withErrors(['prof inconnu']);
            }
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            Cours::create([
                'titre' => $request->input('titre'),
                'matiere_id' => $request->input('matiere_id'),
                'prof_id' => $prof->id,
                'description' => $request->input('description'),
            ]);

            return redirect()->back()->with('success', 'Professeur ajouté avec succès.');

        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->with('error', 'Une erreur est survenue : ' . $e->getMessage());
        }

    }

        /**
         * Store a newly created resource in storage.



         * Display the specified resource.
         */
        public function show($id)
        {
            try{
                $cours=Cours::where('id',$id)->first();
                return view('int_prof.chapitres.index',compact('cours'));

            }catch(\Exception $e){
                 return redirect()->back()->with('error', 'Une erreur est survenue : ' . $e->getMessage());
            }
        }

        /**
         * Show the form for editing the specified resource.
         */
        public function edit($id)
        {
            //
        }


        /**
         * Update the specified resource in storage.
         */
    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'titre' => 'required|string|max:255',
                'matiere_id' => 'required|integer|exists:matieres,id',
                'prof_id' => 'required|integer|exists:users,id',
                'description' => 'nullable|string',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $cours = Cours::findOrFail($id);

            $cours->update([
                'titre' => $request->input('titre'),
                'matiere_id' => $request->input('matiere_id'),
                'prof_id' => $request->input('prof_id'),
                'description' => $request->input('description'),
            ]);

            return redirect()->route('profs.index')->with('success', 'Professeur mis à jour avec succès.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue : ' . $e->getMessage());
        }
    }


        /**
         * Remove the specified resource from storage.
         */
    public function destroy($id)
    {
        try {
            $cours = Cours::findOrFail($id);
            $cours->delete();

            return redirect()->route('profs.index')->with('success', 'Professeur supprimé avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de la suppression : ' . $e->getMessage());
        }
    }

}
