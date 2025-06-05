<?php

namespace App\Livewire\Matiere;

use Livewire\Component;
use App\Models\Matiere;
use App\Models\Categorie;
use App\Models\Classe;
use App\Models\Prof;

class Index extends Component
{
    public $cours, $matieres;
    public $id;
    public $isModify = false;

    // Champs du formulaire
    public $libelle_M, $categories_id, $classes_id, $prof_id;

    public $categories, $classes, $profs;

     public function mount()
    {
        $this->refresh();
        $this->categories = Categorie::all();
        $this->classes = Classe::all();
        $this->profs = Prof::all();
    }

    public function refresh()
    {
        $this->matieres = Matiere::with('categorie', 'classe', 'prof')->get();
    }

    public function clearForm()
    {
        $this->id = '';
        $this->libelle_M = '';
        $this->categories_id = '';
        $this->classes_id = '';
        $this->prof_id = '';
        $this->isModify = false;
    }

    public function store()
    {
        $validated = $this->validate([
            'libelle_M' => 'required|string|max:255',
            'categories_id' => 'required|exists:categories,id',
            'classes_id' => 'required|exists:classes,id',
            'prof_id' => 'required|exists:prof,id',
        ]);

        Matiere::create($validated);
        $this->refresh();
        $this->clearForm();
        session()->flash('success', 'Matière créée avec succès !');
    }

    public function loadData($id)
    {
        $matiere = $this->matieres->where("id", $id)->first();
        $this->id = $matiere->id;
        $this->libelle_M = $matiere->libelle_M;
        $this->categories_id = $matiere->categories_id;
        $this->classes_id = $matiere->classes_id;
        $this->prof_id = $matiere->prof_id;
        $this->isModify = true;
    }

    public function update()
    {
        $validated = $this->validate([
            'libelle_M' => 'required|string|max:50',
            'categories_id' => 'required|exists:categories,id',
            'classes_id' => 'required|exists:classes,id',
            'prof_id' => 'required|exists:prof,id',
        ]);

        $matiere = Matiere::findOrFail($this->id);
        $matiere->update($validated);
        $this->refresh();
        $this->clearForm();
        session()->flash('success', 'Matière modifiée avec succès !');
    }

    public function delete($id)
    {
        $matiere = Matiere::findOrFail($id);
        $matiere->delete();
        $this->refresh();
        session()->flash('success', 'Matière supprimée avec succès !');
    }

    public function render()
    {
        return view('livewire.matiere.index');
    }
}
