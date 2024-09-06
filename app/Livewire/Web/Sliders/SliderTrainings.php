<?php

namespace App\Livewire\Web\Sliders;

use App\Models\Training;
use Livewire\Component;

class SliderTrainings extends Component
{

    public $trainings;

    public function mount(){
        $this->trainings = Training::orderBy('id', 'desc')->get();
    }

    public function placeholder(){
        return view('livewire.placeholders.spinner');
    }

    public function render()
    {
        return view('livewire.web.sliders.slider-trainings');
    }
}
