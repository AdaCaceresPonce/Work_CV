<x-app-layout>

    <x-slot name="title">
        Mi Currículum
    </x-slot>

    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>

    {{-- Portada --}}
    <x-page-cover :id="'cover'" :image="Storage::url($contents['cover_img'])" :name="$contents['cover_title']" />

    {{-- Historial Laboral --}}
    <section id="employment_history">
        <x-container class="px-4 section__spacing">

            <div class="flex items-center flex-col lg:flex-row gap-10 md:gap-7">

                {{-- Imagen --}}
                <div
                    class="w-full lg:w-1/2 flex justify-center px-0 sm:px-32 md:px-40 lg:px-8 xl:px-10 order-last lg:order-first">
                    <img class="size-full aspect-[4/4] lg:max-h-[470px] lg:w-full object-cover md:object-top object-center border-[4px] border-tertiary-border rounded-xl"
                        src="{{ Storage::url($contents['employment_history_img']) }}" alt="">
                </div>

                {{-- Texto --}}
                <div class="w-full lg:w-1/2 px-1 lg:pl-2">

                    <div class="max-w-[500px] lg:max-w-full mx-auto">
                        <div class="space-y-4">

                            <span class="web-section-title">
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
            </div>
        </x-container>
    </section>

    {{-- Formación Académica --}}
    <section id="academic_backgrounds""> <!-- Reducir el padding vertical -->
        <x-container class="px-4 section__spacing">

            <div class="text-center sm:px-4 lg:px-8"> <!-- Reducir margin-bottom y padding-bottom -->

                <div class="web-section-title">
                    <span class="block">{!! $contents['academic_backgrounds_title'] !!}</span>
                    <div class="flex justify-center mt-4 lg:mt-4">
                        <div class="w-20 h-1 bg-primary"></div>
                    </div>
                </div>

                <div class="mt-6 md:mt-10 mx-0 lg:mx-8 p-8 rounded-xl shadow-md">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6" style="grid-auto-rows: 1fr;">
                        @foreach ($academic_backgrounds as $degree)
                            <div
                                class="w-full h-full bg-gradient-to-r from-[#f5f5d8] to-[#cfcf96] border-l-4 border-l-primary flex flex-col justify-center px-8 py-12 rounded-lg shadow-md"
                                data-aos="zoom-in" data-aos-easing="ease"
                                data-aos-duration="700" data-aos-delay="{{ 50 + ($loop->index * 50) }}"
                                data-aos-anchor-placement="top-bottom">

                                <!-- Título del grado académico -->
                                <h3 class="text-xl sm:text-2xl font-bold text-[#333] mb-2">{{ $degree->degree_name }}
                                </h3>

                                <!-- Nombre de la institución -->
                                <p class="text-lg mt-2 text-[#555]">{{ $degree->institution_name }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>

        </x-container>
    </section>

    {{-- Producciones --}}
    <section id="productions">

        <x-container class="px-4 section__spacing">

            <div class="sm:px-4 lg:px-8"> <!-- Reducir margin-bottom y padding-bottom -->

                <div class="web-section-title text-center">
                    <span class="block">{!! $contents['my_productions_title'] !!}</span>
                    <div class="flex justify-center mt-4 lg:mt-4">
                        <div class="w-20 h-1 bg-primary"></div>
                    </div>
                </div>
                
                <div class="mt-6 md:mt-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($productions as $production)
                        <div class="bg-white shadow-lg rounded-lg overflow-hidden flex flex-col">
                            <div class="p-4 flex-grow">
                                <a href="{{ $production->url }}" target="_blank" class="text-lg text-indigo-600 hover:underline font-medium">
                                    {{ $production->title }}
                                </a>
                                <span class="block text-sm text-gray-600 mt-1">
                                    {{ $production->publication_date->format('d M, Y') }}
                                </span>
                                <p class="text-gray-700 mt-2">
                                    {{ $production->abstract ?? 'Resumen no disponible.' }}
                                </p>
                                @if($production->journal_name)
                                    <span class="block text-sm text-gray-500 mt-1 italic">
                                        {{ $production->journal_name }}
                                    </span>
                                @endif
                            </div>
                            <div class="bg-gray-100 p-4 text-right">
                                <a href="{{ $production->url }}" target="_blank" class="text-indigo-600 hover:underline">Leer más</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                


            </div>

        </x-container>


    </section>

    <!-- Aptitudes -->
    <section id="skills">
        <x-container class="px-4 section__spacing">

            <div class="flex items-center flex-col lg:flex-row gap-6 md:gap-7">

                {{-- Texto --}}
                <div class="w-full lg:w-1/2 px-1">

                    <div class="max-w-[500px] lg:max-w-full space-y-6 md:space-y-8 mx-auto">
                        <div class="relative">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17 2" class="w-full">
                                <path d="M 0 0 L 17 0 L 16 2 L 0 2 L 0 0" fill="#689F38" />
                            </svg>

                            <span
                                class="absolute inset-0 flex items-center justify-start pl-10 text-white z-10
                            web-section-title">
                                {!! $contents['my_skills_title'] !!}
                            </span>
                        </div>

                        <ul class="mt-2 md:mt-4 space-y-3"">

                            @foreach ($skills as $skill)
                                <li class="flex items-center gap-2 py-1 md:py-2">
                                    <img class="size-10 mr-1" src="{{ asset('img/elipse.png') }}" alt="">
                                    <span class="text-base sm:text-lg lg:text-xl"> {{ $skill->name }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>

                {{-- Imagen --}}
                <div class="w-full lg:w-1/2 flex justify-center px-0 sm:px-32 md:px-40 lg:px-8 xl:px-10">

                    <img class="size-full aspect-[4/4] lg:max-h-[470px] lg:w-full object-cover object-center border-[4px] rounded-xl"
                        src="{{ Storage::url($contents['my_skills_img']) }}" alt="">
                </div>
            </div>

        </x-container>


    </section>

</x-app-layout>
