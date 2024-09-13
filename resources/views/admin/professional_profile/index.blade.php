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

            <div>
                <span class="font-semibold text-xl">
                    Tu Historial Laboral
                </span>
                <p>(Arrástralos entre sí para cambiar el orden en el que se van a mostrar)</p>
            </div>

            <livewire:admin.personal-data.employment-history-list />

        </div>

        {{-- Grados Académicos --}}
        <div class="card space-y-4">

            <div>
                <span class="font-semibold text-xl">
                    Tus Grados Académicos
                </span>
                <p>(Arrástralos entre sí para cambiar el orden en el que se van a mostrar)</p>
            </div>

            <livewire:admin.personal-data.academic-background-list />

        </div>

        {{-- Aptitudes --}}
        <div class="card space-y-4">

            <div>
                <span class="font-semibold text-xl">
                    Tus Aptitudes
                </span>
                <p>(Arrástralos entre sí para cambiar el orden en el que se van a mostrar)</p>
            </div>

            <livewire:admin.personal-data.skills-list />

        </div>

    </div>


</x-admin-layout>
