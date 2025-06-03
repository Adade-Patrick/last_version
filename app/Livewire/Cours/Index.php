<?php

namespace App\Livewire\Cours;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Cours;
use App\Models\Matiere;

class Index extends Component
{
    use WithPagination;

    public $cours, $matieres;
    public $id;
    public $isModify = false;

    public $titre, $matiere_id, $description, $module, $type = 'pdf';
    public $search = '';

    protected $rules = [
        'titre' => 'required|string|max:255',
        'matiere_id' => 'required|exists:matiere,id',
        'description' => 'nullable|string',
        'module' => 'required|string',
        'type' => 'required|in:pdf,video',
    ];

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

    public function save()
    {
        $this->validate();

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
        Cours::findOrFail($id)->delete();
        session()->flash('success', 'Cours supprimé.');
    }

    public function render()
    {
        $cours = Cours::with('matiere.classe', 'matiere.categorie')
            ->latest()
            ->paginate(7);

        $matieres = Matiere::all();

        return view('livewire.cours.index');
    }
}

