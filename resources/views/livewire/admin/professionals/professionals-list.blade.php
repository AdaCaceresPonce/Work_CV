<div>

    {{-- Barra de busqueda --}}
    <div class="mb-4">
        <label
            class="mx-auto relative bg-white  flex flex-col md:flex-row items-center justify-center border py-2 px-2 rounded-2xl gap-2 shadow-md focus-within:border-gray-300"
            for="search-bar">

            <input id="search-bar" placeholder="Buscar por nombre, especialidad..."
                class="px-4 py-2 w-full rounded-md flex-1 outline-none bg-white" wire:model.live.debounce.500ms="search">

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


    <div>

        @if ($professionals->count())

            <div class="mx-auto max-w-[1230px]">

                <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                    @foreach ($professionals as $professional)
                        <div
                            class="flex flex-col max-w-full bg-white border-[2px] border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 overflow-hidden">

                            <img class="object-cover object-top w-full aspect-[5/6]"
                                src="{{ Storage::url($professional->photo_path) }}" alt="" />

                            <div class="p-5 flex flex-col grow">
                                <h5
                                    class="mb-1 text-lg sm:text-xl font-bold line-clamp-2 tracking-tight text-gray-900 dark:text-white">
                                    {{ $professional->name }}
                                </h5>
                                <div class="mb-3 text-base sm:text-lg font-bold">
                                    @foreach ($professional->specialties as $specialty)
                                        <span
                                            class="bg-blue-100 text-blue-800 dark:text-[#60f0f5] text-sm font-medium me-1 px-2.5 py-0.5 dark:bg-gray-700 border border-blue-400 dark:border-[#00CAF7] rounded-full">{{ $specialty->name }}</span>
                                    @endforeach
                                </div>
                                <a href="{{ route('admin.professionals.edit', $professional) }}"
                                    class="items-center mt-auto px-2 py-1.5 sm:px-3 sm:py-2 text-base sm:text-base font-medium text-center text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-400 dark:bg-yellow-500 dark:hover:bg-yellow-600 dark:focus:ring-yellow-400">
                                    Editar
                                    <i class="fa-solid fa-pen-to-square ml-2"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="mt-3">
                    {{ $professionals->links() }}
                </div>
            </div>
        @else
            {{-- Alerta que se muestra cuando no hay profesionales registrados --}}
            <div class="flex items-center p-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Info alert!</span> Todavía no hay profesionales registrados.
                </div>
            </div>
        @endif
    </div>

</div>
