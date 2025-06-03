<?php

namespace App\Livewire\Matiere;

use Livewire\Component;
use App\Models\Cours;
use App\Models\Matiere;

class Index extends Component
{
    public $cours, $matieres;
    public $id;
    public $isModify = false;

    // Champs du formulaire
    public $titre, $matiere_id, $description, $module, $type = 'pdf';

    public function mount()
    {
        $this->refresh();
    }

    public function refresh()
    {
        $this->cours = Cours::with('matiere.classe', 'matiere.categorie')->get();
        $this->matieres = Matiere::with('classe', 'categorie')->get();
    }

    public function clearForm()
    {
        $this->id = '';
        $this->titre = '';
        $this->matiere_id = '';
        $this->description = '';
        $this->module = '';
        $this->type = 'pdf';
    }

    public function store()
    {
        $validated = $this->validate([
            'titre' => 'required|string|max:255',
            'matiere_id' => 'required|exists:matiere,id',
            'description' => 'nullable|string',
            'module' => 'required|string|max:255',
            'type' => 'required|string|max:20',
        ]);

        Cours::create($validated);
        $this->refresh();
        $this->clearForm();
        session()->flash('success', 'Cours créé avec succès !');
    }

    public function loadData($id)
    {
        $cours = $this->cours->where("id", $id)->first();
        $this->id = $cours->id;
        $this->titre = $cours->titre;
        $this->matiere_id = $cours->matiere_id;
        $this->description = $cours->description;
        $this->module = $cours->module;
        $this->type = $cours->type;
        $this->isModify = true;
    }

    public function update()
    {
        $validated = $this->validate([
            'titre' => 'required|string|max:255',
            'matiere_id' => 'required|exists:matiere,id',
            'description' => 'nullable|string',
            'module' => 'required|string|max:255',
            'type' => 'required|string|max:20',
        ]);

        $cours = Cours::findOrFail($this->id);
        $cours->update($validated);
        $this->refresh();
        $this->clearForm();
        $this->isModify = false;
        session()->flash('success', 'Cours modifié avec succès !');
    }

    public function delete($id)
    {
        $cours = Cours::findOrFail($id);
        $cours->delete();
        $this->refresh();
        session()->flash('success', 'Cours supprimé avec succès !');
    }

    public function render()
    {
        return view('livewire.matiere.index');
    }
}
