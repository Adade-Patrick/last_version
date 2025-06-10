<?php
namespace App\Livewire\Prof;

use App\Models\Chapitre;
use App\Models\Cours;
use Livewire\Component;

class CreateChapitre extends Component
{
    public $cours_id;
    public $section_id;
    public $titre;
    public $description;
    public $temps_estime;
    public $ressource;
    public $has_evaluation = false;

    public $cours;
    public $section;

    public function mount($coursId)
    {
        $this->cours_id = $coursId;
        $this->cours = Cours::findOrFail($coursId);
        $this->section_id = $sectionId;
        $this->section = Section::findOrFail($sectionId);
    }

    public function rules()
    {
        return [
            'titre' => 'required|string|max:50',
            'description' => 'required|string|max:100',
            'temps_estime' => 'required|integer|min:1',
            'ressource' => 'nullable|file|max:1024|mimes:pdf', // max 10 Mb
            'has_evaluation' => 'boolean',
        ];
    }

    public function save()
    {
        $this->validate();

         $path = null;
        if ($this->ressource) {
            $path = $this->ressource->store('chapitres/ressources', 'public');
        }

        Chapitre::create([
            'cours_id' => $this->cours_id,
            'section_id' => $this->section_id,
            'titre' => $this->titre,
            'description' => $this->description,
            'temps_estime' => $this->temps_estime,
            'ressource' => $path,
            'has_evaluation' => $this->has_evaluation,
        ]);

        $this->reset(['titre', 'description', 'temps_estime', 'ressource', 'has_evaluation']);
        session()->flash('message', 'Chapitre ajouté avec succès !');
    }

    public function render()
    {
        $chapitres = $this->cours->chapitres()->latest()->get();

    return view('livewire.prof.create-chapitre', [
        'chapitres' => $chapitres,
        ]);

    return view('livewire.prof.create-chapitre');

    }
}

