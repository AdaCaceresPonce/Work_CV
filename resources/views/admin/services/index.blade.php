<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Servicios',
    ],
]">

    <x-slot name="action">
        <a class="btn btn-blue" href="{{ route('admin.services.create') }}">
            Nuevo
        </a>
    </x-slot>



    @if ($services->count())

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($services as $service)
                <div class="max-w-full bg-white border-[2px] border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 overflow-hidden">
                    
                    <img class="" src="{{ Storage::url($service->card_image_path) }}" alt="" />

                    <div class="p-5">
                        <h5 class="mb-4 text-lg sm:text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $service->name }}
                        </h5>
                        <a href="{{ route('admin.services.edit', $service) }}"
                            class="inline-flex items-center px-2 py-1.5 sm:px-3 sm:py-2 text-base sm:text-base font-medium text-center text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-400 dark:bg-yellow-500 dark:hover:bg-yellow-600 dark:focus:ring-yellow-400">
                            Editar
                            <i class="fa-solid fa-pen-to-square ml-2"></i>
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="mt-3">
            {{ $services->links() }}
        </div>
    @else
        {{-- Alerta que se muestra cuando no hay servicios registrados --}}
        <div class="flex items-center p-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
            role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Info alert!</span> Todavía no hay servicios registrados.
            </div>
        </div>
    @endif



</x-admin-layout>
