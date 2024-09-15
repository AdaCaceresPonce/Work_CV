<x-app-layout>
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
    {{-- Portada --}}
    <x-page-cover :image="Storage::url($contents['cover_img'])" :name="$contents['cover_title']" :id="'cover'" />

    {{-- Contactanos --}}
    {{-- LLamar a la seccion de contacto y pasarle el slug de la capacitación seleccionada (si es que se pasó mediante la ruta) --}}
    <x-contact-section training_selected="{{ $training }}" />

    {{-- <x-opinion-section /> --}}

    @push('js')
        {{-- SweetAlert --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        {{-- Alerta para livewire --}}
        <script>
            Livewire.on('swal', data => {
                Swal.fire(data[0]);
            });
        </script>
    @endpush

</x-app-layout>
