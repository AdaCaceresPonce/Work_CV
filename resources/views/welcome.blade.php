<x-app-layout title="Inicio">

    <x-slot name="title">
        Inicio
    </x-slot>

    @push('css')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @endpush

    {{-- Cover --}}
    <section id="cover" class="">
        <x-container class="px-4 section__spacing">
            <div class="flex items-center flex-wrap">
                {{-- Texto --}}
                <div class="w-full lg:w-1/2 p-4 lg:pr-12">

                    <div class="max-w-[500px] lg:max-w-full mx-auto text-center lg:text-start" 
                    data-aos="fade-right"
                    data-aos-duration="1500">

                        <div>
                            <span class="text-3xl md:text-4xl leading-tight lg:leading-tight">
                                {!! $contents['cover_title'] ?? 'Sin título' !!}
                            </span>
                        </div>
    
                        <div class="mt-4">
                            <span class="text-base sm:text-base md:text-lg">
                                {!! $contents['cover_description'] ?? 'Sin descripción' !!}
                            </span>
                        </div>
                    </div>

                </div>
                {{-- Imagen --}}
                <div class="w-full mt-10 lg:mt-0 lg:w-1/2 flex justify-center">
                    <div class="" 
                    data-aos="fade-left"
                    data-aos-duration="1500">

                        {{-- Circulo grande --}}
                        <div
                            class="flex items-center 
                            size-[300px] bg-secondary sm:size-[400px]  md:size-[450px] lg:size-[500px] 
                            justify-center rounded-full border-[3.5px] border-primary relative">

                            {{-- Imagen circular con borde --}}
                            <img class="rounded-full 
                                size-[250px] sm:size-[340px] md:size-[390px] lg:size-[440px] 
                                border-[3.5px] border-primary bg-gray-100 object-cover object-center "
                                src="{{ Storage::url($contents['cover_img']) }}" alt="">

                            {{-- Bolitas del lado superior izquierdo --}}
                            <div
                                class="bg-primary size-[14px] top-[18.6%] left-[6.2%] rounded-full 
                                sm:size-[18px] sm:top-[18.8%] 
                                md:size-[20px] md:top-[19.5%] md:left-[6.1%]
                                lg:size-[22px] lg:top-[19.5%] 
                                absolute inset-0">
                            </div>

                            <div
                                class="bg-primary size-[18px] top-[26%] left-[1%] rounded-full 
                                sm:size-[24px] sm:top-[27%] sm:left-[0.5%]
                                md:size-[28px] md:top-[27.6%] md:left-[0.2%]
                                lg:size-[30px] lg:top-[27.4%] absolute inset-0">
                            </div>

                            <div
                                class="bg-primary size-[24px] top-[36.33%] left-[-3.6%] rounded-full 
                                sm:size-[32px] sm:top-[38%]
                                md:size-[38px] md:top-[38%] md:left-[-4.2%]
                                lg:size-[42px] lg:top-[38.2%] lg:left-[-4%] absolute inset-0">
                            </div>

                            {{-- Bolitas del lado superior derecho --}}
                            <div
                                class="bg-primary size-[14px] top-[-1%] left-[60%] rounded-full 
                                sm:size-[20px] sm:top-[-1%]
                                absolute inset-0">
                            </div>

                            <div
                                class="bg-primary size-[44px] flex items-center justify-center top-[-3%] left-[67%] rounded-full 
                                sm:size-[60px] sm:top-[-3%]
                                absolute inset-0">

                                {{-- Icono --}}
                                <i
                                    class="fa-solid fa-book text-[25px]
                                    sm:text-[35px]
                                    text-primary-contrast-1 rotate-[20deg]"></i>

                            </div>

                            {{-- Bolitas del lado derecho al medio --}}
                            <div
                                class="bg-primary size-[28px] top-[32%] left-[93.7%] rounded-full 
                                sm:size-[35px] sm:top-[31%]
                                md:size-[40px] md:top-[31%]
                                absolute inset-0">
                            </div>

                            <div
                                class="bg-primary size-[20px] top-[45%] left-[97%] rounded-full 
                                sm:size-[26px] sm:top-[44%]
                                md:size-[27px] md:left-[97.3%] md:top-[44.4%]
                                absolute inset-0">
                            </div>

                            <div
                                class="bg-primary size-[14px] top-[55.8%] left-[97.5%] rounded-full 
                                sm:size-[19px] sm:top-[55%]
                                md:size-[20px] md:top-[55%]
                                absolute inset-0">
                            </div>

                            {{-- Bolitas de la esquina inferior derecha --}}
                            <div
                                class="bg-primary size-[16px] top-[80%] left-[85.8%] rounded-full absolute inset-0
                                sm:size-[18px] sm:top-[82%] sm:left-[84.7%]
                                md:size-[20px] md:top-[82%] md:left-[84.7%]">
                            </div>

                            <div
                                class="bg-primary size-[44px] flex items-center justify-center top-[85%] left-[71%] rounded-full absolute inset-0
                                sm:size-[55px] sm:top-[86%] sm:left-[71%]
                                md:size-[59px] md:top-[87%] md:left-[71%]">
                                {{-- Icono --}}
                                <i
                                    class="fa-solid fa-person-chalkboard text-primary-contrast-1 text-[22px] rotate-[15deg]
                                    sm:text-[30px]"></i>
                            </div>

                            {{-- Bolitas de la esquina inferior izquierda --}}
                            <div
                                class="bg-primary size-[14px] top-[93%] left-[25%] rounded-full absolute inset-0
                                sm:size-[18px] sm:top-[91.5%] sm:left-[23%]
                                md:size-[20px] md:top-[91.7%] md:left-[23%]">
                            </div>

                            <div
                                class="bg-primary size-[44px] flex items-center justify-center top-[82%] left-[9%] rounded-full absolute inset-0
                                sm:size-[52px] sm:top-[81.1%] sm:left-[9%]
                                md:size-[57px] md:top-[81.1%] md:left-[9%]">
                                {{-- Icono --}}
                                <i
                                    class="fa-solid fa-pen text-primary-contrast-1 text-[25px] rotate-[-10deg]
                                    sm:text-[31px]
                                    md:text-[34px]"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-container>
    </section>
    
    {{-- Banner 1 --}}
    <section id="about" class="bg-primary">
        <x-container class="px-4 py-14 md:py-16">

            <div class="flex flex-col lg:flex-row px-4 gap-8 lg:gap-4">

                {{-- Icono --}}
                <div class="w-full lg:w-[25%] flex justify-center items-center text-center"
                data-aos="fade-right"
                data-aos-duration="600">
                    <i class="fa-solid fa-book text-[80px] text-primary-contrast-1"></i>
                </div>

                {{-- Texto --}}
                <div class="w-full lg:w-[75%] flex flex-col justify-center text-center items-center gap-6"
                data-aos="fade-left"
                data-aos-duration="600">

                    <span class="text-primary-contrast-1 text-base md:text-lg">
                        {!! $contents['about_description'] ?? 'Sin descripción' !!}
                    </span>

                    <div class="bg-tertiary-border w-[80%] h-[2px] md:h-[1.5px]">
                    </div>

                    {{-- Ver más --}}
                    <div class="flex w-full justify-center">
                        <a href="{{ route('professional_profile.index') }}"
                            class="bg-secondary border-2 border-secondary-border text-secondary-contrast-1 text-base font-medium py-3 px-6 rounded-lg">
                            Conoce más sobre mí
                        </a>
                    </div>
                </div>

            </div>
        </x-container>
    </section>

    {{-- Capacitaciones --}}
    <section id="our_trainings">
        <x-container class="px-4 section__spacing flex-col">
            {{-- Titulo --}}
            <div class="mb-6 md:mb-10 text-center sm:px-15 lg:px-40"
                data-aos="fade-up"
                data-aos-duration="500">
                <div>
                    <span class="text-3xl sm:text-4xl lg:text-4xl leading-tight lg:leading-tight">
                        {!! $contents['our_trainings_title'] !!}
                    </span>
                </div>
                <div class="mt-3">
                    <span class="text-base sm:text-lg lg:text-xl">
                        {!! $contents['our_trainings_description'] !!}
                    </span>
                </div>
            </div>

            {{-- Slider --}}
            <livewire:web.sliders.slider-trainings lazy />

            {{-- Ver todos los servicios --}}
            <div class="flex w-full justify-center">
                <a href="{{ route('our_trainings.index') }}"
                    class="text-primary-contrast-1 text-lg font-medium py-3 px-6 rounded-lg border-[2px] border-primary bg-primary
                            hover:bg-primary-contrast-1 hover:text-primary transition duration-150">
                    Ver todas las capacitaciones
                </a>
            </div>

        </x-container>
    </section>

    {{-- Por que elegir nuestras capacitaciones --}}
    <section id="why_choose_our_trainings">
        <x-container class="px-4 section__spacing">
            <div class="flex items-center flex-col lg:flex-row gap-10 md:gap-7">

                <div class="w-full lg:w-1/2 flex justify-center px-0 sm:px-32 md:px-40 lg:px-8 xl:px-10 order-last lg:order-first"
                    data-aos="zoom-in-up"
                    data-aos-duration="1000">
                    <img class="size-full aspect-[4/4] lg:max-h-[470px] lg:w-full object-cover md:object-top object-center border-[4px] border-tertiary-border rounded-xl"
                        src="{{ Storage::url($contents['why_choose_our_trainings_img']) }}" alt="">
                </div>

                <div class="w-full lg:w-1/2 px-4 text-start"
                    data-aos="fade-down"
                    data-aos-duration="1000">

                    <span class="text-2xl lg:text-3xl leading-tight lg:leading-tight font-bold">

                        {!! $contents['why_choose_our_trainings_title'] ?? 'titulo acerca de' !!}

                    </span>

                    <div class="mt-4 md:mt-6">

                        <span class="text-base sm:text-lg lg:text-lg">
                            {!! $contents['why_choose_our_trainings_description'] ?? 'descripcion acerca de nosotros' !!}
                        </span>

                    </div>

                    {{-- <p class="text-base font-bold sm:text-lg lg:text-xl mt-8">
                        Te ofrecemos:
                    </p> --}}

                </div>
            </div>
        </x-container>
    </section>

    {{-- Contacto --}}
    <x-contact-section />

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

    @endpush

</x-app-layout>
