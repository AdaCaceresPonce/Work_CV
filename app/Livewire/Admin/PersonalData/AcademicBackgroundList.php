<?php

namespace App\Livewire\Admin\PersonalData;

use App\Models\PersonalData\AcademicBackground;
use Livewire\Attributes\On;
use Livewire\Component;

class AcademicBackgroundList extends Component
{

    //Variable para el registro a crear
    public $academicBg;

    //Variable con el id del registro a editar, necesario para mostrar la info en la ventana modal
    public $academicBgEditId = '';

    public $academicBgEdit = [
        'degree_name' => '',
        'institution_name' => '',
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
                    'text' => 'El formulario de grado académico contiene errores. Por favor revisa los campos.'
                ]);
            }
        });
    }

    public function mount()
    {
        //Inicializar los campos de la variable
        $this->academicBg = [
            'degree_name' => '',
            'institution_name' => '',
            'position' => '',
        ];
    }

    //Abrir la ventana modal con los datos
    public function show($academicBgId)
    {

        $this->open = true;

        //Variable que guarda el ID para la funcion update
        $this->academicBgEditId = $academicBgId;

        //Buscamos el registro con el ID recibido
        $academicBg = AcademicBackground::find($academicBgId);

        $this->academicBgEdit['degree_name'] = $academicBg->degree_name;
        $this->academicBgEdit['institution_name'] = $academicBg->institution_name;
    }

    public function save()
    {

        // Determina la siguiente posición en función del registro con la mayor posición
        $lastPosition = AcademicBackground::max('position') ?? 0;
        $this->academicBg['position'] = $lastPosition + 1;

        // Validar la entrada del usuario
        $this->validate([
            'academicBg.degree_name' => 'required',
            'academicBg.institution_name' => 'required',
            'academicBg.position' => 'integer',
        ], [], [
            'academicBg.degree_name' => 'nombre del grado académico',
            'academicBg.institution_name' => 'nombre de la institución',
            'academicBg.position' => 'posición del grado académico',
        ]);

        // Crear y guardar el empleo con los datos correctos
        AcademicBackground::create($this->academicBg);

        //Resetear los campos de la variable
        $this->academicBg = [
            'degree_name' => '',
            'institution_name' => '',
            'position' => '',
        ];

        // Mostrar mensaje de éxito
        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Grado académico agregado correctamente',
        ]);
    }

    //Función que va a actualizar el orden de los topics cada vez que se agregue uno nuevo
    #[On('sortAcademicBgs')] 
    public function sortAcademicBgs($sorts)
    {
        // Inicializa el contador de posición
        $position = 1;

        // Recorre el array de IDs ordenados
        foreach ($sorts as $id) {

            // Encuentra el topic y actualiza su posición
            $academicBg = AcademicBackground::find($id);
            $academicBg->update(['position' => $position]);

            // Incrementa el contador de posición
            $position++;
        }

        $this->dispatch('toast', [
            'icon' => 'success',
            'title' => 'Orden de grados académicos actualizado correctamente',
        ]);

    }

    public function update()
    {

        $this->validate([
            'academicBgEdit.degree_name' => 'required',
            'academicBgEdit.institution_name' => 'required',
        ], [], [
            'academicBgEdit.degree_name' => 'nombre del grado académico',
            'academicBgEdit.institution_name' => 'nombre de la institución',
        ]);

        $academicBg = AcademicBackground::find($this->academicBgEditId);

        $academicBg->update([
            'degree_name' => $this->academicBgEdit['degree_name'],
            'institution_name' => $this->academicBgEdit['institution_name'],
        ]);

        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Datos del grado académico actualizados correctamente.'
        ]);
    }

    #[On('destroyAcademicBg')]
    public function destroyAcademicBg($academicBgId)
    {
        // Encontrar el empleo que se desea eliminar
        $academicBgToDelete = AcademicBackground::findOrFail($academicBgId);

        // Almacenar la posición del academicBg eliminado
        $deletedPosition = $academicBgToDelete->position;

        // Eliminar el academicBg
        $academicBgToDelete->delete();

        // Verificar si quedan otros registros
        if (AcademicBackground::count() > 0) {

            // Reordenar solo los registros que tenían una posición mayor al eliminado

            // Obtener todos los topics con una posición mayor a la del eliminado
            $academicBgs = AcademicBackground::where('position', '>', $deletedPosition)
                ->orderBy('position')
                ->get();

            // Recorrer y reasignar las posiciones desde el hueco dejado por el eliminado
            foreach ($academicBgs as $academicBg) {
                $academicBg->update(['position' => $academicBg->position - 1]);
            }
        }

        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => '¡Grado académico eliminado!',
            'text' => 'El grado académico ha sido eliminado y los restantes han sido reordenados.',
        ]);

    }

    public function render()
    {

        //Cargar los temas de la capacitación
        $academicBgs = AcademicBackground::orderBy('position')
            ->get();

        return view('livewire.admin.personal-data.academic-background-list', compact('academicBgs'));

    }
}
