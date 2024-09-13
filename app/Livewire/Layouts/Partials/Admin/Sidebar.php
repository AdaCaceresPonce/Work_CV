<?php

namespace App\Livewire\Layouts\Partials\Admin;

use App\Models\Inquiry;
use App\Models\Opinion;
use Livewire\Component;

class Sidebar extends Component
{
    //Enlaces del sidebar
    public $dashboard;
    public $links;
    public $inquiries_mailbox;
    public $opinions_mailbox;
    public $web_pages;

    //Variables para el buzon
    public $new_inquiries_count;
    public $new_opinions_count;

    public function mount()
    {

        //Inicializar los contadores
        $this->refreshInquiriesCount();
        $this->refreshOpinionsCount();

        //Informacion que necesita el sidebar
        $this->dashboard = [
            'icon' => 'fa-solid fa-table-columns',
            'name' => 'Dashboard',
            'route' => route('admin.dashboard'),
            'active' => request()->routeIs('admin.dashboard'),
        ];

        //Gestión
        $this->links = [
            [
                //Capacitaciones
                'icon' => 'fa-solid fa-person-chalkboard',
                'name' => 'Capacitaciones',
                'route' => route('admin.trainings.index'),
                'active' => request()->routeIs('admin.trainings.*'),
            ],

            [
                //Currículum
                'icon' => 'fa-solid fa-file-invoice',
                'name' => 'Tu currículum',
                'route' => route('admin.professional_profile.index'),
                'active' => request()->routeIs('admin.professional_profile.*'),
            ],

            [
                //Información de Contacto
                'icon' => 'fa-solid fa-house-chimney-medical',
                'name' => 'Información de Contacto',
                'route' => route('admin.clinic_information.index'),
                'active' => request()->routeIs('admin.clinic_information.*'),
            ],
        ];

        //Buzon de mensajes
        $this->inquiries_mailbox = [
            //Buzón de consultas
            'icon' => 'fa-solid fa-envelope',
            'name' => 'Consultas',
            'route' => route('admin.inquiries.index'),
            'active' => request()->routeIs('admin.inquiries.*'),
        ];

        $this->opinions_mailbox = [
            //Buzón de opinioness
            'icon' => 'fa-solid fa-comments',
            'name' => 'Opiniones',
            'route' => route('admin.opinions.index'),
            'active' => request()->routeIs('admin.opinions.*'),
        ];

        //Editor de Paginas
        $this->web_pages = [
            [
                'icon' => 'fa-solid fa-ranking-star',
                'name' => 'Página Inicio',
                'route' => route('admin.welcome_page_content.index'),
                'active' => request()->routeIs('admin.welcome_page_content.*'),
            ],

            [
                'icon' => 'fa-solid fa-chalkboard-user',
                'name' => 'Página Capacitaciones',
                'route' => route('admin.our_trainings_page_content.index'),
                'active' => request()->routeIs('admin.our_trainings_page_content.*'),
            ],

            [
                'icon' => 'fa-solid fa-file-contract',
                'name' => 'Página Currículum',
                'route' => route('admin.professional_profile_page_content.index'),
                'active' => request()->routeIs('admin.professional_profile_page_content.*'),
            ],

            [
                'icon' => 'fa-solid fa-address-book',
                'name' => 'Página Contacto',
                'route' => route('admin.contact_us_page_content.index'),
                'active' => request()->routeIs('admin.contact_us_page_content.*'),
            ],
        ];
    }

    public function refreshInquiriesCount()
    {

        $this->new_inquiries_count = Inquiry::where('state', 'Nuevo')->count();
    }

    public function refreshOpinionsCount()
    {

        $this->new_opinions_count = Opinion::where('state', 'Nuevo')->count();
    }

    public function render()
    {
        return view('livewire.layouts.partials.admin.sidebar');
    }
}
