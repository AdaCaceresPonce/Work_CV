<x-app-layout>

    <x-slot name="title">
        Mi Curriculum
    </x-slot>

    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>

    @push('css')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @endpush

    {{-- Portada --}}
    <x-page-cover :id="'cover'" :image="Storage::url($contents['cover_img'])" :name="$contents['cover_title']" />

    {{-- Info adicional de la clínica --}}
    <section id="free_content_1" class="mt-0">
        <x-container class="px-4 section__spacing">

            <div class="flex items-center flex-col lg:flex-row gap-10 md:gap-7">

                {{-- Imagen --}}
                <div class="w-full lg:w-1/2 flex justify-center px-0 sm:px-32 md:px-40 lg:px-8 xl:px-10 order-last lg:order-first">
                    <img class="size-full aspect-[4/4] lg:max-h-[470px] lg:w-full object-cover md:object-top object-center border-[4px] border-tertiary-border rounded-xl"
                        src="{{ Storage::url($contents['employment_history_img']) }}" alt="">
                </div>

                {{-- Texto --}}
                <div class="w-full lg:w-1/2 px-1 lg:pl-2">
                    {{-- <span
                        class="text-2xl sm:text-4xl lg:text-4xl leading-tight py-2 relative text-[#8eb76a] inline-block">
                        {!! $contents['employment_history_title'] !!}
                        <span class="absolute inset-x-0 bottom-0 border-b-4 mt-8 border-[#8eb76a]"></span>
                    </span> --}}

                    <div class="space-y-2">
                        <span class="text-2xl lg:text-3xl leading-tight lg:leading-tight font-bold">
                            {!! $contents['employment_history_title'] !!}
                        </span>

                        <div class="bg-primary h-1 w-[180px]"></div>
                    </div>


                    <div class="mt-8"> <!-- Reducir el margin-top -->

                        <ul class="mt-4 space-y-3">

                            @foreach ($employment_history as $employment)
                                <li class="">
                                    {{-- <i class="fa-solid fa-circle-check text-2xl text-[#006400] mr-2"></i> --}}
                                    <span
                                        class="text-base sm:text-lg lg:text-xl">{{ $employment->job_title }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        </x-container>
    </section>

    {{-- Formación Académica --}}
    <section id="formacion_academica" class="mt-0"> <!-- Reducir el padding vertical -->
        <x-container class="px-1 section__spacing">
            <div class="mb-6 pb-6 text-center sm:px-4 lg:px-8"> <!-- Reducir margin-bottom y padding-bottom -->
                <div>
                    <span class="text-3xl sm:text-4xl lg:text-4xl leading-tight py-8 block relative text-[#8eb76a]">
                        {!! $contents['academic_backgrounds_title'] !!}
                        <span
                            class="absolute left-0 right-0 bottom-0 mx-auto border-b-4 border-[#8eb76a] w-1/5 mb-6"></span>
                    </span>
                </div>
                <div class="border-2 border-[#e4e4e4] rounded-xl p-8 shadow-md"> <!-- Borde verde delgado alrededor -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6"> <!-- Cuadrados internos -->

                        @foreach ($academic_backgrounds as $degree)
                            <div class="w-full h-48 bg-[#E1E1B7] border-l-8 border-l-[#689f38] flex flex-col justify-center p-6">
                                <h3 class="text-lg sm:text-xl font-bold mb-2">{{ $degree->degree_name }}</h3>
                                <p class="text-base mt-2">{{ $degree->institution_name }}</p>
                            </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </x-container>
    </section>

    <!-- Cuadrado pequeño separado -->
    <section class="mt-4">
        <x-container>
            <div class="mb-6 pb-6 relative w-45 h-15 bg-[#8eb76a] border-2  rounded-sm">
                <!-- Subrayado en el lado izquierdo -->
                <div class="absolute left-0 top-0 bottom-0 w-1 bg-[#006400]"></div>

                <!-- Parte derecha con forma de trapecio -->
                <div class="absolute right-0 top-0 bottom-0 w-8 bg-[#8eb76a] clip-path-trapezoid"></div>

                <!-- Contenido dentro del cuadrado -->
                <div class="p-2 text-white">
                    <h3 class="text-sm font-bold mb-1 justify-center">APTITUDES</h3>
                    {{-- <p class="text-xs">Cuadrado pequeño con fondo verde.</p> --}}
                </div>
            </div>
            <ul class="mt-4 space-y-3">
                {{-- Dividir la cadena de texto en un array, con las 'comas' como delimitadores --}}
                @php
                    $items = explode(',', $contents['about_we_offer_you'] ?? '');
                @endphp

                @foreach ($items as $item)
                    <li class="flex items-center">
                        <i class="fa-solid fa-circle-check text-2xl text-[#006400] mr-2"></i>
                        <span class="text-base sm:text-lg lg:text-xl font-bold">{{ $item }}</span>
                    </li>
                @endforeach
            </ul>
        </x-container>


    </section>

</x-app-layout>
