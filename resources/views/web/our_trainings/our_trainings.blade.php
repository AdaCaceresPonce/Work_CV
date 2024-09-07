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

            <div class="flex items-center flex-col lg:flex-row gap-6 md:gap-7">

                {{-- Texto --}}
                <div class="w-full lg:w-1/2 px-4">

                    <div class="space-y-4">
                        <span class="text-2xl lg:text-3xl leading-tight lg:leading-tight font-bold">
                            {!! $contents['our_trainings_title'] !!}

                        </span>

                        <div class="bg-primary h-1 w-[180px]"></div>
                    </div>
                    <div class="mt-6">
                        <span>
                            {!! $contents['our_trainings_description'] !!}
                        </span>
                    </div>

                </div>

                {{-- Imagen --}}
                <div class="w-full lg:w-1/2 flex justify-center px-0 sm:px-32 md:px-40 lg:px-8 xl:px-10">
                    <img class="size-full aspect-[4/4] lg:max-h-[470px] lg:w-full object-cover md:object-top object-center border-[4px] border-tertiary-border rounded-xl"
                        src="{{ Storage::url($contents['our_trainings_img']) }}" alt="">
                </div>
            </div>
        </x-container>
    </section>


    <section id="trainings_list">

        <x-container class="px-4 section__spacing">
            <div>
                {{-- Titulo --}}
                <div class="w-full space-y-3">
                    <span class="text-xl lg:text-2xl leading-tight lg:leading-tight font-bold">
                        {!! $contents['trainings_we_offer_title'] !!}
                    </span>
                    <div class="bg-primary h-0.5 w-full"></div>
                </div>


                {{-- Capacitaciones --}}
                <div class="mt-5 md:mt-10 sm:px-8 md:px-0 lg:px-0 md:w-[684px] lg:w-full mx-auto">

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 xl:gap-8">

                        @foreach ($trainings as $training)

                            <article class="p-2 overflow-hidden rounded-xl">

                                <div
                                    class="w-full border-[1px] flex justify-center items-center rounded-lg overflow-hidden">

                                    <img src="{{ Storage::url($training->card_img_path) }}" alt="image"
                                        class="card__img aspect-[4/3] object-cover object-center w-full brightness-75">
                                </div>

                                <div class="space-y-8 mt-4">
                                    <h3 class="training__name text-base font-bold w-full">
                                        {{ $training->name ?? 'Nombre del servicio' }}
                                    </h3>
                                    <div class="flex justify-start">
                                        <a href="{{ route('our_trainings.show_training', $training) }}"
                                            class="items-center text-base font-bold text-secondary-contrast-1 bg-secondary border-2 border-secondary-border py-1.5 px-6 rounded-lg">
                                            Ver más
                                        </a>
                                    </div>

                                </div>
                            </article>
                        @endforeach

                    </div>

                    <div class="mt-8">
                        {{ $trainings->links() }}
                    </div>

                </div>

            </div>
        </x-container>

    </section>


    {{-- Info adicional de la clínica --}}
    {{-- <section id="free_content_1" class="py-2 mt-0"> <!-- Reducir el padding vertical -->
        <x-container class="px-1 section__spacing"> <!-- Reducir el padding horizontal -->

        </x-container>
    </section> --}}

</x-app-layout>
