<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Matiere;

use Illuminate\Http\Request;

class CreerProfCoursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('int_prof.creer_cours');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        try{
            // dd(auth()->user()->prof);
            $query=Cours::query();

            if(auth()->user()->prof){
                $prof_id = auth()->user()->prof->id;
                $query->where(function($q) use($prof_id){
                    $q->where('prof_id',$prof_id);
                });
            }

            $cours=$query->latest();

            $matieres = Matiere::all();
        return view('int_prof.creer_cours',['cours'=>$cours, 'matieres'=>$matieres,]);

        }catch(\Exception $e){

        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
