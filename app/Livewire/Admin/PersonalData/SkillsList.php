<?php

namespace App\Livewire\Admin\PersonalData;

use App\Models\PersonalData\Skill;
use Livewire\Attributes\On;
use Livewire\Component;

class SkillsList extends Component
{

    //Variable para el registro a crear
    public $skill;

    //Variable con el id del registro a editar, necesario para mostrar la info en la ventana modal
    public $skillEditId = '';

    public $skillEdit = [
        'name' => '',
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
                    'text' => 'El formulario de aptitudes contiene errores. Por favor revisa los campos.'
                ]);
            }
        });
    }

    public function mount()
    {
        //Inicializar los campos de la variable
        $this->skill = [
            'name' => '',
            'position' => '',
        ];
    }

    //Abrir la ventana modal con los datos
    public function show($skillId)
    {

        $this->open = true;

        //Variable que guarda el ID para la funcion update
        $this->skillEditId = $skillId;

        //Buscamos el registro con el ID recibido
        $skill = Skill::find($skillId);

        $this->skillEdit['name'] = $skill->name;
        
    }

    public function save()
    {

        // Determina la siguiente posición en función del registro con la mayor posición
        $lastPosition = Skill::max('position') ?? 0;
        $this->skill['position'] = $lastPosition + 1;

        // Validar la entrada del usuario
        $this->validate([
            'skill.name' => 'required',
            'skill.position' => 'integer',
        ], [], [
            'skill.name' => 'nombre de la aptitud',
            'skill.position' => 'posición de la aptitud',
        ]);

        // Crear y guardar el empleo con los datos correctos
        Skill::create($this->skill);

        //Resetear los campos de la variable
        $this->skill = [
            'name' => '',
            'position' => '',
        ];

        // Mostrar mensaje de éxito
        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Aptitud agregada correctamente',
        ]);
    }

    //Función que va a actualizar el orden de los topics cada vez que se agregue uno nuevo
    #[On('sortSkills')] 
    public function sortSkills($sorts)
    {
        // Inicializa el contador de posición
        $position = 1;

        // Recorre el array de IDs ordenados
        foreach ($sorts as $id) {

            // Encuentra el topic y actualiza su posición
            $skill = Skill::find($id);
            $skill->update(['position' => $position]);

            // Incrementa el contador de posición
            $position++;
        }

        $this->dispatch('toast', [
            'icon' => 'success',
            'title' => 'Orden de aptitudes actualizado correctamente',
        ]);

    }

    public function update()
    {

        $this->validate([
            'skillEdit.name' => 'required',
            
        ], [], [
            'skillEdit.name' => 'nombre de la aptitud',
            
        ]);

        $skill = Skill::find($this->skillEditId);

        $skill->update([
            'name' => $this->skillEdit['name'],
        ]);

        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Datos de la aptitud actualizados correctamente.'
        ]);
    }

    #[On('destroySkill')]
    public function destroySkill($skillId)
    {
        // Encontrar el empleo que se desea eliminar
        $skillToDelete = Skill::findOrFail($skillId);

        // Almacenar la posición del skill eliminado
        $deletedPosition = $skillToDelete->position;

        // Eliminar el skill
        $skillToDelete->delete();

        // Verificar si quedan otros registros
        if (Skill::count() > 0) {

            // Reordenar solo los registros que tenían una posición mayor al eliminado

            // Obtener todos los registros con una posición mayor a la del eliminado
            $skills = Skill::where('position', '>', $deletedPosition)
                ->orderBy('position')
                ->get();

            // Recorrer y reasignar las posiciones desde el hueco dejado por el eliminado
            foreach ($skills as $skill) {
                $skill->update(['position' => $skill->position - 1]);
            }
        }

        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => '¡Aptitud eliminada!',
            'text' => 'La aptitud ha sido eliminada y las restantes han sido reordenadas.',
        ]);

    }

    public function render()
    {

        //Cargar los temas de la capacitación
        $skills = Skill::orderBy('position')
            ->get();

        return view('livewire.admin.personal-data.skills-list', compact('skills'));
    }
}
