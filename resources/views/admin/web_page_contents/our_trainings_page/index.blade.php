@php
    $page_sections = [
        [
            'name' => 'Sección de Portada',
            'id' => '#cover',
        ],

        [
            'name' => 'Sección de Servicios',
            'id' => '#trainings',
        ],

        [
            'name' => 'Sección de Lista de Capacitaciones',
            'id' => '#trainings_list',
        ],

    ];
@endphp

<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Página Capacitaciones',
    ],
]">

<div class="max-w-[1230px] mx-auto">

    <x-validation-errors class="mb-3 p-4 border-2 border-red-500 rounded-md"/>

    <div class="text-sm md:text-base mb-3 p-4 border border-gray-800 border-l-4">
        {{-- <p class="mb-3">
            Aquí puedes modificar los contenidos que se muestran en la <strong>Página de Inicio</strong>, se recomienda considerar los colores representativos del sitio y cargar las imágenes de acuerdo a lo recomendado. Al final de esta página se encuentra el botón para guardar todos los cambios.
        </p> --}}

        <p class="mb-2">
            Para una rápida navegación estas son las secciones de ésta página:
        </p>

        <ul class="list-disc list-inside">
            
            @foreach ($page_sections as $section)

                <li><a class="no-underline hover:underline hover:underline-offset-2 text-blue-800" href="{{ $section['id'] }}">{{ $section['name'] }}</a></li>

            @endforeach
            
        </ul>
    </div>

    <form action="{{ route('admin.our_trainings_page_content.update', $contents) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="card-gray space-y-14">

            {{-- Seccion de portada --}}
            <section id="cover">
                
                <x-page-section-title :section_title="'Sección de portada'" :route_name="'our_trainings.index'" :section_id="'#cover'" />

                {{-- Columnas --}}
                <div class="grid grid-cols-1 xl:grid-cols-2 gap-4 xl:gap-6">
                    <div class="space-y-4">

                        <div>
                            <x-label for="cover_title" class="mb-1 mt-2 text-[15px] font-black">
                                Título
                            </x-label>
        
                            <x-input class="w-full" id="cover_title" placeholder="Ingrese el título a mostrar en la portada" name="cover_title"
                                value="{{ old('cover_title', $contents['cover_title'] ) }}" />
                            <x-input-error for="cover_title" />
                        </div>
        
                    </div>
                    <div class="h-full">
                        
                        <div class="mb-1 mt-2">

                            <x-label>
                                Imagen
                                <x-form-tooltip formats="JPG, JPEG, PNG, SVG, WEBP" maxSize="1MB" dimensions="2400x1600px" />
                            </x-label>

                        </div>

                        <figure class="relative">
                            <div class="absolute top-4 right-4">
                                <label
                                    class="flex items-center px-2.5 py-1.5 lg:px-4 lg:py-2 rounded-lg btn-blue cursor-pointer text-sm lg:text-base">
                                    <i class="fas fa-camera mr-2"></i>
                                    Actualizar imagen
                                    <input id="uploadImage1" name="cover_img" type="file" class="hidden"
                                        accept="image/*" onchange="previewImage(1);" />
                                </label>
                            </div>
                            <img id="uploadPreview1"
                                class="object-contain h-full w-full aspect-[3/2] border-[2px] bg-white border-blue-400 @error('cover_img') border-red-500 @enderror rounded-xl"
                                src="{{ Storage::url( $contents['cover_img']) }}" alt="">
                        </figure>

                        <x-input-error class="mt-1" for="cover_img" />

                    </div>

                </div>

            </section>

            {{-- Sección con texto Sobre Capacitaciones --}}
            <section id="trainings">
                
                <x-page-section-title :section_title="'Sección sobre Capacitaciones Profesionales'" :route_name="'our_trainings.index'" :section_id="'#trainings'" />
                
                {{-- Columnas --}}
                <div class="grid grid-cols-1 xl:grid-cols-2 gap-4 xl:gap-6">
                    
                    <div class="space-y-4">
                        <div>
                            <x-label class="mb-1 mt-2 text-[15px] font-black">
                                Título
                            </x-label>
        
                            <div class="rounded-lg @error('our_trainings_title') border-[2px] border-red-500 @enderror">
                                <textarea class="textarea" name="our_trainings_title">
                                    @if (isset($contents['our_trainings_title']))
                                    {{ old('our_trainings_title', $contents['our_trainings_title'] ) }}
                                    @endif
                                    </textarea>
                            </div>

                            <x-input-error class="mt-1" for="our_trainings_title" />

                        </div>
        
                        <div>
                            <x-label class="mb-1 text-[15px] font-black">
                                Descripcion
                            </x-label>
                            
                            <div class="rounded-lg @error('our_trainings_description') border-[2px] border-red-500 @enderror">
                                <textarea class="textarea" name="our_trainings_description">
                                    @if (isset($contents['our_trainings_description']))
                                    {{ old('our_trainings_description', $contents['our_trainings_description'] ) }}
                                    @endif
                                    </textarea>
                            </div>
                            
                            <x-input-error class="mt-1" for="our_trainings_description" />
                                
                        </div>
                    </div>
                    <div class="h-full flex flex-col">

                        <div class="mb-1 mt-2">

                            <x-label>
                                Imagen
                                <x-form-tooltip formats="JPG, JPEG, PNG, SVG, WEBP" maxSize="1MB" dimensions="1200x800px" />
                            </x-label>

                        </div>

                        <figure class="grow relative">
                            <div class="absolute top-4 right-4">
                                <label
                                    class="flex items-center px-2.5 py-1.5 lg:px-4 lg:py-2 rounded-lg btn-blue cursor-pointer text-sm lg:text-base">
                                    <i class="fas fa-camera mr-2"></i>
                                    Actualizar imagen
                                    <input id="uploadImage2" name="our_trainings_img" type="file" class="hidden"
                                        accept="image/*" onchange="previewImage(2);" />
                                </label>
                            </div>
                            <img id="uploadPreview2"
                                class="object-contain w-full h-full aspect-[3/2] border-[2px] bg-white border-blue-400 @error('our_trainings_img') border-red-500 @enderror rounded-xl"
                                src="{{ Storage::url( $contents['our_trainings_img']) }}" alt="">
                        </figure>

                        <x-input-error class="mt-1" for="our_trainings_img" />
                        
                    </div>

                </div>
            </section>

            {{-- Seccion de Lista de Capacitaciones --}}
            <section id="trainings_list">

                <x-page-section-title :section_title="'Sección sobre las capacitaciones que se ofrecen'" :route_name="'our_trainings.index'" :section_id="'#trainings_list'" />

                {{-- Columnas --}}
                <div class="grid grid-cols-1">
                    <div>

                        <x-label class="mb-1 mt-2 text-[15px] font-black">
                            Título
                        </x-label>
    
                        <div class="rounded-lg @error('trainings_we_offer_title') border-[2px] border-red-500 @enderror">
                            <textarea class="textarea" name="trainings_we_offer_title">
                            @if (isset($contents['trainings_we_offer_title']))
                            {{ old('trainings_we_offer_title', $contents['trainings_we_offer_title'] ) }}
                            @endif
                            </textarea>
                        </div>

                        <x-input-error class="mt-1" for="trainings_we_offer_title" />

                    </div>

                </div>

            </section>

            {{-- Botón actualizar --}}
            <div class="flex justify-end">

                <x-button class="ml-2">
                    Guardar todos los cambios
                </x-button>

            </div>

        </div>
    </form>
</div>

    @push('js')
        {{-- TinyMCE --}}
        @include('layouts.partials.admin.scripts.tinymce-scripts')

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                tinymce.init({
                    selector: '.textarea',
                    height: 220,
                    language: 'es',
                    menubar: false,
                    toolbar: 'undo redo | formatselect | ' +
                        'bold | forecolor |' +
                        '| bullist numlist | ' +
                        'removeformat',
                });
            });

            //Previsualizar imagen
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