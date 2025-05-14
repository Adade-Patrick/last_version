<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CoursController extends Controller
{
    public function index()
    {
        $cours = Cours::all();

        return view('traitements.cours.index', compact('cours'));
    }

    public function create()
    {
        $categories = Categorie::all();
        return view('cours.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'imageUrl' => 'required|string',
            'description' => 'required|string',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        Cours::create($request->all());

        return redirect()->route('cours.index')->with('success', 'Cours créé avec succès.');
    }

    public function show(Cours $cour)
    {
        return view('cours.show', compact('cour'));
    }

    public function edit(Cours $cour)
    {
        $categories = Categorie::all();
        return view('cours.edit', compact('cour', 'categories'));
    }

    public function update(Request $request, Cours $cour)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'imageUrl' => 'required|string',
            'description' => 'required|string',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        $cour->update($request->all());

        return redirect()->route('cours.index')->with('success', 'Cours mis à jour avec succès.');
    }

    public function destroy(Cours $cour)
    {
        $cour->delete();

        return redirect()->route('cours.index')->with('success', 'Cours supprimé avec succès.');
    }
}

