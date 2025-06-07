<?php

namespace App\Livewire\Prof;

use App\Models\Cours;
use App\Models\Matiere;
use App\Models\Chapitre;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CreateCours extends Component
{
    public $titre;
    public $description;
    public $matiere_id;
    public $chapitres_id;

    public $matieres ;
    public $chapitres ;

    public function mount()
    {
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
        $this->chapitres_id = '';
        $this->description = '';
        $this->isModify = false;
    }

    public function store()
    {
        // $this->validate();

        Cours::create([
            'titre' => $this->titre,
            'matieres_id' => $this->matiere_id,
            'chapitres_id' => $this->chapitres_id,
            'description' => $this->description,
        ]);

        session()->flash('success', 'Cours ajouté avec succès.');
        $this->reset(['titre', 'matieres_id', 'description']);
    }

    public function delete($id)
    {
        $cours = Cours::findOrFail($id);
        $cours->delete();
        $this->refresh();
        session()->flash('success', 'Cours supprimé avec succès !');
    }


    public function rules()
    {
        return [
            'titre' => 'required|string|max:255',
            'matieres_id' => 'required|exists:matieres,id',
            'chapitres_id' => 'required|exists:chapitres,id',
            'description' => 'required|string',
        ];
    }

    public function save()
    {
        $this->validate();

        Cours::create([
            'titre' => $this->titre,
            'description' => $this->description,
            'matiere_id' => $this->matiere_id,
            'chapitres_id' => $this->chapitres_id,
            'prof_id' => Auth::id(),
        ]);

        $this->reset(['titre', 'description', 'matiere_id', 'chapitres_id']);
        session()->flash('message', 'Cours créé avec succès !');
    }

    public function render()
    {
        return view('livewire.prof.create-cours');

    }
}

