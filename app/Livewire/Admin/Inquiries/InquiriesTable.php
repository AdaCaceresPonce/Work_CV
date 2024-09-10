<?php

namespace App\Livewire\Admin\Inquiries;

use App\Models\Inquiry;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class InquiriesTable extends Component
{

    use WithPagination;

    public $search;

    public $bgColor = "";

    public $states = [
        [
            'name' => 'Nuevo',
            'style' => 'new-state',
        ],
        [
            'name' => 'Pendiente',
            'style' => 'pending-state',
        ],
        [
            'name' => 'Atendido',
            'style' => 'attended-state',
        ]
    ];

    public $inquiryEditId = '';

    public $open = false;

    public $inquiryInfo = [
        'name' => '',
        'lastname' => '',
        'institution_name' => '',
        'location' => '',
        'training' => '',
        'contact_number' => '',
        'message' => '',
        'state' => '',
        'created_at' => null,
    ];

    public function resetSearch()
    {
        $this->search = '';
    }

    public function show($inquiryId)
    {
        $this->open = true;

        //Variable que guarda el ID para la funcion update
        $this->inquiryEditId = $inquiryId;

        //Buscamos la consulta con el ID recibido, pero cargando tambien las relaciones definidas en el modelo: 'form_category' para cargar la categoria asignada y 'element' que es la relacion polimorfica
        $inquiry = Inquiry::with('training')->find($inquiryId);

        $this->inquiryInfo['name'] = $inquiry->name;
        $this->inquiryInfo['lastname'] = $inquiry->lastname;
        $this->inquiryInfo['institution_name'] = $inquiry->institution_name;
        $this->inquiryInfo['location'] = $inquiry->location;
        $this->inquiryInfo['training'] = $inquiry->training ? $inquiry->training->name : 'Ninguno seleccionado';
        $this->inquiryInfo['contact_number'] = $inquiry->contact_number;
        $this->inquiryInfo['message'] = $inquiry->message;
        $this->inquiryInfo['state'] = $inquiry->state;
        $this->inquiryInfo['created_at'] = $inquiry->created_at ? Carbon::parse($inquiry->created_at) : null;

    }

    public function update()
    {

        $inquiry = Inquiry::with('training')->find($this->inquiryEditId);

        $inquiry->update([
            'state' => $this->inquiryInfo['state'],
        ]);

        // $this->reset(['inquiryEditId', 'inquiryInfo', 'open']);

        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Estado de la consulta cambiado correctamente.'
        ]);
    }

    //Define los colores de las marcas de tiempo
    public function getBgColor($createdAt)
    {
        if ($createdAt) {
            $createdAt = Carbon::parse($createdAt);
            $diffInHours = $createdAt->diffInHours(now());

            if ($diffInHours < 4) {
                return 'time-blue';
            } elseif ($diffInHours < 12) {
                return 'time-indigo';
            } else {
                return 'time-gray';
            }
        } else {
            return 'time-gray';
        }
    }

    #[On('destroy')] 
    public function destroy()
    {
        // Lógica para eliminar la consulta
        $inquiry = Inquiry::with('training')->find($this->inquiryEditId);

        $inquiry->delete();

        $this->reset(['inquiryEditId', 'inquiryInfo', 'open']);

        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Consulta eliminada correctamente.'
        ]);

    }

    //Resetea la paginacion cada que se hace una busqueda, así se evitas que si haces una busqueda desde una pagina que no sea la primera y no hay suficientes parametros que llenen esa primera pagina ya no muestre la alerta de no registros
    public function updatingSearch()
    {
        $this->resetPage();
    }

    
    public function render()
    {
        $inquiries = Inquiry::orderBy('id', 'desc')
            ->with(['training'])
            ->when($this->search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('lastname', 'like', '%' . $search . '%')
                    ->orWhere('state', 'like', '%' . $search . '%');
            })
            ->paginate(10);

        return view('livewire.admin.inquiries.inquiries-table', compact('inquiries'));
    }
}
