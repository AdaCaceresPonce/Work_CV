<x-app-layout>
    {{-- <x-slot name="title">
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
    {{-- <x-page-cover :image="Storage::url($contents['cover_img'])" :name="$contents['cover_title']" :id="'cover'" /> --}}

    {{-- Info adicional de la clínica --}}
{{-- <section id="free_content_1" class="py-2 mt-0"> <!-- Reducir el padding vertical -->
    <x-container class="px-1 section__spacing"> <!-- Reducir el padding horizontal -->
        <div class="flex items-center flex-wrap-reverse"> --}}
            {{-- Imagen --}}
            {{-- <div class="w-full mt-2 lg:mt-0 lg:w-1/2 sm:px-1"> <!-- Reducir el margin-top y padding horizontal -->
                <img class="h-auto w-full max-h-[600px] object-cover object-center rounded-3xl"
                    src="{{ Storage::url($contents['free_img']) }}" alt="">
            </div> --}}

            {{-- Texto --}}
            {{-- <div class="w-full lg:w-1/2 px-1 lg:pl-2"> <!-- Reducir el padding horizontal -->
                <span class="text-2xl sm:text-4xl lg:text-4xl leading-tight py-2 relative text-[#8eb76a] inline-block">
                    Historial Laboral
                    <span class="absolute inset-x-0 bottom-0 border-b-4 border-[#8eb76a]"></span>
                </span> --}}
                {{-- <div>
                    {{-- <span class="text-3xl lg:text-4xl leading-tight lg:leading-tight">
                        {!! $contents['free_title_1'] ?? 'Título libre' !!}
                    </span> --}}
                    {{-- <div class="mt-1"> <!-- Reducir el margin-top -->
                        <span>
                            {!! $contents['free_description_1'] ?? 'Título por descripción' !!}
                        </span>
                    </div>
                </div> --}} 

            {{-- <div class="mt-2"> <!-- Reducir el margin-top --> --}}
                    {{-- <span class="text-3xl lg:text-4xl leading-tight lg:leading-tight">
                        {!! $contents['free_title_2'] ?? 'Título 2' !!}
                    </span>  --}}
                    {{-- <div class="mt-1"> <!-- Reducir el margin-top --> --}}
                        {{-- <span>
                            {!! $contents['free_description_2'] ?? 'Título por descripción 2' !!}
                        </span> --}}
                        {{-- <ul class="mt-4 space-y-3"> --}}
                            {{-- Dividir la cadena de texto en un array, con las 'comas' como delimitadores --}}
                            {{-- @php
                                $items = explode(',', $contents['about_we_offer_you'] ?? '');
                            @endphp --}}
{{--                 
                            @foreach ($items as $item)
                                <li class="flex items-center">
                                    <i class="fa-solid fa-circle-check text-2xl text-[#006400] mr-2"></i>
                                    <span class="text-base sm:text-lg lg:text-xl font-bold">{{ $item }}{!! $contents['free_description_1'] ?? 'Título por descripción' !!}</span>
                                </li>

                            @endforeach --}}
                        {{-- </ul>
                    </div>
                </div> 
            </div>
        </div>
    </x-container>
</section> --}} 
</x-app-layout>