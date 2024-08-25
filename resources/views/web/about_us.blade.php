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
    <x-page-cover :image="Storage::url($contents['cover_img'])" :name="$contents['cover_title']" :id="'cover'" />

    {{-- Info adicional de la clínica --}}
    <section id="free_content_1" class="py-2 mt-0"> <!-- Reducir el padding vertical -->
        <x-container class="px-1 section__spacing"> <!-- Reducir el padding horizontal -->
            <div class="flex items-center flex-wrap-reverse">
                {{-- Imagen --}}
                <div class="w-full mt-2 lg:mt-0 lg:w-1/2 sm:px-1"> <!-- Reducir el margin-top y padding horizontal -->
                    <img class="h-auto w-full max-h-[600px] object-cover object-center border-4 border-[#00CAF7] rounded-3xl"
                        src="{{ Storage::url($contents['free_img']) }}" alt="">
                </div>

                {{-- Texto --}}
                <div class="w-full lg:w-1/2 px-1 lg:pl-2"> <!-- Reducir el padding horizontal -->
                    <div>
                        <span class="text-3xl lg:text-4xl leading-tight lg:leading-tight">
                            {!! $contents['free_title_1'] ?? 'Título libre' !!}
                        </span>
                        <div class="mt-1"> <!-- Reducir el margin-top -->
                            <span>
                                {!! $contents['free_description_1'] ?? 'Título por descripción' !!}
                            </span>
                        </div>
                    </div>

                    <div class="mt-2"> <!-- Reducir el margin-top -->
                        <span class="text-3xl lg:text-4xl leading-tight lg:leading-tight">
                            {!! $contents['free_title_2'] ?? 'Título 2' !!}
                        </span>
                        <div class="mt-1"> <!-- Reducir el margin-top -->
                            <span>
                                {!! $contents['free_description_2'] ?? 'Título por descripción 2' !!}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </x-container>
    </section>

    {{-- Formación Académica --}}
    <section id="formacion_academica" class="py-2 mt-0"> <!-- Reducir el padding vertical -->
        <x-container class="px-1 section__spacing">
            <div class="mb-6 pb-6 text-center sm:px-4 lg:px-8"> <!-- Reducir margin-bottom y padding-bottom -->
                <span class="text-3xl sm:text-4xl lg:text-4xl leading-tight py-8 block relative text-[#8eb76a]">
                    Formación Académica
                    <span class="absolute left-0 right-0 bottom-0 mx-auto border-b-4 border-[#8eb76a] w-1/5 mb-6"></span>
                </span>
                <div class="border-2 border-[#e4e4e4] rounded-md p-6"> <!-- Borde verde delgado alrededor -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2"> <!-- Cuadrados internos -->
                        <!-- Cuadrado 1 -->
                        <div
                            class="w-full h-48 bg-[#E1E1B7] border-l-8 border-l-[#689f38] flex flex-col justify-center p-4">
                            <h3 class="text-lg sm:text-xl font-bold mb-2">Dynamic Personalization:</h3>
                            <p class="text-xs sm:text-sm">Our platform leverages user data and behavior to provide a
                                highly personalized experience, with dynamic content and product recommendations that
                                change in real-time.</p>
                        </div>
                        <!-- Cuadrado 2 -->
                        <div
                            class="w-full h-48 bg-[#E1E1B7] border-l-8 border-l-[#689f38] flex flex-col justify-center p-4">
                            <h3 class="text-lg sm:text-xl font-bold mb-2">Dynamic Personalization:</h3>
                            <p class="text-xs sm:text-sm">Our platform leverages user data and behavior to provide a
                                highly personalized experience, with dynamic content and product recommendations that
                                change in real-time.</p>
                        </div>
                        <!-- Cuadrado 3 -->
                        <div
                            class="w-full h-48 bg-[#E1E1B7] border-l-8 border-l-[#689f38] flex flex-col justify-center p-4">
                            <h3 class="text-lg sm:text-xl font-bold mb-2">Dynamic Personalization:</h3>
                            <p class="text-xs sm:text-sm">Our platform leverages user data and behavior to provide a
                                highly personalized experience, with dynamic content and product recommendations that
                                change in real-time.</p>
                        </div>
                        <!-- Cuadrado 4 -->
                        <div
                            class="w-full h-48 bg-[#E1E1B7] border-l-8 border-l-[#689f38] flex flex-col justify-center p-4">
                            <h3 class="text-lg sm:text-xl font-bold mb-2">Dynamic Personalization:</h3>
                            <p class="text-xs sm:text-sm">Our platform leverages user data and behavior to provide a
                                highly personalized experience, with dynamic content and product recommendations that
                                change in real-time.</p>
                        </div>
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
        </x-container>
    </section>

</x-app-layout>
