<?php

namespace App\Http\Controllers;

use App\Models\Cycle;
use Illuminate\Http\Request;

class cyclesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cycles = Cycle::all();

        return view('cycle.index', compact('cycles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cycle.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'libelle_C' => 'required|unique:cycle,libelle_C|max:50',
        ]);

        Cycle::create($request->all());
        return redirect()->route('cycle.index')->with('success', 'Cycle ajouté avec succès.');

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
    // public function edit(string $id)
    // {
    //     return view('cycle.edit', compact('cycle'));
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $cycle = Cycle::findOrFail($id);
        $cycle->update([
            'libelle_C' => $request->libelle_C,
        ]);

        return redirect()->route('cycle.index')->with('success', 'Cycle modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cycles = Cycle::findOrFail($id);
        $cycles->delete();
        return redirect()->route('cycle.index')->with('success', 'Cycle supprimé.');
    }
}
