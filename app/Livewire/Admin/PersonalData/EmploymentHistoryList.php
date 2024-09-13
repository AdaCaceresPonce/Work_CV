<?php

namespace App\Livewire\Admin\PersonalData;

use App\Models\PersonalData\EmploymentHistory;
use Livewire\Attributes\On;
use Livewire\Component;

class EmploymentHistoryList extends Component
{

    //Variable para el registro a crear
    public $employment;

    //Variable con el id del registro a editar, necesario para mostrar la info en la ventana modal
    public $employmentEditId = '';

    public $employmentEdit = [
        'job_title' => '',
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
                    'text' => 'El formulario de historial laboral contiene errores. Por favor revisa los campos.'
                ]);
            }
        });
    }

    public function mount()
    {
        //Inicializar los campos de la variable
        $this->employment = [
            'job_title' => '',
            'description' => null,
            'position' => '',
        ];
    }

    //Abrir la ventana modal con los datos
    public function show($employmentId)
    {

        $this->open = true;

        //Variable que guarda el ID para la funcion update
        $this->employmentEditId = $employmentId;

        //Buscamos el registro con el ID recibido
        $employment = EmploymentHistory::find($employmentId);

        $this->employmentEdit['job_title'] = $employment->job_title;
        $this->employmentEdit['description'] = $employment->description;
    }

    public function save()
    {

        // Determina la siguiente posición en función del registro con la mayor posición
        $lastPosition = EmploymentHistory::max('position') ?? 0;
        $this->employment['position'] = $lastPosition + 1;

        // Validar la entrada del usuario
        $this->validate([
            'employment.job_title' => 'required',
            'employment.description' => 'nullable',
            'employment.position' => 'integer',
        ], [], [
            'employment.job_title' => 'nombre del empleo',
            'employment.description' => 'descripción del empleo',
            'employment.position' => 'posición del empleo',
        ]);

        // Crear y guardar el empleo con los datos correctos
        EmploymentHistory::create($this->employment);

        //Resetear los campos de la variable
        $this->employment = [
            'job_title' => '',
            'description' => null,
            'position' => '',
        ];

        // Mostrar mensaje de éxito
        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Empleo agregado correctamente',
        ]);
    }

    //Función que va a actualizar el orden de los topics cada vez que se agregue uno nuevo
    #[On('sortEmployments')] 
    public function sortEmployments($sorts)
    {
        // Inicializa el contador de posición
        $position = 1;

        // Recorre el array de IDs ordenados
        foreach ($sorts as $id) {

            // Encuentra el topic y actualiza su posición
            $employment = EmploymentHistory::find($id);
            $employment->update(['position' => $position]);

            // Incrementa el contador de posición
            $position++;
        }

        $this->dispatch('toast', [
            'icon' => 'success',
            'title' => 'Orden de empleos actualizado correctamente',
        ]);

    }

    public function update()
    {

        $this->validate([
            'employmentEdit.job_title' => 'required',
            'employmentEdit.description' => 'nullable',
        ], [], [
            'employmentEdit.job_title' => 'nombre del empleo',
            'employmentEdit.description' => 'descripción del empleo',
        ]);

        $employment = EmploymentHistory::find($this->employmentEditId);

        $employment->update([
            'job_title' => $this->employmentEdit['job_title'],
        ]);

        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Datos del empleo actualizados correctamente.'
        ]);
    }

    #[On('destroyEmployment')]
    public function destroyEmployment($employmentId)
    {
        // Encontrar el empleo que se desea eliminar
        $employmentToDelete = EmploymentHistory::findOrFail($employmentId);

        // Almacenar la posición del employment eliminado
        $deletedPosition = $employmentToDelete->position;

        // Eliminar el employment
        $employmentToDelete->delete();

        // Verificar si quedan otros registros
        if (EmploymentHistory::count() > 0) {

            // Reordenar solo los registros que tenían una posición mayor al eliminado

            // Obtener todos los topics con una posición mayor a la del eliminado
            $employments = EmploymentHistory::where('position', '>', $deletedPosition)
                ->orderBy('position')
                ->get();

            // Recorrer y reasignar las posiciones desde el hueco dejado por el eliminado
            foreach ($employments as $employment) {
                $employment->update(['position' => $employment->position - 1]);
            }
        }

        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => '¡Empleo eliminado!',
            'text' => 'El empleo ha sido eliminado del historial laboral y los restantes han sido reordenados.',
        ]);

    }
    
    public function render()
    {

        //Cargar los temas de la capacitación
        $employments = EmploymentHistory::orderBy('position')
            ->get();

        return view('livewire.admin.personal-data.employment-history-list', compact('employments'));

    }
}
