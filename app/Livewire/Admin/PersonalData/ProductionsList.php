<?php

namespace App\Livewire\Admin\PersonalData;

use App\Models\PersonalData\Production;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ProductionsList extends Component
{

    use WithPagination;

    //Variable para la produccion a crear
    public $production;

    //Variable para la busqueda
    public $search;

    public $productionEditId = '';

    public $productionEdit = [
        'title' => '',
        'url' => '',
        'publication_date' => '',
        'abstract' => '',
        'journal_name' => '',
    ];

    //Variable que controla el mostrar u ocultar la ventana modal
    public $open = false;

    //Funcion para alerta de error en el formulario
    public function boot()
    {
        $this->withValidator(function ($validator) {
            if ($validator->fails()) {
                $this->dispatch('swal', [
                    'icon' => 'error',
                    'title' => '¡Error!',
                    'text' => 'El formulario de producciones contiene errores. Por favor revisa los campos.'
                ]);
            }
        });
    }

    public function mount()
    {
        //Inicializar los campos de la variable
        $this->production = [
            'title' => '',
            'url' => '',
            'publication_date' => '',
            'abstract' => '',
            'journal_name' => '',
        ];
    }

    //Resetear busqueda
    public function resetSearch()
    {
        $this->search = '';
    }

    public function show($productionId)
    {
        $this->open = true;

        //Variable que guarda el ID para la funcion update
        $this->productionEditId = $productionId;

        //Buscamos la consulta con el ID recibido, pero cargando tambien las relaciones definidas en el modelo: 'form_category' para cargar la categoria asignada y 'element' que es la relacion polimorfica
        $production = Production::find($productionId);

        $this->productionEdit['title'] = $production->title;
        $this->productionEdit['url'] = $production->url;
        $this->productionEdit['publication_date'] = Carbon::parse($production['publication_date'])->format('d-m-Y');
        $this->productionEdit['abstract'] = $production->abstract;
        $this->productionEdit['journal_name'] = $production->journal_name;
    }

    public function save()
    {
        // Validar la entrada del usuario
        $this->validate([
            'production.title' => 'required|string|max:255',
            'production.url' => 'required|url|max:255',
            'production.publication_date' => 'required|date_format:d-m-Y',
            'production.abstract' => 'nullable|string',
            'production.journal_name' => 'nullable|string|max:255',
        ], [
            'production.publication_date.date_format' => 'La fecha debe estar en formato día-mes-año.',
        ], [
            'production.title' => 'título',
            'production.url' => 'enlace',
            'production.publication_date' => 'fecha de publicación',
            'production.abstract' => 'resumen breve',
            'production.journal_name' => 'nombre de la revista',

        ]);

        // Crear y guardar el empleo con los datos correctos
        Production::create($this->production);

        //Resetear los campos de la variable
        $this->production = [
            'title' => '',
            'url' => '',
            'publication_date' => '',
            'abstract' => '',
            'journal_name' => '',
        ];

        // Mostrar mensaje de éxito
        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Producción agregada correctamente',
        ]);
    }

    public function update()
    {
        $this->validate([
            'productionEdit.title' => 'required|string|max:255',
            'productionEdit.url' => 'required|url|max:255',
            'productionEdit.publication_date' => 'required|date',
            'productionEdit.abstract' => 'nullable|string',
            'productionEdit.journal_name' => 'nullable|string|max:255',
        ], [], [
            'productionEdit.title' => 'título',
            'productionEdit.url' => 'enlace',
            'productionEdit.publication_date' => 'fecha de publicación',
            'productionEdit.abstract' => 'resumen breve',
            'productionEdit.journal_name' => 'nombre de la revista',

        ]);

        $production = Production::find($this->productionEditId);

        $production->update($this->productionEdit);

        // $this->reset(['productionEditId', 'productionEdit', 'open']);

        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Datos de la producción actualizados correctamente.'
        ]);
    }

    #[On('destroyProduction')]
    public function destroyProduction($productionId)
    {
        // Lógica para eliminar la consulta
        $production = Production::find($productionId);

        $production->delete();

        $this->reset(['productionEditId', 'productionEdit', 'open']);

        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Producción eliminada correctamente.'
        ]);
    }

    //Resetea la paginacion cada que se hace una busqueda, así se evitas que si haces una busqueda desde una pagina que no sea la primera y no hay suficientes parametros que llenen esa primera pagina ya no muestre la alerta de no registros
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $productions = Production::orderBy('id', 'desc')
            ->when($this->search, function ($query, $search) {
                return $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('journal_name', 'like', '%' . $search . '%');
            })
            ->paginate(4);

        return view('livewire.admin.personal-data.productions-list', compact('productions'));
    }
}
