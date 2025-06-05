<?php

namespace App\Livewire\Cours;

use Livewire\Component;
use App\Models\Cours;
use App\Models\Matiere;

class Index extends Component
{

    public $cours;
    public $isModify = false;
    public $id;

    // Champs du formulaire
    public $titre, $matiere_id, $description, $module, $type = 'pdf';

    public $matieres;

    public function mount(){

        // dd(auth()->user()->prof);
        $query=Cours::query();

        if(auth()->user()->prof){
            $prof_id = auth()->user()->prof->id;
            $query->where(function($q) use($prof_id){
                $q->where('prof_id',$prof_id);
            });
        }

        $this->cours=$query->latest();
        $this->matieres = Matiere::all();
    }

    public function refresh(){
         $query=Cours::query();

        if(auth()->user()->prof){
            $prof_id = auth()->user()->prof->id;
            $query->where(function($q) use($prof_id){
                $q->where('prof_id',$prof_id);
            });
        }

        $this->cours=$query->latest();
        $this->matieres = Matiere::all();
    }

    public function clearForm()
    {
        $this->id = '';
        $this->titre = '';
        $this->matiere_id = '';
        $this->description = '';
        $this->module = '';
        $this->type = 'pdf';
        $this->isModify = false;
    }

    public function store()
    {
        // $this->validate();

        Cours::create([
            'titre' => $this->titre,
            'matiere_id' => $this->matiere_id,
            'description' => $this->description,
            'module' => $this->module,
            'type' => $this->type,
        ]);

        session()->flash('success', 'Cours ajouté avec succès.');
        $this->reset(['titre', 'matiere_id', 'description', 'module', 'type']);
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
        return view('livewire.cours.index');
    }
}

