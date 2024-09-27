<div>

    {{-- Barra de busqueda --}}
    <div class="mb-4">
        <label
            class="mx-auto relative bg-white  flex flex-col md:flex-row items-center justify-center border py-2 px-2 rounded-2xl gap-2 shadow-md focus-within:border-gray-300"
            for="search-bar">

            <input id="search-bar" placeholder="Buscar..." class="px-4 py-2 w-full rounded-md flex-1 outline-none bg-white"
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

    <div class="inline-flex w-full justify-start mb-4">
        <a href="{{ route('our_trainings.index') }}" target="_blank"
            class="px-4 py-2 bg-blue-600 text-white rounded-md">Ver página Capacitaciones</a>
    </div>


    <div class="card space-y-5">

        <x-admin.section-title>
            <x-slot name="title">Lista de capacitaciones</x-slot>
            <x-slot name="description">Gestiona las capacitaciones que se muestran en tu sitio web.</x-slot>
        </x-admin.section-title>

        @if ($trainings->count())

            <div>
                <div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-4">
                    @foreach ($trainings as $training)
                        <div
                            class="max-w-full bg-white border-[2px] border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 overflow-hidden">

                            <figure class="relative">

                                {{-- Superposición para oscurecer la imagen --}}
                                <div class="absolute inset-0 bg-black opacity-30"></div> {{-- Aumenta o disminuye el valor de opacity para oscurecer más o menos --}}

                                <div class="absolute top-3 right-3">

                                    @if ($training->topics->count())

                                        {{-- Si hay topics, mostrar el contador con una etiqueta verde --}}
                                        <x-badge type="simple" url="{{ route('admin.trainings.edit', $training) }}#topics">
                                            {{ $training->topics->count() }} temas registrados
                                        </x-badge>
                                        
                                    @else
                                        {{-- Si no hay topics, mostrar una etiqueta roja --}}
                                        <x-badge type="red" url="{{ route('admin.trainings.edit', $training) }}#topics">
                                            Sin temas registrados
                                        </x-badge>

                                    @endif

                                </div>

                                <img class="object-cover w-full aspect-[4/3]"
                                    src="{{ Storage::url($training->card_img_path) }}" alt="" />

                            </figure>

                            <div class="p-5 flex flex-col grow">
                                <h5
                                    class="mb-4 text-lg sm:text-xl grow font-bold min-h-[56px] line-clamp-2 tracking-tight text-gray-900 dark:text-white">
                                    {{ $training->name }}
                                </h5>
                                <a href="{{ route('admin.trainings.edit', $training) }}"
                                    class="items-center px-2 py-1.5 sm:px-3 sm:py-2 text-base sm:text-base font-medium text-center text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-400 dark:bg-yellow-500 dark:hover:bg-yellow-600 dark:focus:ring-yellow-400">
                                    Editar
                                    <i class="fa-solid fa-pen-to-square ml-2"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="mt-3">
                    {{ $trainings->links() }}
                </div>
            </div>
        @else
            {{-- Alerta que se muestra cuando no hay capacitaciones registradas --}}
            <div class="flex items-center p-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Info alert!</span> No se encontró ninguna capacitación.
                </div>
            </div>
        @endif
    </div>

</div>
