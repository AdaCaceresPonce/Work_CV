<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Capacitaciones',
        'route' => route('admin.trainings.index'),
    ],
    [
        'name' => $training->name,
    ],
]">


    <div class="mx-auto max-w-[1230px]">

        <x-validation-errors class="mb-3 p-4 border-2 border-red-500 rounded-md" />

        @if ($training->topics->isEmpty())
            <div class="bg-red-100 text-red-600 border border-red-600 rounded-md p-4 mb-4">
                <strong>Advertencia:</strong> Esta capacitación no se mostrará en la web hasta que se le agreguen temas.
            </div>
        @endif

        <form action="{{ route('admin.trainings.update', $training) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Información principal de la capacitación --}}
            <div class="card-gray space-y-4">

                <div
                    class="flex flex-col md:flex-row justify-between items-start md:items-center p-3 bg-white rounded-lg shadow-sm gap-2 md:gap-0">

                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-info-circle text-sky-500"></i>
                        <span class="font-semibold text-xl md:text-2xl text-slate-800">
                            Datos de la capacitación
                        </span>
                    </div>

                    <a href="{{ route('our_trainings.show_training', $training) }}" target="_blank"
                        class="px-3 py-1.5 md:px-4 md:py-2 bg-sky-500 text-white rounded-lg shadow hover:bg-sky-600 transition ease-in-out duration-200">
                        Ver en web <i class="fa-solid fa-circle-arrow-right ml-1"></i>
                    </a>

                </div>

                {{-- Imagenes --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                    <div class="col">
                        <x-label class="font-black">
                            Imagen de la tarjeta
                        </x-label>
                        <x-label class="mb-1">
                            <span class="text-slate-700 font-light">
                                (Formatos aceptados: JPG, JPEG, PNG, SVG. / Máx: 1mb)
                            </span>
                        </x-label>
                        <figure class="relative">
                            <div class="absolute top-4 right-4">
                                <label
                                    class="flex items-center px-2.5 py-1.5 lg:px-4 lg:py-2 rounded-lg btn-blue cursor-pointer text-sm lg:text-base">
                                    <i class="fas fa-camera mr-2"></i>
                                    Actualizar imagen
                                    <input id="uploadImage1" name="card_img_path" type="file" class="hidden"
                                        accept="image/*" onchange="previewImage(1);" />
                                </label>
                            </div>
                            <img id="uploadPreview1"
                                class="object-contain w-full aspect-[4/3] border-[2px] bg-white border-blue-400 rounded-xl
                            @error('card_img_path') border-red-500 @enderror"
                                src="{{ Storage::url($training->card_img_path) }}" alt="">
                        </figure>
                        {{-- Alerta de validacion --}}
                        <x-input-error for="card_img_path" />
                    </div>

                    <div class="col">
                        <x-label class="font-black">
                            Imagen de portada
                        </x-label>
                        <x-label class="mb-1">
                            (Formatos aceptados: JPG, JPEG, PNG, SVG. / Máx: 1mb)
                        </x-label>
                        <figure class="relative">
                            <div class="absolute top-4 right-4">
                                <label
                                    class="flex items-center px-2.5 py-1.5 lg:px-4 lg:py-2 rounded-lg btn-blue cursor-pointer text-sm lg:text-base">
                                    <i class="fas fa-camera mr-2"></i>
                                    Actualizar imagen
                                    <input id="uploadImage2" name="cover_img_path" type="file" class="hidden"
                                        accept="image/*" onchange="previewImage(2);" />
                                </label>
                            </div>
                            <img id="uploadPreview2"
                                class="object-contain w-full aspect-[4/3] border-[2px] bg-white border-blue-400 rounded-xl
                            @error('cover_img_path') border-red-500 @enderror"
                                src="{{ Storage::url($training->cover_img_path) }}" alt="">
                        </figure>
                        {{-- Alerta de validacion --}}
                        <x-input-error for="cover_img_path" />
                    </div>
                </div>

                {{-- Nombre --}}
                <div>
                    <x-label for="name" class="mb-1 font-black">
                        Nombre
                    </x-label>
                    <x-input class="w-full" placeholder="Ingrese el nombre de la capacitación" id="name"
                        name="name" value="{{ old('name', $training->name) }}" />
                    <x-input-error for="name" />
                    <x-input-error for="slug" />
                </div>

                {{-- Descripción --}}
                <div>
                    <x-label for="description" class="mb-1 font-black">
                        Descripción de la capacitación
                    </x-label>
                    <textarea name="description" id="description"
                        class="w-full min-h-[150px] border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        placeholder="Ingrese una descripción de la capacitación (Opcional)" name="">{{ old('description', $training->description) }}</textarea>
                    <x-input-error for="description" />

                </div>

                {{-- <div>
                    <x-label class="mb-1 font-black">
                        Información adicional de la capacitación
                    </x-label>
                    <textarea name="additional_info"
                        class="w-full min-h-[350px] border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        placeholder="Puedes agregar información adicional del servicio (Opcional)" name="">{{ old('additional_info', $training->additional_info) }}</textarea>
                </div> --}}

                <div class="flex justify-end pt-4">
                    {{-- Eliminar --}}
                    <x-danger-button onclick="confirmDelete()">
                        Eliminar
                    </x-danger-button>

                    <x-button class="ml-2">
                        Actualizar datos
                    </x-button>
                </div>

            </div>

        </form>

        {{-- Temas de la capacitación --}}
        <div class="card mt-6 space-y-4" id="topics">

            <x-admin.section-title>
                <x-slot name="title">Lista de temas</x-slot>
                <x-slot name="description">Agrega, edita o elimina temas de esta capacitación.</x-slot>
            </x-admin.section-title>

            {{-- Listado de temas --}}
            <livewire:admin.trainings.training-topics :training="$training" />

        </div>

    </div>


    {{-- Formulario que será enviado al presionar "Eliminar" --}}
    <form id="delete-form" action="{{ route('admin.trainings.destroy', $training) }}" method="POST">
        @csrf
        @method('DELETE')
    </form>

    @push('js')
        <script>
            //Previsualizar imagen
            function previewImage(nb) {
                var reader = new FileReader();
                reader.readAsDataURL(document.getElementById('uploadImage' + nb).files[0]);
                reader.onload = function(e) {
                    document.getElementById('uploadPreview' + nb).src = e.target.result;
                };
            }

            //Alerta de confirmar eliminar
            function confirmDelete() {
                Swal.fire({
                    title: "¿Estás seguro de eliminar la capacitación?",
                    text: "¡No podrás revertir esto!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "¡Sí, borralo!",
                    cancelButtonText: "Cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form').submit();
                    }

                });

            }
        </script>
    @endpush

</x-admin-layout>
