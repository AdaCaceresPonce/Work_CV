<div>

    
    <div id="productions_list">
        {{-- Barra de busqueda --}}
        <div class="mb-4">
            <label
                class="mx-auto relative bg-white  flex flex-col md:flex-row items-center justify-center border py-2 px-2 rounded-2xl gap-2 shadow-md focus-within:border-gray-300"
                for="search-bar">

                <input id="search-bar" placeholder="Buscar producción por título, revista..."
                    class="px-4 py-2 w-full rounded-md flex-1 outline-none bg-white"
                    wire:model.live.debounce.500ms="search">

                <button wire:click="resetSearch"
                    class="w-full md:w-auto px-6 py-3 bg-black border-black text-white fill-white active:scale-95 duration-100 border will-change-transform overflow-hidden relative rounded-xl transition-all disabled:opacity-70">

                    <div class="relative">

                        <!-- Loading animation change opacity to display -->
                        <div
                            class="flex items-center justify-center h-3 w-3 absolute inset-1/2 -translate-x-1/2 -translate-y-1/2 transition-all">
                            <svg class="opacity-0 animate-spin w-full h-full" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                        </div>

                        <div class="flex items-center transition-all opacity-1 valid:"><span
                                class="text-sm font-semibold whitespace-nowrap truncate mx-auto">
                                Limpiar búsqueda
                            </span>
                        </div>

                    </div>

                </button>
            </label>
        </div>

        {{-- Tabla con las producciones --}}
        <div class="mb-4">
            @if ($productions->count())

                {{-- Tabla que muestra las consultas --}}
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Título
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    URL
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Fecha publicación
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Revista
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productions as $production)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-100 hover:dark:bg-gray-900"
                                    wire:key="production-{{ $production->id }}">

                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $production->id }}
                                    </th>

                                    <td class="px-6 py-4">
                                        {{ $production->title }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ $production->url }}" class="text-blue-500" target="_blank">Visitar sitio</a>
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $production->publication_date->format('d-m-Y') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ empty($production->journal_name) ? 'No definido' : $production->journal_name }}
                                    </td>

                                    <td class="px-6 py-4">
                                        <div class="inline-flex">
                                            <button wire:click="show({{ $production->id }})"
                                                class="mr-2 px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                <i class="fa-solid fa-eye mr-2"></i>Ver
                                            </button>

                                            <button type="button"
                                                class="bg-red-500 text-white text-xs px-3 py-2 rounded-md"
                                                onclick="confirmDeleteProduction({{ $production->id }})">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    {{ $productions->links(data: ['scrollTo' => '#productions_list']) }}
                </div>

                {{-- Ventana modal --}}
                <form wire:submit="update">


                </form>
            @else
                {{-- Alerta que se muestra cuando no hay producciones registradas --}}
                <div class="flex items-center p-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                    role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">Info alert!</span> No se encontraron producciones registradas.
                        Registra
                        una nueva.
                    </div>
                </div>
            @endif
        </div>

        {{-- Ventana modal --}}
        <form wire:submit="update">

            <x-dialog-modal wire:model="open">

                <x-slot name="title">
                    Modifica los datos de la producción
                </x-slot>

                <x-slot name="content">

                    <div class="space-y-4">

                        <div>
                            <x-label class="mb-1">
                                Título
                            </x-label>
                            <x-input class="w-full" placeholder="Escribe el título de la producción"
                                wire:model.live="productionEdit.title" />
                            <x-input-error for="productionEdit.title" />
                        </div>
    
                        <div>
                            <x-label class="mb-1">
                                URL
                            </x-label>
                            <x-input class="w-full" placeholder="Ingresa el enlace de la producción"
                                wire:model.live="productionEdit.url" />
                            <x-input-error for="productionEdit.url" />
                        </div>
    
                        <div>
                            <x-label class="mb-1">
                                Fecha de publicación
                            </x-label>
                            <x-input class="w-full" placeholder="Ingresa la fecha de publicación: día-mes-año"
                                wire:model.live="productionEdit.publication_date" />
                            <x-input-error for="productionEdit.publication_date" />
                        </div>
    
                        <div>
                            <x-label class="mb-1">
                                Resumen breve (Opcional)
                            </x-label>
                            <x-input class="w-full" placeholder="Ingresa un resumen breve (abstract)"
                                wire:model.live="productionEdit.abstract" />
                            <x-input-error for="productionEdit.abstract" />
                        </div>
    
                        <div>
                            <x-label class="mb-1">
                                Nombre de la revista (Opcional)
                            </x-label>
                            <x-input class="w-full" placeholder="Ingresa el nombre de la revista"
                                wire:model.live="productionEdit.journal_name" />
                            <x-input-error for="productionEdit.journal_name" />
                        </div>

                    </div>

                </x-slot>

                <x-slot name="footer">
                    <div class="flex justify-end">
                        <x-danger-button class="mr-2" wire:click="$set('open', false)">
                            Regresar
                        </x-danger-button>

                        <x-button>
                            Actualizar
                        </x-button>
                    </div>
                </x-slot>
            </x-dialog-modal>
        </form>

        {{-- Agregar nueva producción --}}
        <div>
            {{-- Titulo --}}
            <div class="mb-2">
                <span class="font-bold text-lg">
                    Registrar nueva producción
                </span>
            </div>

            <form wire:submit.prevent="save" id="form">
                <div class="space-y-4 card-gray">

                    <div>
                        <x-label class="mb-1">
                            Título
                        </x-label>
                        <x-input class="w-full" placeholder="Escribe el título de la producción"
                            wire:model.live="production.title" />
                        <x-input-error for="production.title" />
                    </div>

                    <div>
                        <x-label class="mb-1">
                            URL
                        </x-label>
                        <x-input class="w-full" placeholder="Ingresa el enlace de la producción"
                            wire:model.live="production.url" />
                        <x-input-error for="production.url" />
                    </div>

                    <div>
                        <x-label class="mb-1">
                            Fecha de publicación
                        </x-label>
                        <x-input class="w-full" placeholder="Ingresa la fecha de publicación: día-mes-año"
                            wire:model.live="production.publication_date" />
                        <x-input-error for="production.publication_date" />
                    </div>

                    <div>
                        <x-label class="mb-1">
                            Resumen breve (Opcional)
                        </x-label>
                        <x-input class="w-full" placeholder="Ingresa un resumen breve (abstract)"
                            wire:model.live="production.abstract" />
                        <x-input-error for="production.abstract" />
                    </div>

                    <div>
                        <x-label class="mb-1">
                            Nombre de la revista (Opcional)
                        </x-label>
                        <x-input class="w-full" placeholder="Ingresa el nombre de la revista"
                            wire:model.live="production.journal_name" />
                        <x-input-error for="production.journal_name" />
                    </div>

                    <div class="flex justify-end">
                        <x-button>
                            Guardar producción
                        </x-button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @push('js')
        <script>
            //Alerta de confirmar eliminar
            function confirmDeleteProduction(productionId) {

                Swal.fire({
                    title: "¿Estás seguro de querer eliminar la producción?",
                    text: "¡No podrás revertir esto!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "¡Sí, bórralo!",
                    cancelButtonText: "Cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Ejecutar función destroy con el ID del production
                        Livewire.dispatch('destroyProduction', {
                            productionId: productionId
                        });
                    }
                });
            }
        </script>
    @endpush
</div>
