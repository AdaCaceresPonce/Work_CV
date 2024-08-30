<?php

namespace App\Livewire\Admin\Trainings;

use App\Models\Topic;
use Livewire\Component;

class TrainingTopics extends Component
{

    public $training;

    public function render()
    {

        $topics = Topic::where('training_id', $this->training->id)
            ->orderBy('position')
            ->get();

        return view('livewire.admin.trainings.training-topics', compact('topics'));
    }
}
