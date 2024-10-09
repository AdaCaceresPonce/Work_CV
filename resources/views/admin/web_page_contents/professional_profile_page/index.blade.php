@php
    $page_sections = [

        [
            'name' => 'Sección de Portada',
            'id' => '#cover',
        ],

        [
            'name' => 'Sección sobre el Historial Laboral',
            'id' => '#employment_history',
        ],

        [
            'name' => 'Sección sobre los Grados Académicos',
            'id' => '#academic_backgrounds',
        ],

        [
            'name' => 'Sección sobre las Aptitudes',
            'id' => '#skills',
        ],

        [
            'name' => 'Sección sobre las Producciones',
            'id' => '#productions',
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

        <div class="text-xs md:text-base mb-3 p-4 border border-gray-800 border-l-4">
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


        <form action="{{ route('admin.curriculum_page_content.update', $contents) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-gray w-full space-y-14">

                {{-- Seccion de portada (tiene imagen) --}}
                <section id="cover">
                    
                    <x-page-section-title :section_title="'Sección de portada'" :route_name="'professional_profile.index'" :section_id="'#cover'" />

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
                            <div>
                                <x-label class="mt-2 text-[15px] font-black">
                                    Imagen
                                </x-label>
                                <x-label class="mb-1">
                                    (Formatos aceptados: JPG, JPEG, PNG, SVG. / Máx: 1mb)
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

                {{-- Seccion sobre el Historial Laboral (tiene imagen) --}}
                <section id="employment_history">

                    <x-page-section-title :section_title="'Sección sobre el Historial Laboral'" :route_name="'professional_profile.index'" :section_id="'#employment_history'" />

                    {{-- Columnas --}}
                    <div class="grid grid-cols-1 xl:grid-cols-2 gap-4 xl:gap-6">
                        <div>

                            <x-label for="employment_history_title" class="mb-1 mt-2 text-[15px] font-black">
                                Título
                            </x-label>

                            <div class="rounded-lg @error('employment_history_title') border-[2px] border-red-500 @enderror">
                                <textarea id="employment_history_title" class="textarea" name="employment_history_title">
                                @if (isset($contents['employment_history_title']))
                                {{ old('employment_history_title', $contents['employment_history_title'] ) }}
                                @endif
                                </textarea>
                            </div>

                            <x-input-error class="mt-1" for="employment_history_title" />

                        </div>

                        <div class="max-w-[650px] mx-auto">
                            <div>
                                <x-label class="mt-2 text-[15px] font-black">
                                    Imagen
                                </x-label>
                                <x-label class="mb-1">
                                    (Formatos aceptados: JPG, JPEG, PNG, SVG. / Máx: 1mb)
                                </x-label>
                            </div>
                            <figure class="relative">
                                <div class="absolute top-4 right-4">
                                    <label
                                        class="flex items-center px-2.5 py-1.5 lg:px-4 lg:py-2 rounded-lg btn-blue cursor-pointer text-sm lg:text-base">
                                        <i class="fas fa-camera mr-2"></i>
                                        Actualizar imagen
                                        <input id="uploadImage2" name="employment_history_img" type="file" class="hidden"
                                            accept="image/*" onchange="previewImage(2);" />
                                    </label>
                                </div>
                                <img id="uploadPreview2"
                                    class="object-contain w-full aspect-[3/2] border-[2px] bg-white border-blue-400 @error('employment_history_img') border-red-500 @enderror rounded-xl"
                                    src="{{ Storage::url( $contents['employment_history_img']) }}" alt="">
                            </figure>
    
                            <x-input-error class="mt-1" for="employment_history_img" />
                            
                        </div>

                    </div>

                </section>
                
                {{-- Seccion sobre los Grados Académicos --}}
                <section id="academic_backgrounds">

                    <x-page-section-title :section_title="'Sección sobre los Grados Académicos'" :route_name="'professional_profile.index'" :section_id="'#academic_backgrounds'" />

                    {{-- Columnas --}}
                    <div class="grid grid-cols-1">
                        <div>

                            <x-label class="mb-1 mt-2 text-[15px] font-black">
                                Título
                            </x-label>

                            <div class="rounded-lg @error('academic_backgrounds_title') border-[2px] border-red-500 @enderror">
                                <textarea class="textarea" name="academic_backgrounds_title">
                                @if (isset($contents['academic_backgrounds_title']))
                                {{ old('academic_backgrounds_title', $contents['academic_backgrounds_title'] ) }}
                                @endif
                                </textarea>
                            </div>

                            <x-input-error class="mt-1" for="academic_backgrounds_title" />


                        </div>

                    </div>
                </section>

                {{-- Seccion sobre las Aptitudes --}}
                <section id="skills">

                    <x-page-section-title :section_title="'Sección sobre las Aptitudes'" :route_name="'professional_profile.index'" :section_id="'#skills'" />

                    {{-- Columnas --}}
                    <div class="grid grid-cols-1 xl:grid-cols-2 gap-4 xl:gap-6">
                        <div class="space-y-4">

                            <div>
                                <x-label for="my_skills_title" class="mb-1 mt-2 text-[15px] font-black">
                                    Título
                                </x-label>
            
                                <x-input class="w-full" id="my_skills_title" placeholder="Ingrese el título a mostrar en la portada" name="my_skills_title"
                                    value="{{ old('my_skills_title', $contents['my_skills_title'] ) }}" />
                                <x-input-error for="my_skills_title" />
                            </div>
            
                        </div>
                        <div class="h-full">
                            <div>
                                <x-label class="mt-2 text-[15px] font-black">
                                    Imagen
                                </x-label>
                                <x-label class="mb-1">
                                    (Formatos aceptados: JPG, JPEG, PNG, SVG. / Máx: 1mb)
                                </x-label>
                            </div>

                            <figure class="relative">
                                <div class="absolute top-4 right-4">
                                    <label
                                        class="flex items-center px-2.5 py-1.5 lg:px-4 lg:py-2 rounded-lg btn-blue cursor-pointer text-sm lg:text-base">
                                        <i class="fas fa-camera mr-2"></i>
                                        Actualizar imagen
                                        <input id="uploadImage3" name="my_skills_img" type="file" class="hidden"
                                            accept="image/*" onchange="previewImage(3);" />
                                    </label>
                                </div>
                                <img id="uploadPreview3"
                                    class="object-contain h-full w-full aspect-[3/2] border-[2px] bg-white border-blue-400 @error('my_skills_img') border-red-500 @enderror rounded-xl"
                                    src="{{ Storage::url( $contents['my_skills_img']) }}" alt="">
                            </figure>

                            <x-input-error class="mt-1" for="my_skills_img" />

                        </div>

                    </div>

                </section>

                {{-- Seccion sobre las Producciones --}}
                <section id="productions">

                    <x-page-section-title :section_title="'Sección sobre las Producciones'" :route_name="'professional_profile.index'" :section_id="'#productions'" />

                    {{-- Columnas --}}
                    <div class="grid grid-cols-1">
                        <div>

                            <x-label class="mb-1 mt-2 text-[15px] font-black">
                                Título
                            </x-label>

                            <div class="rounded-lg @error('my_productions_title') border-[2px] border-red-500 @enderror">
                                <textarea class="textarea" name="my_productions_title">
                                @if (isset($contents['my_productions_title']))
                                {{ old('my_productions_title', $contents['my_productions_title'] ) }}
                                @endif
                                </textarea>
                            </div>

                            <x-input-error class="mt-1" for="my_productions_title" />


                        </div>

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
