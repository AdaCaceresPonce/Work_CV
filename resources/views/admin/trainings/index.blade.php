<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Capacitaciones',
    ],
]">



    <x-slot name="action">
        <a class="btn btn-blue" href="{{ route('admin.trainings.create') }}">
            Nuevo
        </a>
    </x-slot>

    <div class="mx-auto max-w-[1230px]">

        <livewire:admin.trainings.trainings-list />

    </div>


</x-admin-layout>
