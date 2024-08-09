<x-app-layout title="Inicio">

    <x-slot name="title">
        Inicio
    </x-slot>

    @push('css')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @endpush

    {{-- Quienes somos --}}
    <section id="clinic_about" class="bg-[#E3FFFE]">
        <x-container class="px-4 section__spacing">
            <div class="flex items-center flex-wrap">
                {{-- Texto --}}
                <div class="w-full lg:w-1/2 p-4 lg:pr-12">
                    <span class="text-3xl lg:text-4xl leading-tight lg:leading-tight">
                        {!! $contents['about_us_title'] ?? 'Título por Defecto' !!}

                    </span>

                    <div class="mt-4">
                        <span>
                            {!! $contents['about_us_description'] ?? 'Descripción por Defecto' !!}
                        </span>
                    </div>
                    
                </div>
                {{-- Imagen --}}
                <div class="w-full mt-10 lg:mt-0 lg:w-1/2 flex justify-center">
                    <div class="">

                        {{-- Circulo grande --}}
                        <div class="flex items-center 
                            size-[300px] bg-primary-contrast-2 sm:size-[400px]  md:size-[450px] lg:size-[500px] 
                            justify-center rounded-full border-[3.5px] border-primary relative">

                            {{-- Imagen circular con borde --}}
                            <img class="rounded-full 
                                size-[250px] sm:size-[340px] md:size-[390px] lg:size-[440px] 
                                border-[3.5px] border-primary bg-gray-100 object-cover object-center " src="{{ Storage::url($contents['about_us_img']) }}" alt="">

                            {{-- Bolitas del lado superior izquierdo --}}
                            <div class="bg-primary size-[14px] top-[18.6%] left-[6.2%] rounded-full 
                                sm:size-[18px] sm:top-[18.8%] 
                                md:size-[20px] md:top-[19.5%] md:left-[6.1%]
                                lg:size-[22px] lg:top-[19.5%] 
                                absolute inset-0">
                            </div>

                            <div class="bg-primary size-[18px] top-[26%] left-[1%] rounded-full 
                                sm:size-[24px] sm:top-[27%] sm:left-[0.5%]
                                md:size-[28px] md:top-[27.6%] md:left-[0.2%]
                                lg:size-[30px] lg:top-[27.4%] absolute inset-0">
                            </div>

                            <div class="bg-primary size-[24px] top-[36.33%] left-[-3.6%] rounded-full 
                                sm:size-[32px] sm:top-[38%]
                                md:size-[38px] md:top-[38%] md:left-[-4.2%]
                                lg:size-[42px] lg:top-[38.2%] lg:left-[-4%] absolute inset-0">
                            </div>

                            {{-- Bolitas del lado superior derecho --}}
                            <div class="bg-primary size-[14px] top-[-1%] left-[60%] rounded-full 
                                sm:size-[20px] sm:top-[-1%]
                                absolute inset-0">
                            </div>

                            <div class="bg-primary size-[44px] flex items-center justify-center top-[-3%] left-[67%] rounded-full 
                                sm:size-[60px] sm:top-[-3%]
                                absolute inset-0">

                                <i class="fa-solid fa-face-laugh-beam text-[30px]
                                    sm:text-[38px]
                                    text-primary-contrast-1 rotate-[20deg]"></i>

                            </div>

                            {{-- Bolitas del lado derecho al medio --}}
                            <div class="bg-primary size-[28px] top-[32%] left-[93.7%] rounded-full 
                                sm:size-[35px] sm:top-[31%]
                                md:size-[40px] md:top-[31%]
                                absolute inset-0">
                            </div>

                            <div class="bg-primary size-[20px] top-[45%] left-[97%] rounded-full 
                                sm:size-[26px] sm:top-[44%]
                                md:size-[27px] md:top-[44.4%]
                                absolute inset-0">
                            </div>

                            <div class="bg-primary size-[14px] top-[55.8%] left-[97.5%] rounded-full 
                                sm:size-[19px] sm:top-[55%]
                                md:size-[20px] md:top-[55%]
                                absolute inset-0">
                            </div>

                            {{-- Bolitas de la esquina inferior derecha --}}
                            <div class="bg-primary size-[16px] top-[80%] left-[85.8%] rounded-full absolute inset-0
                                sm:size-[18px] sm:top-[82%] sm:left-[84.7%]
                                md:size-[20px] md:top-[82%] md:left-[84.7%]">
                            </div>

                            <div class="bg-primary size-[44px] flex items-center justify-center top-[85%] left-[71%] rounded-full absolute inset-0
                                sm:size-[55px] sm:top-[86%] sm:left-[71%]
                                md:size-[59px] md:top-[87%] md:left-[71%]">
                                <i class="fa-solid fa-stethoscope text-primary-contrast-1 text-[25px] rotate-[-20deg]
                                    sm:text-[32px]"></i>
                            </div>

                            {{-- Bolitas de la esquina inferior izquierda --}}
                            <div class="bg-primary size-[14px] top-[93%] left-[25%] rounded-full absolute inset-0
                                sm:size-[18px] sm:top-[91.5%] sm:left-[23%]
                                md:size-[20px] md:top-[91.7%] md:left-[23%]">
                            </div>

                            <div class="bg-primary size-[44px] flex items-center justify-center top-[82%] left-[9%] rounded-full absolute inset-0
                                sm:size-[52px] sm:top-[81.1%] sm:left-[9%]
                                md:size-[57px] md:top-[81.1%] md:left-[9%]">
                                <i class="fa-solid fa-tooth text-primary-contrast-1 text-[25px] rotate-[-25deg]
                                    sm:text-[31px]
                                    md:text-[34px]"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-container>
    </section>

    {{-- Portada --}}
    <section class="w-full  brightness-90 contrast-150 bg-cover bg-no-repeat bg-center relative" id="cover"
        style="background-image: url('{{ Storage::url($contents['cover_img']) }}');">

        {{-- Fondo azulado para la imagen --}}
        <div class="bg-blue-700 bg-opacity-20 inset-0 absolute z-10">
        </div>

        <x-container
            class="px-2 sm:px-8 section__spacing 
            h-full flex align-middle items-center justify-center lg:justify-start relative z-20">

            {{-- Tarjeta de bienvenida --}}
            <div
                class="bg-[#EAFBFF] bg-opacity-65 sm:bg-opacity-75 rounded-3xl px-6 py-10 sm:px-11 sm:py-12 max-w-[570px] text-center lg:text-start">

                <span class="text-3xl sm:text-4xl lg:text-5xl leading-tight lg:leading-tight">
                    {{-- Prepárate para una <span class="text-[#0075FF]"> grandiosa experiencia dental.</span> --}}
                    {!! $contents['cover_title'] ?? 'Titulo predeterminado' !!}
                </span>

                <div class="mt-6">
                    <span class="text-base lg:text-lg font-medium">
                        {!! $contents['cover_description'] ?? 'Titulo de descripcion' !!}
                    </span>
                </div>

                <div class="mt-8 sm:mt-12">
                    <a href=" {{ route('contact_us.index') }}" class="text-base inline-flex lg:text-xl text-white px-8 py-4 bg-blue-600 rounded-xl">
                        Agenda una cita
                    </a>
                </div>

            </div>
        </x-container>
    </section>

    {{-- Confianza --}}
    <section id="clinic_about">
        <x-container class="px-4 section__spacing">
            <div class="flex items-center flex-wrap-reverse">

                <div class="w-full lg:w-1/2">
                    <img class="h-[450px] sm:h-[550px] lg:h-[670px] w-full object-cover object-center border-[4px] border-[#00CAF7] rounded-3xl"
                        src="{{ Storage::url($contents['about_image']) }}" alt="">
                </div>

                <div class="w-full lg:w-1/2 px-4 pb-10 sm:px-20 lg:pl-16 lg:pr-0 lg:pb-0 text-start">

                    <span class="text-3xl sm:text-4xl lg:text-5xl leading-tight lg:leading-tight font-bold">
                        {{-- Una Clínica Dental en la que puedes <span class="text-[#0075FF]">confiar.</span> --}}
                        {!! $contents['about_title'] ?? 'titulo acerca de' !!}
                    </span>

                    <div class="mt-7">
                        <span class="text-base sm:text-lg lg:text-lg">
                            {!! $contents['about_description'] ?? 'descripcion acerca de nosotros' !!}
                        </span>
                    </div>

                    <p class="text-base font-bold sm:text-lg lg:text-xl mt-8">
                        Te ofrecemos:
                    </p>

                    <ul class="mt-4 space-y-3">
                        {{-- Dividir la cadena de texto en un array, con las 'comas' como delimitadores --}}
                        @php
                            $items = explode(',', $contents['about_we_offer_you'] ?? '');
                        @endphp

                        @foreach ($items as $item)
                            <li class="flex items-center">
                                <i class="fa-solid fa-circle-check text-2xl text-[#0075FF] mr-2"></i>
                                <span class="text-base sm:text-lg lg:text-xl font-bold">{{ $item }}</span>
                            </li>
                        @endforeach
                    </ul>

                    <div class="mt-9 flex justify-start">
                        <a href="{{ route('about_us.index') }}"
                            class="text-white text-lg font-medium bg-blue-700 py-3 px-6 rounded-lg">
                            Conócenos
                        </a>
                    </div>

                </div>
            </div>
        </x-container>
    </section>

    {{-- Servicios --}}
    <section id="services">
        <x-container class="px-4 section__spacing flex-col">
            {{-- Titulo --}}
            <div class="mb-6 pb-4 text-center sm:px-15 lg:px-40">
                <div>
                    <span class="text-3xl sm:text-4xl lg:text-4xl leading-tight lg:leading-tight">
                        {!! $contents['our_services_title'] !!}
                    </span>
                </div>
                <div class="mt-3">
                    <span class="text-base sm:text-lg lg:text-xl">
                        {!! $contents['our_services_description'] !!}
                    </span>
                </div>
            </div>

            {{-- Slider --}}
            <livewire:web.sliders.slider-services lazy/>
            
            {{-- Ver todos los servicios --}}
            <div class="flex w-full justify-center">
                <a href="{{ route('our_services.index') }}" class="text-white text-lg font-medium bg-blue-700 py-3 px-6 rounded-lg">
                    Ver todos los servicios
                </a>
            </div>
        </x-container>
    </section>

    {{-- Profesionales --}}
    <section class="bg-[#DEFFFE] border-y-[3px] border-y-[#00CAF7]" id="professionals">
        <x-container class="px-4 section__spacing">
            <div class="">
                {{-- Titulo --}}
                <div class="mb-5 px-2 sm:px-4 text-center sm:px-15 lg:px-40">
                    <div>
                        <span class="text-3xl sm:text-4xl lg:text-4xl leading-tight lg:leading-tight">
                            {!! $contents['our_professionals_title'] !!}
                        </span>
                    </div>
                    <div class="mt-3">
                        <span class="text-base sm:text-lg lg:text-xl">
                            {!! $contents['our_professionals_description'] !!}
                        </span>
                    </div>
                </div>

                {{-- Slider --}}
                <livewire:web.sliders.slider-professionals lazy />

                
                {{-- Ver todos los profesionales --}}
                <div class="flex w-full justify-center">
                    <a href="{{ route('our_professionals.index') }}"
                        class="text-white text-lg font-medium bg-blue-700 py-3 px-6 rounded-lg">
                        Conoce al equipo completo
                    </a>
                </div>
            </div>

        </x-container>
    </section>

    {{-- Opiniones --}}
    <section id="testimonials">
        <x-container class="px-4 section__spacing">
            {{-- Titulo --}}
            <div class="mb-3 px-4 text-center sm:px-15 lg:px-40">
                <div>
                    <span class="text-3xl sm:text-4xl lg:text-4xl leading-tight lg:leading-tight">
                        {!! $contents['testimonials_title'] !!}
                    </span>
                </div>
                <div class="mt-3">
                    <span class="text-base sm:text-lg lg:text-xl">
                        {!! $contents['testimonials_description'] !!}
                    </span>
                </div>
            </div>
            {{-- Slider Opiniones --}}

            <livewire:web.sliders.slider-opinions lazy />
            

            {{-- Enviar opinion --}}
            <div class="flex w-full justify-center mt-5">
                <a href="{{ route('contact_us.index') }}#opinions_form"
                    class="text-white text-lg font-medium bg-blue-700 py-3 px-6 rounded-lg">
                    Envíanos tu opinión aquí
                </a>
            </div>

        </x-container>
    </section>

    {{-- Contacto --}}
    <x-contact-section />

    <style>
    
        /* Slider profesionales */
        .professional__card {
            height: calc((100% - 30px) / 2) !important;
        }

        .professional__photo {
            height: 310px;
            margin: 0 auto;
        }
    </style>

    @push('js')
        {{-- SweetAlert --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

        {{-- Alerta para livewire --}}
        <script>
            Livewire.on('swal', data => {
                Swal.fire(data[0]);
            });
        </script>
        
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script>
            

            //Swiper Opiniones
            

            //Swiper Profesionales
            
        </script>
    @endpush

</x-app-layout>
