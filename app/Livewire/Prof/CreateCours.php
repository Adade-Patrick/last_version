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
    public $imageUrl;
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
        $this->imageUrl = '';
        $this->matiere_id = '';
        $this->chapitres_id = '';
        $this->description = '';
        $this->isModify = false;
    }

    public function loadCoursData($id)
    {
        try{
            $cours=Cours::findOrFail($id);
            $this->titre= $cours->titre;
            $this->imageUrl= $imageUrl->imageUrl;
            $this->chapitres_id= $chapitre->id;
            $this->description= $description->description;

            $this->toggleEditCoursModal();

        }catch(ValidationException $e){
            throw $e;

        }catch(\Exception $e){
            $this->addError('error',$e->getMessage());
        }
    }

     public function editCours(){
        try{
            $cours=Cours::findOrFail($this->chapitres_id);

            $this->validate(
                [
                    'titre' => 'required|string',
                    'imageUrl' => 'nullable|image|max:1024|mimes:jpeg,png,jpg,gif,svg,webp',
                    'chapitres_id' => 'required|int',
                    'description' => 'required|string',
                ]
            );

            $filename = null;
            if ($this->imageUrl) {
                Storage::disk('public')->delete($cours->imageUrl);
                $filename = $this->imageUrl->store('cours/imageUrl', 'public');
            }

            $cours->update([
                'titre' => $this->titre,
                'imageUrl' => $this->$filename,
                'chapitres_id' => $this->chapitres_id,
                'description' => $description,
            ]);

            $this->toggleEditCoursModal();
            session()->flash('success', 'Cours modifié avec succès !');
            $this->reset(['titre', 'imageUrl', 'chapitres_id', 'description']);
             $this->refresh();

        }catch(ValidationException $e){
            throw $e;

        }catch(\Exception $e){
            $this->addError('error',$e->getMessage());
        }
    }

    public function store()
    {
        // $this->validate();

        Cours::create([
            'titre' => $this->titre,
            'imageUrl' => $this->imageUrl,
            'matieres_id' => $this->matiere_id,
            'chapitres_id' => $this->chapitres_id,
            'description' => $this->description,
        ]);

        session()->flash('success', 'Cours ajouté avec succès.');
        $this->reset(['titre', 'imageUrl', 'matieres_id', 'description']);
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
            'imageUrl' => 'nullable|image|max:1024|mimes:jpeg,png,jpg,gif,svg,webp',
            'matieres_id' => 'required|exists:matieres,id',
            'chapitres_id' => 'required|exists:chapitres,id',
            'description' => 'required|string',
        ];
    }

    public function save()
    {
        $this->validate();

         $path = null;
        if ($this->imageUrl) {
            $path = $this->imageUrl->store('cours/imageUrl', 'public');
        };

        Cours::create([
            'titre' => $this->titre,
            'imageUrl' => $this->imageUrl,
            'description' => $this->description,
            'matiere_id' => $this->matiere_id,
            'chapitres_id' => $this->chapitres_id,
            'prof_id' => Auth::id(),
        ]);

        $this->reset(['titre', 'imageUrl', 'description', 'matiere_id', 'chapitres_id']);
        session()->flash('message', 'Cours créé avec succès !');
    }

    public function render()
    {
        return view('livewire.prof.create-cours');

    }
}

