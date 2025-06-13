<?php

namespace App\Livewire\Chapitre;

use Livewire\Component;
use App\Models\Chapitre;
use App\Models\Cours;
use App\Models\Evaluation;
use App\Models\Section;
use Illuminate\Validation\ValidationException;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{

    use WithFileUploads;
    public $editMode = false;
    public $addChapitreModal = false;
    public $editChapitreModal = false;
    public $addSectionModal = false;
    public $updateSection = false;
    public $chapitreSection;

    public $chapitres,$cours,$evaluation;
    //champs liés au chapitre
    public $titre, $description, $cours_id, $temps_estime, $ressource, $has_evaluation, $evaluation_id,$chapitres_id;
    //champs liés aux sections
    public $titre_section, $description_section, $videoUrl, $pdfUrl,$section_id;


    protected $rules = [
        'titre' => 'required|string|unique:chapitres,titre',
        'description' => 'nullable|string',
        'temps_estime' => 'required|int',
        'ressource' => 'nullable|file|mimes:pdf',
        'has_evaluation' => 'nullable|boolean',
    ];

    public function mount($arguments)
    {
        $this->cours = $arguments['cours'];
    }

    public function toggleSectionModal ( $chapitres_id){

        $this->chapitreSection = $chapitres_id;

        if($this->addSectionModal){
            $this->addSectionModal = false;
            return;
        }

        $this->addSectionModal = true;
    }

    public function addSection($chapitres_id){
        $this->reset(['titre_section', 'description_section','pdfUrl','videoUrl']);
        $this->updateSection=false;
        $this->toggleSectionModal($chapitres_id);
    }

    public function toggleUpdateSection (){
        if($this->updateSection){
            $this->updateSection = false;
            return;
        }

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

    public function toggleEditChapitreModal(){
        if($this->editChapitreModal){
            $this->editChapitreModal = false;
            return;
        }
        $this->editChapitreModal = true;
    }

     public function loadChapitresData($id)
    {
        try{
            $chapitre=Chapitre::findOrFail($id);
            $this->titre= $chapitre->titre;
            $this->chapitres_id= $chapitre->id;
            $this->description= $chapitre->description;
            $this->temps_estime= $chapitre->temps_estime;
            $this->ressource= $chapitre->ressource;
            $this->has_evaluation= $chapitre->has_evaluation;

            $this->toggleEditChapitreModal();

        }catch(ValidationException $e){
            throw $e;

        }catch(\Exception $e){
            $this->addError('error',$e->getMessage());
        }
    }

    public function editChapitre(){
        try{
            $chapitre=Chapitre::findOrFail($this->chapitres_id);

            $this->validate(
                [
                    'titre' => 'required|string',
                    'description' => 'nullable|string',
                    'temps_estime' => 'required|int',
                    'ressource' => 'nullable|file|mimes:pdf',
                    'has_evaluation' => 'nullable|boolean',
                ]
            );

            $filename = null;
            if ($this->ressource) {
                Storage::disk('public')->delete($chapitre->ressource);
                $filename = $this->ressource->store('chapitres/ressources', 'public');
            }

            $chapitre->update([
                'titre' => $this->titre,
                'temps_estime' => $this->temps_estime,
                'description' => $this->description,
                'ressource' => $filename,
                'has_evaluation' => $this->has_evaluation??false,
            ]);

            $this->toggleEditChapitreModal();
            session()->flash('success', 'Chapitre modifié avec succès !');
            $this->reset(['titre', 'description', 'temps_estime', 'ressource', 'has_evaluation']);
             $this->refresh();

        }catch(ValidationException $e){
            throw $e;

        }catch(\Exception $e){
            $this->addError('error',$e->getMessage());
        }
    }

    public function storeChapitre()
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
            $this->toggleAddChapitreModal();

            $this->reset(['titre', 'description', 'temps_estime', 'ressource', 'has_evaluation']);
            session()->flash('success', 'Chapitre ajouté avec succès !');

            $this->refresh();

        }catch(ValidationException $e){
            throw $e;

        }catch(\Exception $e){
            $this->addError('error',$e->getMessage());
        }
    }

    public function deleteChapitre($id)
    {
        try{


            $chapitre = Chapitre::findOrFail($id);
            if($chapitre->ressource){
                Storage::disk('public')->delete($chapitre->ressource);
            }

            $chapitre->delete();
            session()->flash('success', 'Chapitre supprimé.');
            $this->refresh();

        }catch(ValidationException $e){
            throw $e;

        }catch(\Exception $e){
            $this->addError('error',$e->getMessage());
        }
    }

    public function storeSection($chapitres_id){
        try{

            $this->validate(
                [
                    'titre_section' => 'required|string|unique:sections,titre',
                    'description_section' => 'nullable|string',
                    'pdfUrl' => 'required|file|mimes:pdf',
                   'videoUrl' => 'nullable|file|mimetypes:video/mp4,video/x-m4v,video/quicktime',

                ]
            );

            $videoUrl = null;
            $pdfUrl = null;

            if ($this->videoUrl) {
                $videoUrl = $this->videoUrl->store('chapitres/ressources/videos', 'public');
            }
            if ($this->pdfUrl) {
                $pdfUrl = $this->pdfUrl->store('chapitres/ressources/pdf', 'public');
            }


            Section::create([
                'chapitres_id' => $chapitres_id,
                'titre' => $this->titre_section,
                'description' => $this->description_section,
                'pdfUrl' => $pdfUrl,
                'videoUrl' => $videoUrl,
            ]);

            $this->reset(['titre_section', 'description_section', 'pdfUrl', 'videoUrl']);
            session()->flash('success', 'Section ajouté avec succès !');
            $this->refresh();

        }catch(ValidationException $e){
            throw $e;

        }catch(\Exception $e){
            $this->addError('error',$e->getMessage());
        }
    }

    public function deleteSection($id){
        try{
            $section = Section::findOrFail($id);

            if($section->videoUrl){
                Storage::disk('public')->delete($section->videoUrl);
            }

            if($section->pdfUrl){
                Storage::disk('public')->delete($section->pdfUrl);
            }

            $section->delete();
            session()->flash('success', 'Section supprimé.');
            $this->refresh();

        }catch(ValidationException $e){
            throw $e;

        }catch(\Exception $e){
            $this->addError('error',$e->getMessage());
        }
    }



    public function updateChapitreSection(){
        try{

            $section=Section::findOrFail($this->section_id);

            $this->validate(
                [
                    'titre_section' => 'required|string',
                    'description_section' => 'nullable|string',
                    'pdfUrl' => 'nullable|file|mimes:pdf',
                    'videoUrl' => 'nullable|file|mimetypes:video/mp4,video/x-m4v,video/quicktime',

                ]
            );

            $videoUrl = null;
            $pdfUrl = null;

            if ($this->videoUrl) {
                Storage::disk('public')->delete($section->videoUrl);
                $videoUrl = $this->videoUrl->store('chapitres/ressources/videos', 'public');
            }
            if ($this->pdfUrl) {
                Storage::disk('public')->delete($section->pdfUrl);
                $pdfUrl = $this->pdfUrl->store('chapitres/ressources/pdf', 'public');
            }

            $section->update([
                'titre' => $this->titre_section,
                'description' => $this->description_section,
                'pdfUrl' => $pdfUrl??$section->pdfUrl,
                'videoUrl' => $videoUrl?? $section->videoUrl,
            ]);

            $this->reset(['titre_section', 'description_section','pdfUrl','videoUrl']);
            session()->flash('success', 'Section modifié avec succès !');
            $this->updateSection = false;
            $this->refresh();

        }catch(ValidationException $e){
            throw $e;

        }catch(\Exception $e){
            $this->addError('error',$e->getMessage());
        }
    }

    public function loadSectionData($chapitre_id , $id){
        try{

            $section=Section::findOrFail($id);
            $this->titre_section= $section->titre;
            $this->section_id= $section->id;
            $this->pdfUrl= $section->pdfUrl;
            $this->videoUrl= $section->videoUrl;
            $this->description_section= $section->description;

            $this->updateSection = true;
            $this->toggleSectionModal($chapitre_id);

        }catch(ValidationException $e){
            throw $e;

        }catch(\Exception $e){
            $this->addError('error',$e->getMessage());
        }
    }


    public function render()
    {
        return view('livewire.chapitre.index');
    }
}
