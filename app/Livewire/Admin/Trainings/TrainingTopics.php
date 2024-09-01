<?php

namespace App\Livewire\Admin\Trainings;

use App\Models\Topic;
use Livewire\Attributes\On;
use Livewire\Component;

class TrainingTopics extends Component
{

    //Variable que contiene el training en el que nos encontramos
    public $training;

    //Variable para el tema nuevo a crear (topic)
    public $topic;

    //Funcion para alerta de error en el formulario
    public function boot()
    {
        $this->withValidator(function ($validator) {
            if ($validator->fails()) {
                $this->dispatch('swal', [
                    'icon' => 'error',
                    'title' => '¡Error!',
                    'text' => 'El formulario contiene errores. Por favor revisa los campos.'
                ]);
            }
        });
    }

    public function mount()
    {
        //Inicializar los campos de la variable topic
        $this->topic = [
            'name' => '',
            'training_id' => $this->training->id,
            'description' => null,
            'position' => '',
        ];
    }

    public function save()
    {

        // Determina la siguiente posición en función del último tema
        $lastPosition = $this->training->topics()->max('position') ?? 0;
        $this->topic['position'] = $lastPosition + 1;

        // Validar la entrada del usuario
        $this->validate([
            'topic.name' => 'required',
            'topic.training_id' => 'exists:trainings,id',
            'topic.description' => 'nullable',
            'topic.position' => 'integer',
        ], [], [
            'topic.name' => 'nombre del tema',
            'topic.training_id' => 'capacitación',
            'topic.description' => 'descripción del tema',
            'topic.position' => 'posición del tema',
        ]);

        // Crear y guardar el topic con los datos correctos
        Topic::create($this->topic);

        // Mostrar mensaje de éxito
        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Tema agregado correctamente',
        ]);

    }

    //Función que va a actualizar el orden de los topics
    #[On('sortTopics')] 
    public function sortTopics($sorts){
        // Inicializa el contador de posición
        $position = 1;

        // Recorre el array de IDs ordenados
        foreach ($sorts as $id) {
            // Encuentra el topic y actualiza su posición
            $updateTopic = Topic::find($id);
            $updateTopic->update(['position' => $position]);

            // Incrementa el contador de posición
            $position++;
        }

    }

    public function render(){

        //Cargar los temas de la capacitación
        $topics = Topic::where('training_id', $this->training->id)
            ->orderBy('position')
            ->get();

        return view('livewire.admin.trainings.training-topics', compact('topics'));
    }
}
