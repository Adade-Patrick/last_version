<?php

namespace App\Livewire\Chapitre;

use Livewire\Component;

class Index extends Component
{

    public $cours;
    public function render()
    {
        return view('livewire.chapitre.index');
    }
}
