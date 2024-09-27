<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Tu currículum',
    ],
]">



    <div class="mx-auto max-w-[1230px] space-y-8">

        {{-- Historial Laboral --}}
        <div class="card space-y-4">

            <x-admin.section-title>
                <x-slot name="title">Tu Historial Laboral</x-slot>
                <x-slot name="description">Gestiona tu historial laboral según tus preferencias.</x-slot>
            </x-admin.section-title>

            <livewire:admin.personal-data.employment-history-list />

        </div>

        {{-- Grados Académicos --}}
        <div class="card space-y-4">

            <x-admin.section-title>
                <x-slot name="title">Tus Grados Académicos</x-slot>
                <x-slot name="description">Gestiona tus grados académicos según tus preferencias.</x-slot>
            </x-admin.section-title>

            <livewire:admin.personal-data.academic-background-list />

        </div>

        {{-- Aptitudes --}}
        <div class="card space-y-4">

            <x-admin.section-title>
                <x-slot name="title">Tus Aptitudes</x-slot>
                <x-slot name="description">Gestiona tus aptitudes según tus preferencias.</x-slot>
            </x-admin.section-title>

            <livewire:admin.personal-data.skills-list />

        </div>

    </div>


</x-admin-layout>
