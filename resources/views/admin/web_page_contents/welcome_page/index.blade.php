@php
    $page_sections = [

        [
            'name' => 'Sección de Portada',
            'id' => '#cover',
        ],

        [
            'name' => 'Sección sobre el propósito de la Página',
            'id' => '#about',
        ],

        [
            'name' => 'Sección de listado de Capacitaciones',
            'id' => '#our_trainings',
        ],

        [
            'name' => 'Sección sobre por qué elegir las capacitaciones',
            'id' => '#why_choose_our_trainings',
        ],

    ];
@endphp

<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Página Inicio',
    ],
]">

    <div class="max-w-[1230px] mx-auto">

        <x-validation-errors class="mb-3 p-4 border-2 border-red-500 rounded-md"/>

        <div class="text-sm md:text-base mb-3 p-4 border border-gray-800 border-l-4">
            {{-- <p class="mb-3">
                Aquí puedes modificar los contenidos que se muestran en la <strong>Página de Inicio</strong>, se recomienda considerar los colores representativos del sitio y cargar las imágenes de acuerdo a lo recomendado. Al final de esta página se encuentra el botón para guardar todos los cambios.
            </p> --}}

            <p class="mb-2">
                Para una rápida navegación, estas son las secciones que se muestran en la página:
            </p>

            <ul class="list-disc list-inside">
                
                @foreach ($page_sections as $section)

                    <li><a class="no-underline hover:underline hover:underline-offset-2 text-blue-800" href="{{ $section['id'] }}">{{ $section['name'] }}</a></li>

                @endforeach
                
            </ul>
        </div>


        <form action="{{ route('admin.welcome_page_content.update', $contents) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-gray w-full space-y-14">

                {{-- Seccion de portada (tiene imagen) --}}
                <section id="cover">
                    
                    <x-page-section-title :section_title="'Sección de Portada'" :route_name="'welcome.index'" :section_id="'#cover'" />

                    {{-- Columnas --}}
                    <div class="grid grid-cols-1 xl:grid-cols-2 gap-4 xl:gap-6">
                        
                        {{-- Texto --}}
                        <div class="space-y-4">
                            <div>
                                <x-label class="mb-1 mt-2 text-[15px] font-black">
                                    Título
                                </x-label>
            
                                <div class="rounded-lg @error('cover_title') border-[2px] border-red-500 @enderror">
                                    <textarea class="textarea" name="cover_title">
                                        @if (isset($contents['cover_title']))
                                        {{ old('cover_title', $contents['cover_title'] ) }}
                                        @endif
                                        </textarea>
                                </div>

                                <x-input-error class="mt-1" for="cover_title" />

                            </div>
            
                            <div>
                                <x-label class="mb-1 text-[15px] font-black">
                                    Descripcion
                                </x-label>
                                
                                <div class="rounded-lg @error('cover_description') border-[2px] border-red-500 @enderror">
                                    <textarea class="textarea" name="cover_description">
                                        @if (isset($contents['cover_description']))
                                        {{ old('cover_description', $contents['cover_description'] ) }}
                                        @endif
                                        </textarea>
                                </div>
                                
                                <x-input-error class="mt-1" for="cover_description" />
                                    
                            </div>
                        </div>

                        {{-- Imagen --}}
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
                                        <input id="uploadImage1" name="cover_img" type="file" class="hidden"
                                            accept="image/*" onchange="previewImage(1);" />
                                    </label>
                                </div>
                                <img id="uploadPreview1"
                                    class="object-contain w-full h-full aspect-[3/2] border-[2px] bg-white border-blue-400 @error('cover_img') border-red-500 @enderror rounded-xl"
                                    src="{{ Storage::url( $contents['cover_img']) }}" alt="">
                            </figure>

                            <x-input-error class="mt-1" for="cover_img" />
                            
                        </div>

                    </div>

                </section>

                {{-- Seccion sobre el propósito de la página --}}
                <section id="about">

                    <x-page-section-title :section_title="'Sección sobre el propósito de la Página'" :route_name="'welcome.index'" :section_id="'#about'" />

                    {{-- Columnas --}}
                    <div class="grid grid-cols-1">

                        <div>
                            <x-label class="mb-1 mt-2 text-[15px] font-black">
                                Texto
                            </x-label>
        
                            <div class="rounded-lg @error('about_description') border-[2px] border-red-500 @enderror">
                                <textarea class="textarea" name="about_description">
                                    @if (isset($contents['about_description']))
                                    {{ old('about_description', $contents['about_description'] ) }}
                                    @endif
                                    </textarea>
                            </div>
                            
                            <x-input-error class="mt-1" for="about_description" />

                        </div>
                        
                    </div>
                </section>
                
                {{-- Seccion de lista de Capacitaciones --}}
                <section id="our_trainings">

                    <x-page-section-title :section_title="'Sección de Listado de capacitaciones'" :route_name="'welcome.index'" :section_id="'#our_trainings'" />

                    {{-- Columnas --}}
                    <div class="grid grid-cols-1 xl:grid-cols-2 gap-4 xl:gap-6">
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

                            <x-label class="mb-1 mt-2 text-[15px] font-black">
                                Descripción
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
                </section>

                {{-- Seccion sobre por què elegir las capacitaciones (tiene imagen) --}}
                <section id="why_choose_our_trainings">

                    <x-page-section-title :section_title="'Sección sobre por qué elegir las capacitaciones'" :route_name="'welcome.index'" :section_id="'#why_choose_our_trainings'" />

                    {{-- Columnas --}}
                    <div class="grid grid-cols-1 gap-4">
                        <div>

                            <x-label for="why_choose_our_trainings_title" class="mb-1 mt-2 text-[15px] font-black">
                                Título
                            </x-label>

                            <div class="rounded-lg @error('why_choose_our_trainings_title') border-[2px] border-red-500 @enderror">
                                <textarea id="why_choose_our_trainings_title" class="textarea" name="why_choose_our_trainings_title">
                                @if (isset($contents['why_choose_our_trainings_title']))
                                {{ old('why_choose_our_trainings_title', $contents['why_choose_our_trainings_title'] ) }}
                                @endif
                                </textarea>
                            </div>

                            <x-input-error class="mt-1" for="why_choose_our_trainings_title" />

                        </div>

                        <div>

                            <x-label for="why_choose_our_trainings_description" class="mb-1 mt-2 text-[15px] font-black">
                                Descripción
                            </x-label>

                            <div id="why_choose_our_trainings_description" class="rounded-lg @error('why_choose_our_trainings_description') border-[2px] border-red-500 @enderror">
                                <textarea class="textarea" name="why_choose_our_trainings_description">
                                @if (isset($contents['why_choose_our_trainings_description']))
                                {{ old('why_choose_our_trainings_description', $contents['why_choose_our_trainings_description'] ) }}
                                @endif
                                </textarea>
                            </div>

                            <x-input-error class="mt-1" for="why_choose_our_trainings_description" />

                        </div>

                    </div>

                    <div class="mt-6 max-w-[650px] mx-auto">

                        <div class="mb-1 mt-2">

                            <x-label>
                                Imagen
                                <x-form-tooltip formats="JPG, JPEG, PNG, SVG, WEBP" maxSize="1MB" dimensions="1200x800px" />
                            </x-label>

                        </div>

                        <figure class="relative">
                            <div class="absolute top-4 right-4">
                                <label
                                    class="flex items-center px-2.5 py-1.5 lg:px-4 lg:py-2 rounded-lg btn-blue cursor-pointer text-sm lg:text-base">
                                    <i class="fas fa-camera mr-2"></i>
                                    Actualizar imagen
                                    <input id="uploadImage2" name="why_choose_our_trainings_img" type="file" class="hidden"
                                        accept="image/*" onchange="previewImage(2);" />
                                </label>
                            </div>
                            <img id="uploadPreview2"
                                class="object-contain w-full aspect-[3/2] border-[2px] bg-white border-blue-400 @error('why_choose_our_trainings_img') border-red-500 @enderror rounded-xl"
                                src="{{ Storage::url( $contents['why_choose_our_trainings_img']) }}" alt="">
                        </figure>

                        <x-input-error class="mt-1" for="why_choose_our_trainings_img" />
                        
                    </div>

                </section>


                {{-- Botón actualizar --}}
                <div class="flex pt-6 justify-end">

                    <x-button class="ml-2">
                        Guardar todos los cambios
                    </x-button>

                </div>
            </div>
        </form>
    </div>
    <style>
        .section{
            padding-top: 34px;
        }
    </style>

    @push('js')

        {{-- TinyMCE --}}
        @include('layouts.partials.admin.scripts.tinymce-scripts')

        <script>

            tinymce.init({
                selector: '.textarea',
                height: 220,
                language: 'es',
                menubar: false,
                plugins: 'lists advlist',
                toolbar: 'undo redo | formatselect | ' +
                    'bold | forecolor |' +
                    '| bullist numlist | ' +
                    'removeformat',
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
