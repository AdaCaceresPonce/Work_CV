<div>
    <div class="space-y-4">

        {{-- Listado de capacitaciones --}}
        <div class="grid grid-cols-1 gap-3" id="academicBgs_list">

            @if ($academicBgs->count())

                @foreach ($academicBgs as $academicBg)
                    <div class="bg-gray-100 border-2 rounded-md flex items-center" data-id="{{ $academicBg->id }}"
                        wire:key="academicBg-{{ $academicBg->id }}">

                        {{-- Cuadrito para mover entre la lista --}}
                        <div class="handle bg-gray-300 h-full flex items-center text-xl cursor-grab">
                            <span class="px-4">
                                <i class="fa-solid fa-hand"></i> <i class="fa-solid fa-arrows-up-down"></i>
                            </span>
                        </div>

                        {{-- Nombre del tema --}}
                        <div class="flex-1 p-4 hyphens-auto">
                            <span class="font-bold text-sky-700 underline underline-offset-4">Posición {{ $academicBg->position }}</span>
                            <ul class="mt-2">
                                <li><strong>Grado académico:</strong> {{ $academicBg->degree_name }}</li>
                                <li><strong>Institución:</strong> {{ $academicBg->institution_name }}</li>
                            </ul>
                        </div>

                        {{-- Botones de acción --}}
                        <div class="bg-gray-200 p-4 flex flex-col md:flex-row gap-2 items-center justify-center h-full">

                            {{-- Botón editar --}}
                            <button wire:click="show({{ $academicBg->id }})"
                                class="bg-yellow-500 text-white px-3 py-2 rounded-md">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>

                            {{-- Botón eliminar --}}
                            <button type="button" class="bg-red-500 text-white px-3 py-2 rounded-md"
                                onclick="confirmDeleteAcademicBg({{ $academicBg->id }})">
                                <i class="fa-solid fa-trash"></i>
                            </button>

                        </div>

                    </div>
                @endforeach

            @else
            
                {{-- Alerta para cuando no haya temas registrados --}}
                <div class="w-full px-2 py-4 md:px-4 md:py-8">
                    <div class="flex flex-col items-center text-center">

                        <span class="text-xl md:text-2xl text-amber-700 font-bold">
                            ¡Ups! Parece que no tienes grados académicos registrados.
                        </span>

                        <div>

                        </div>

                        <div class="flex flex-col gap-1 text-lg font-bold">
                            <span>
                                Registra un grado académico
                            </span>
    
                            <i class="fa-solid fa-arrow-down animate-bounce"></i>
                        </div>
                    </div>
                </div>

            @endif

        </div>

        {{-- Ventana modal --}}
        <form wire:submit="update">

            <x-dialog-modal wire:model="open">

                <x-slot name="title">
                    Modifica los datos del grado académico
                </x-slot>

                <x-slot name="content">
                    <div>
                        <x-label class="mb-1">
                            Nombre del grado académico
                        </x-label>
                        <x-input class="w-full" placeholder="Escribe el nombre del grado académico"
                            wire:model.live="academicBgEdit.degree_name" />
                        <x-input-error for="academicBgEdit.degree_name" />
                    </div>

                    <div class="mt-4">
                        <x-label class="mb-1">
                            Nombre de la institución
                        </x-label>
                        <x-input class="w-full" placeholder="Escribe el nombre de la institución"
                            wire:model.live="academicBgEdit.institution_name" />
                        <x-input-error for="academicBgEdit.institution_name" />
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

        {{-- Agregar nuevo tema --}}
        <div>
            {{-- Titulo --}}
            <div class="mb-2">
                <span class="font-bold text-lg">
                    Registrar nuevo grado académico
                </span>
            </div>

            <form wire:submit.prevent="save" id="form">
                <div class="space-y-4 card-gray">

                    <div>
                        <x-label class="mb-1">
                            Nombre del grado académico
                        </x-label>
                        <x-input class="w-full" placeholder="Escribe el nombre del grado académico" wire:model.live="academicBg.degree_name" />
                        <x-input-error for="academicBg.degree_name" />
                    </div>

                    <div>
                        <x-label class="mb-1">
                            Nombre de la institución
                        </x-label>
                        <x-input class="w-full" placeholder="Escribe el nombre de la institución" wire:model.live="academicBg.institution_name" />
                        <x-input-error for="academicBg.institution_name" />
                    </div>

                    <div class="flex justify-end">
                        <x-button>
                            Guardar grado académico
                        </x-button>
                    </div>
                </div>
            </form>
        </div>

        {{-- <button class="p-4 btn-blue font-bold">
            <i class="fa-solid fa-plus mr-1"></i> Agregar nuevo tema
        </button> --}}
    </div>

    @push('js')
        <!-- jsDelivr :: Sortable :: Latest (https://www.jsdelivr.com/package/npm/sortablejs) -->
        <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

        <script>
            new Sortable(academicBgs_list, {
                handle: '.handle',
                animation: 150,

                store: {
                    set: function(sortable) {
                        const sorts = sortable.toArray();
                        console.log(sorts);

                        Livewire.dispatch('sortAcademicBgs', {
                            sorts: sorts
                        });
                    }
                }
            });
        </script>
        <script>
            //Alerta de confirmar eliminar
            function confirmDeleteAcademicBg(academicBgId) {

                Swal.fire({
                    title: "¿Estás seguro de querer eliminar el grado académico?",
                    text: "¡No podrás revertir esto!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "¡Sí, bórralo!",
                    cancelButtonText: "Cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Ejecutar función destroy con el ID del academicBg
                        Livewire.dispatch('destroyAcademicBg', {
                            academicBgId: academicBgId
                        });
                    }
                });
            }
        </script>
    @endpush

</div>