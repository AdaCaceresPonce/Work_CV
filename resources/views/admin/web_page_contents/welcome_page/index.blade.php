<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Página Inicio',
    ],
]">

    <form action="{{ route('admin.welcome_page_content.update', $contents) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-gray mx-auto max-w-[1230px] space-y-12 divide-y-4 divide-blue-500">

            {{-- Seccion de portada --}}
            <section>
                <div class="mb-1 section__title__container">

                    {{-- Nombre de seccion --}}
                    <span class="text-2xl font-bold mr-1">
                        Sección de portada
                    </span>

                    {{-- Botón de redireccion a la web --}}
                    <a href="{{ route('welcome.index') }}#cover" target="_blank"
                        class="section__button">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                </div>

                {{-- Columnas --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-6">
                    <div class="space-y-4">

                        <div>
                            <x-label class="mb-1 mt-2 text-[15px] font-black">
                                Título
                            </x-label>
        
                            <textarea class="textarea" name="cover_title">
                            @if (isset($contents['cover_title']))
                            {{ old('cover_title', $contents['cover_title'] ) }}
                            @endif
                            </textarea>
                        </div>
        
                        <div>
                            <x-label class="mb-1 text-[15px] font-black">
                                Descripcion
                            </x-label>
        
                            <textarea class="textarea" name="cover_description">
                                @if (isset($contents['cover_description']))
                                {{ old('cover_description', $contents['cover_description'] ) }}
                                @endif
                                </textarea>
                        </div>
                    </div>
                    <div class="h-full flex flex-col">
                        <div>
                            <x-label class="mb-1 mt-2 text-[15px] font-black">
                                Imagen
                            </x-label>
                        </div>

                        <div class="grow bg-yellow-400">

                        </div>
                    </div>

                </div>

            </section>

            {{-- Seccion de Info Clinica --}}
            <section class="section">
                <div class="section__title__container">
                    <span class="text-2xl font-bold mr-1">
                        Sección de detalles de la Clínica
                    </span>
                    <a href="{{ route('welcome.index') }}#clinic_about" target="_blank"
                        class="px-3 py-2 text-white bg-[#0075FF] rounded-xl">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                </div>

                {{-- Columnas --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-6">
                    <div class="space-y-4">

                        <div>
                            <x-label class="mb-1 mt-2 text-[15px] font-black">
                                Título
                            </x-label>
        
                            <textarea class="textarea" name="about_title">
                            @if (isset($contents['about_title']))
                            {{ old('about_title', $contents['about_title'] ) }}
                            @endif
                            </textarea>
                        </div>
        
                        <div>
        
                            <x-label class="mb-1 mt-2 text-[15px] font-black">
                                Descripcion
                            </x-label>
        
                            <textarea class="textarea" name="about_description">
                                @if (isset($contents['about_description']))
                                {{ old('about_description', $contents['about_description'] ) }}
                                @endif
                                </textarea>
            
                        </div>
                    </div>
                    <div class="h-full flex flex-col">
                        <x-label class="mb-1 mt-2 text-[15px] font-black">
                            Lista de ofrecemos (Separa cada elemento de la lista usando una coma)
                        </x-label>

                        <x-input class="w-full" placeholder="Ingresa los elementos de la lista" name="about_we_offer_you"
                            value="{{ old('about_we_offer_you', $contents['about_we_offer_you']) }}" />

                        <x-label class="mb-1 mt-2 text-[15px] font-black">
                            Imagen
                        </x-label>
        
                        <div class="grow bg-yellow-400">

                        </div>
                    </div>

                </div>
            </section>
            
            {{-- Seccion de Servicios --}}
            <section class="section">
                <div class="section__title__container">
                    <span class="text-2xl font-bold mr-1">
                        Sección de Servicios
                    </span>
                    <a href="{{ route('welcome.index') }}#clinic_about" target="_blank"
                        class="px-3 py-2 text-white bg-[#0075FF] rounded-xl">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                </div>

                {{-- Columnas --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-6">
                    <div>

                        <x-label class="mb-1 mt-2 text-[15px] font-black">
                            Título
                        </x-label>
    
                        <textarea class="textarea" name="our_services_title">
                        @if (isset($contents['our_services_title']))
                        {{ old('our_services_title', $contents['our_services_title'] ) }}
                        @endif
                        </textarea>

                    </div>

                    <div>

                        <x-label class="mb-1 mt-2 text-[15px] font-black">
                            Descripción
                        </x-label>
    
                        <textarea class="textarea" name="our_services_description">
                        @if (isset($contents['our_services_description']))
                        {{ old('our_services_description', $contents['our_services_description'] ) }}
                        @endif
                        </textarea>

                    </div>


                </div>
            </section>

            {{-- Seccion de Profesionales --}}
            <section class="section">
                <div class="section__title__container">
                    <span class="text-2xl font-bold mr-1">
                        Sección de Profesionales
                    </span>
                    <a href="{{ route('welcome.index') }}#clinic_about" target="_blank"
                        class="px-3 py-2 text-white bg-[#0075FF] rounded-xl">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                </div>

                {{-- Columnas --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-6">
                    <div>

                        <x-label class="mb-1 mt-2 text-[15px] font-black">
                            Título
                        </x-label>
    
                        <textarea class="textarea" name="our_professionals_title">
                        @if (isset($contents['our_professionals_title']))
                        {{ old('our_professionals_title', $contents['our_professionals_title'] ) }}
                        @endif
                        </textarea>

                    </div>

                    <div>

                        <x-label class="mb-1 mt-2 text-[15px] font-black">
                            Descripción
                        </x-label>
    
                        <textarea class="textarea" name="our_professionals_description">
                        @if (isset($contents['our_professionals_description']))
                        {{ old('our_professionals_description', $contents['our_professionals_description'] ) }}
                        @endif
                        </textarea>

                    </div>

                </div>
            </section>

            {{-- Seccion de Opiniones --}}
            <section class="section">
                <div class="section__title__container">
                    <span class="text-2xl font-bold mr-1">
                        Sección de Opiniones
                    </span>
                    <a href="{{ route('welcome.index') }}#clinic_about" target="_blank"
                        class="px-3 py-2 text-white bg-[#0075FF] rounded-xl">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                </div>

                {{-- Columnas --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-6">
                    <div>

                        <x-label class="mb-1 mt-2 text-[15px] font-black">
                            Título
                        </x-label>
    
                        <textarea class="textarea" name="testimonials_title">
                        @if (isset($contents['testimonials_title']))
                        {{ old('testimonials_title', $contents['testimonials_title'] ) }}
                        @endif
                        </textarea>

                    </div>

                    <div>

                        <x-label class="mb-1 mt-2 text-[15px] font-black">
                            Descripción
                        </x-label>
    
                        <textarea class="textarea" name="testimonials_description">
                        @if (isset($contents['testimonials_description']))
                        {{ old('testimonials_description', $contents['testimonials_description'] ) }}
                        @endif
                        </textarea>

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

    <style>
        .section{
            padding-top: 48px;
        }
        .section__title__container{
            display: flex;
            align-items: center;
        }

        .section__button{
            @apply px-2 py-2 text-white bg-[#0075FF] rounded-lg;
        }
    </style>

    @push('js')
        {{-- TinyMCE --}}
        <script src="https://cdn.tiny.cloud/1/ptkarmvvxs48norvninijsbe8qx8zwy0ouzu9mp22f5kn99n/tinymce/6/tinymce.min.js"
            referrerpolicy="origin"></script>
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/plugins/language/langs/es.js" referrerpolicy="origin">
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                tinymce.init({
                    selector: '.textarea',
                    height: 200,
                    language: 'es',
                    menubar: false,
                    toolbar: 'undo redo | formatselect | ' +
                        'bold | forecolor |' +
                        '| bullist numlist | ' +
                        'removeformat',
                });
            });
        </script>
    @endpush
</x-admin-layout>