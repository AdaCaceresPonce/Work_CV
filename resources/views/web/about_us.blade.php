
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
    <x-page-cover :image="Storage::url($contents['cover_img'])" :name="$contents['cover_title']" :id="'cover'"/>


    {{-- Quienes somos --}}
    {{-- <section id="clinic_about" class="bg-[#E3FFFE]">
        <x-container class="px-4 section__spacing">
            <div class="flex items-center flex-wrap">
                {{-- Texto --}}
                {{-- <div class="w-full lg:w-1/2 p-4 lg:pr-12">
                    <span class="text-3xl lg:text-4xl leading-tight lg:leading-tight">
                        {!! $contents['about_us_title'] ?? 'Título por Defecto' !!}

                    </span>

                    <div class="mt-4">
                        <span>
                            {!! $contents['about_us_description'] ?? 'Descripción por Defecto' !!}
                        </span>
                    </div>
                    
                </div> --}}
                {{-- Imagen --}}
                {{-- <div class="w-full mt-10 lg:mt-0 lg:w-1/2 flex justify-center">
                    <div class="">
                        <div class="flex items-center 
                            size-[300px] bg-white sm:size-[400px]  md:size-[450px] lg:size-[500px] 
                            justify-center rounded-full border-[3.5px] border-primary relative">

                            <img class="rounded-full 
                                size-[250px] sm:size-[340px] md:size-[390px] lg:size-[440px] 
                                border-[3.5px] border-primary object-cover object-center " src="{{ Storage::url($contents['about_us_img']) }}" alt="">

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
                                    text-white rotate-[20deg]"></i>

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
                                <i class="fa-solid fa-stethoscope text-white text-[25px] rotate-[-20deg]
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
                                <i class="fa-solid fa-tooth text-white text-[25px] rotate-[-25deg]
                                    sm:text-[31px]
                                    md:text-[34px]"></i>
                            </div>
                        </div>
                    </div>
                {{-- </div> --}}
            {{-- </div>
        </x-container>
    {{-- </section> --}} 

    {{-- Info adicional de la clinica --}}
    <section id="free_content_1">
        <x-container class="px-4 section__spacing">
            <div class="flex items-center flex-wrap-reverse">
                {{-- Imagen --}}
                <div class="w-full mt-10 lg:mt-0 lg:w-1/2 sm:px-4">
                    <img class="h-[450px] sm:h-[550px] lg:h-[600px] w-full object-cover object-center border-[4px] border-[#00CAF7] rounded-3xl"
                        src="{{ Storage::url($contents['free_img']) }}" alt="">
                </div>

                {{-- Texto --}}
                <div class="w-full lg:w-1/2 px-4 lg:pl-6">

                    {{-- Contenido libre 1 --}}
                    <div>
                        <span class="text-3xl lg:text-4xl leading-tight lg:leading-tight">
                            {!! $contents['free_title_1'] ?? 'Título libre' !!}
                        </span>
                        <div class="mt-3">
                            <span>
                                {!! $contents['free_description_1'] ?? 'Título por descripcion' !!}
                            </span>
                        </div>
                    </div>

                    {{-- Contenido libre 2 --}}
                    <div class="mt-8">
                        <span class="text-3xl lg:text-4xl leading-tight lg:leading-tight">
                            {!! $contents['free_title_2'] ?? 'Título 2' !!}
                        </span>
                        <div class="mt-3">
                            <span>
                                {!! $contents['free_description_2'] ?? 'Título por descripcion 2'!!}
                            </span>
                        </div>
                    </div>

                </div>
            </div>
        </x-container>
    </section>
</x-app-layout>
