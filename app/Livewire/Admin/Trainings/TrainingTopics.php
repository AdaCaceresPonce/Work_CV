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

    //Variable con el id del topic a editar, necesario para mostrar la info en la ventana modal
    public $topicEditId = '';

    public $topicEdit = [
        'name' => '',
        'description' => null,
    ];

    //Variable para mostrar u ocultar la ventana modal
    public $open = false;

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

    //Abrir la ventana modal con los datos del topic
    public function show($topicId)
    {
        // $this->resetErrorBag();

        $this->open = true;

        //Variable que guarda el ID para la funcion update
        $this->topicEditId = $topicId;

        //Buscamos la consulta con el ID recibido, pero cargando tambien las relaciones definidas en el modelo
        $topic = Topic::find($topicId);

        $this->topicEdit['name'] = $topic->name;
        $this->topicEdit['description'] = $topic->description;

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

        //Resetear los campos de la variable topic
        $this->topic = [
            'name' => '',
            'training_id' => $this->training->id,
            'description' => null,
            'position' => '',
        ];

        // Mostrar mensaje de éxito
        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Tema agregado correctamente',
        ]);
    }

    //Función que va a actualizar el orden de los topics cada vez que se agregue uno nuevo
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

        $this->dispatch('toast', [
            'icon' => 'success',
            'title' => 'Orden cambiado correctamente',
        ]);

    }

    public function update()
    {

        $this->validate([
            'topicEdit.name' => 'required',
            'topicEdit.description' => 'nullable',
        ], [], [
            'topicEdit.name' => 'nombre del tema',
            'topicEdit.description' => 'descripción del tema',
        ]);

        $topic = Topic::find($this->topicEditId);

        $topic->update([
            'name' => $this->topicEdit['name'],
        ]);

        // $this->reset(['inquiryEditId', 'inquiryInfo', 'open']);

        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Datos del tema actualizados correctamente.'
        ]);
    }

    #[On('destroy')]
    public function destroy($topicId)
    {
        // Encontrar el topic que se desea eliminar
        $topicToDelete = Topic::findOrFail($topicId);

        // Almacenar la posición del topic eliminado
        $deletedPosition = $topicToDelete->position;

        // Eliminar el topic
        $topicToDelete->delete();

        // Verificar si quedan otros topics
        if (Topic::where('training_id', $this->training->id)->count() > 0) {

            // Reordenar solo los topics que tenían una posición mayor al eliminado

            // Obtener todos los topics con una posición mayor a la del eliminado
            $topics = Topic::where('training_id', $this->training->id)
                ->where('position', '>', $deletedPosition)
                ->orderBy('position')
                ->get();

            // Recorrer y reasignar las posiciones desde el hueco dejado por el eliminado
            foreach ($topics as $topic) {
                $topic->update(['position' => $topic->position - 1]);
            }
        }

        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => '¡Tema eliminado!',
            'text' => 'El tema ha sido eliminado y los temas restantes han sido reordenados.',
        ]);

    }

    public function render()
    {

        //Cargar los temas de la capacitación
        $topics = Topic::where('training_id', $this->training->id)
            ->orderBy('position')
            ->get();

        return view('livewire.admin.trainings.training-topics', compact('topics'));
    }
}
