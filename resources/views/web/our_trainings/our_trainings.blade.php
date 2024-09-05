<x-app-layout>
    <x-slot name="title">
        Mis Capacitaciones
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
    
    <section id="trainings" class="bg-tertiary">
        
        <x-container class="px-4 section__spacing">

            <div class="flex items-center flex-col-reverse lg:flex-row gap-7">

                

                {{-- Texto --}}
                <div class="w-full lg:w-1/2 px-4">
                    <span class="text-3xl lg:text-4xl leading-tight lg:leading-tight font-bold">
                        {!! $contents['our_trainings_title'] !!}
                        
                    </span>
                    <div class="mt-4">
                        <span>
                            {!! $contents['our_trainings_description'] !!}
                        </span>
                    </div>
                    
                </div>

                {{-- Imagen --}}
                <div class="w-full lg:w-1/2 mt-8 lg:mt-0 flex justify-center px-0 sm:px-32 md:px-40 lg:px-8 xl:px-10">
                    <img class="size-full aspect-[4/5] lg:max-h-[540px] lg:w-full object-cover md:object-top object-center border-[4px] border-tertiary-border rounded-xl"
                        src="{{ Storage::url($contents['our_trainings_img']) }}" alt="">
                </div>
            </div>
        </x-container>
    </section>

    {{-- Info adicional de la clínica --}}
    <section id="free_content_1" class="py-2 mt-0"> <!-- Reducir el padding vertical -->
        <x-container class="px-1 section__spacing"> <!-- Reducir el padding horizontal -->

        </x-container>
    </section>

</x-app-layout>
