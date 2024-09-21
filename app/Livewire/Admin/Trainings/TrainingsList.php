<?php

namespace App\Livewire\Admin\Trainings;

use App\Models\Training;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class TrainingsList extends Component
{

    use WithPagination;

    #[Url(as: 's')]
    public $search = '';


    public function resetSearch()
    {
        $this->search = '';
    }

    //Resetea la paginacion cada que se hace una busqueda, así se evitas que si haces una busqueda desde una pagina que no sea la primera y no hay suficientes parametros que llenen esa primera pagina ya no muestre la alerta de no registros
    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function render()
    {
        $trainings = Training::orderBy('id', 'desc')->with('topics')
            ->when($this->search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%');
            })
            ->paginate(6);

        return view('livewire.admin.trainings.trainings-list', compact('trainings'));
    }
}
