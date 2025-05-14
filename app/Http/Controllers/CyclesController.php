<?php

namespace App\Http\Controllers;

use App\Models\Cycle;
use Illuminate\Http\Request;

class CyclesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cycles = Cycle::all();

        return view('cycles.index', compact('cycles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cycles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'libelle_C' => 'required|unique:cycles,libelle_C|max:50',
        ]);

        Cycle::create($request->all());
        return redirect()->route('cycles.index')->with('success', 'Cycle ajouté avec succès.');

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
        return view('cycles.edit', compact('cycle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'libelle_C' => 'required|max:50|unique:cycles,libelle_C,' . $cycle->idCycles . ',idCycles',
        ]);

        $cycle->update($request->all());
        return redirect()->route('cycles.index')->with('success', 'Cycle modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cycle->delete();
        return redirect()->route('cycles.index')->with('success', 'Cycle supprimé.');
    }
}
