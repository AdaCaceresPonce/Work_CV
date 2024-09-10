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
    {{-- <x-page-cover :image="Storage::url($contents['cover_img'])" :name="$contents['cover_title']" :id="'cover'" />  --}}

    {{-- Info adicional de la clínica --}}
<section id="free_content_1" class="py-2 mt-0"> <!-- Reducir el padding vertical -->
    <x-container class="px-1 section__spacing"> <!-- Reducir el padding horizontal -->
        
    </x-container>
</section>
    
</x-app-layout>
