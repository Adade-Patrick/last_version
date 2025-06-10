<?php

namespace App\Livewire\Chapitre;

use Livewire\Component;
use App\Models\Chapitre;
use App\Models\Cours;
use App\Models\Evaluation;
use Illuminate\Validation\ValidationException;
use Livewire\WithFileUploads;

class Index extends Component
{

    use WithFileUploads;
    public $editMode = false;
    public $addChapitreModal = false;
    public $chapitres,$cours,$evaluation;
    //champs liés au chapitre
    public $titre, $description, $cours_id, $temps_estime, $ressource, $has_evaluation, $evaluation_id;
    //champs liés aux sections
    public $titre_section, $description_section, $videoUrl, $pdfUrl, $chapitres_id;


    protected $rules = [
        'titre' => 'required|string',
        'description' => 'nullable|string',
        'temps_estime' => 'required|int',
        'ressource' => 'nullable|file|mimes:pdf',
        'has_evaluation' => 'nullable|boolean',
    ];

    public function mount($arguments)
    {
        $this->cours = $arguments['cours'];
    }

    public function refresh(){
        $this->cours->refresh();
        $this->chapitres = $this->cours->chapitres;
    }

    public function toggleAddChapitreModal(){
        if($this->addChapitreModal){
            $this->addChapitreModal = false;
            return;
        }
        $this->addChapitreModal = true;
    }

     public function loadChapitres()
    {

    }

    public function store()
    {

        try{
            $this->validate();

            $filename = null;
            if ($this->ressource) {
                $filename = $this->ressource->store('chapitres/ressources', 'public');
            }

            Chapitre::create([
                'cours_id' => $this->cours->id,
                'titre' => $this->titre,
                'temps_estime' => $this->temps_estime,
                'description' => $this->description,
                'ressource' => $filename,
                'has_evaluation' => $this->has_evaluation??false,
            ]);
            $this->addChapitreModal = false;
            $this->reset(['titre', 'description', 'temps_estime', 'ressource', 'has_evaluation']);
            session()->flash('success', 'Chapitre ajouté avec succès !');

            $this->refresh();

        }catch(ValidationException $e){
            throw $e;

        }catch(\Exception $e){
            $this->addError('error',$e->getMessage());
        }
    }

    public function delete($id)
    {
        Chapitre::findOrFail($id)->delete();
        session()->flash('success', 'Chapitre supprimé.');
        $this->loadChapitres();
    }

    public function render()
    {
        return view('livewire.chapitre.index');
    }
}
