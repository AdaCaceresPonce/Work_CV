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
                                    <span class="text-base sm:text-lg lg:text-xl">{{ $employment->job_title }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        </x-container>
    </section>

    {{-- Formación Académica --}}
    <section id="academic_backgrounds""> <!-- Reducir el padding vertical -->
        <x-container class="px-4 section__spacing">
            <div class="text-center sm:px-4 lg:px-8"> <!-- Reducir margin-bottom y padding-bottom -->

                <div class="text-2xl lg:text-3xl leading-tight lg:leading-tight font-bold">
                    <span class="block">{!! $contents['academic_backgrounds_title'] !!}</span>
                    <div class="flex justify-center mt-4 lg:mt-4">
                        <div class="w-20 h-1 bg-primary"></div>
                    </div>
                </div>

                <div class="mt-6 md:mt-10 border-2 border-[#e4e4e4] rounded-xl p-8 shadow-md">
                    <!-- Borde verde delgado alrededor -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6"> <!-- Cuadrados internos -->

                        @foreach ($academic_backgrounds as $degree)
                            <div
                                class="w-full h-48 bg-[#E1E1B7] border-l-8 border-l-[#689f38] flex flex-col justify-center p-6">
                                <h3 class="text-lg sm:text-xl font-bold mb-2">{{ $degree->degree_name }}</h3>
                                <p class="text-base mt-2">{{ $degree->institution_name }}</p>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </x-container>
    </section>

    <!-- Aptitudes -->
    <section class="mt-4" id="skills">
        <x-container class="px-4 section__spacing">

            <div class="flex items-center flex-col lg:flex-row gap-6 md:gap-7">

                {{-- Texto --}}
                <div class="w-full lg:w-1/2 px-4 space-y-6 md:space-y-10">

                    <div class="relative">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17 2" class="w-full">
                            <path d="M 0 0 L 17 0 L 16 2 L 0 2 L 0 0" fill="#689F38" />
                        </svg>
                    
                        <span class="absolute inset-0 flex items-center justify-start pl-10 text-white font-bold z-10
                        text-2xl lg:text-3xl leading-tight lg:leading-tight font-bold">
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

                {{-- Imagen --}}
                <div class="w-full lg:w-1/2 flex justify-center px-0 sm:px-32 md:px-40 lg:px-8 xl:px-10">

                    <img class="size-full aspect-[4/4] lg:max-h-[470px] lg:w-full object-cover md:object-top object-top border-[4px] rounded-xl"
                        src="{{ Storage::url($contents['my_skills_img']) }}" alt="">
                </div>
            </div>

        </x-container>


    </section>

</x-app-layout>
