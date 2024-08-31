<?php

namespace App\Livewire\Admin\Trainings;

use App\Models\Topic;
use Livewire\Attributes\On;
use Livewire\Component;

class TrainingTopics extends Component
{

    public $training;

    public function updateTopicOrder($orderedIds)
    {
        // Inicializa el contador de posición
        $position = 1;

        // Recorre el array de IDs ordenados
        foreach ($orderedIds as $id) {
            // Encuentra el topic y actualiza su posición
            $topic = Topic::find($id);
            $topic->update(['position' => $position]);

            // Incrementa el contador de posición
            $position++;
        }

    }

    #[On('sortTopics')] 
    public function sortTopics($sorts)
    {
        // Inicializa el contador de posición
        $position = 1;

        // Recorre el array de IDs ordenados
        foreach ($sorts as $id) {
            // Encuentra el topic y actualiza su posición
            $topic = Topic::find($id);
            $topic->update(['position' => $position]);

            // Incrementa el contador de posición
            $position++;
        }

    }

    public function render()
    {

        $topics = Topic::where('training_id', $this->training->id)
            ->orderBy('position')
            ->get();

        return view('livewire.admin.trainings.training-topics', compact('topics'));
    }
}
