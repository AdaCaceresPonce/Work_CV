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
        'name' => 'Crear Nuevo',
    ],
]">

<div class="mx-auto max-w-[1230px]">

    <x-validation-errors class="mb-3 p-4 border-2 border-red-500 rounded-md"/>

    <form action="{{ route('admin.trainings.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="card-gray space-y-4">

            <div>
                <span class="font-semibold text-xl">
                    Datos de la capacitación
                </span>
            </div>

            {{-- Nombre --}}
            <div>
                <x-label for="name" class="mb-1 font-black">
                    Nombre
                </x-label>
                <x-input class="w-full" placeholder="Ingrese el nombre de la capacitación" id="name" name="name"
                    value="{{ old('name') }}" />
                <x-input-error for="name" />
                <x-input-error for="slug" />
            </div>

            <div>
                <x-label for="description" class="mb-1 font-black">
                    Descripción
                </x-label>
                <textarea name="description" id="description"
                    class="w-full min-h-[100px] border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                    placeholder="Ingrese una descripción de la capacitación (Opcional)">{{ old('description') }}</textarea>
                <x-input-error for="description" />

            </div>
            
            {{-- Imagenes --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <div class="col lg:mb-0">
                    <x-label class="font-black">
                        Imagen de la tarjeta
                    </x-label>
                    <x-label class="mb-2">
                        (Formatos aceptados: JPG, JPEG, PNG, SVG. / Máx: 1mb)
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
                            src="{{ asset('img/no-image.jpg') }}" alt="">
                    </figure>
                    {{-- Alerta de validacion --}}
                    <x-input-error class="mt-1" for="card_img_path" />
                </div>

                <div class="col">
                    <x-label class="font-black">
                        Imagen de la portada
                    </x-label>
                    <x-label class="mb-2">
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
                            src="{{ asset('img/no-image.jpg') }}" alt="">
                    </figure>
                    {{-- Alerta de validacion --}}
                    <x-input-error class="mt-1" for="cover_img_path" />
                </div>
            </div>

            <div class="flex justify-end">
                <x-button>
                    Crear capacitación
                </x-button>
            </div>

        </div>
    </form>

</div>

    @push('js')
        <script>
            function previewImage(nb) {
                var reader = new FileReader();
                reader.readAsDataURL(document.getElementById('uploadImage' + nb).files[0]);
                reader.onload = function(e) {
                    document.getElementById('uploadPreview' + nb).src = e.target.result;
                };
            }
        </script>
    @endpush

</x-admin-layout>
