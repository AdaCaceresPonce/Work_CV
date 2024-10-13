<x-app-layout>

    <x-slot name="title">
        {{ $training->name }}
    </x-slot>

    {{-- Portada --}}
    <section class="w-full brightness-90 contrast-150 bg-cover bg-no-repeat bg-center relative"
        style="background-image: url('{{ Storage::url($training->cover_img_path) }}');">

        <div class="bg-slate-700 bg-opacity-50 inset-0 absolute z-10">
        </div>

        <x-container class="px-4 py-44 lg:py-48 h-full flex align-middle items-center relative z-20">

            <div class="max-w-[800px] mx-auto">
                <p class="text-white flex-1 text-center text-3xl lg:text-4xl text-pretty !leading-snug font-bold tracking-normal"
                    data-aos="fade-down" data-aos-easing="ease" data-aos-delay="200" data-aos-duration="1000">
                    {{ $training->name }}
                </p>
            </div>

        </x-container>

    </section>

    {{-- Titulo --}}
    <section class="bg-center bg-secondary">

        <x-container class="px-4 py-12 lg:py-14">

            <div class="text-2xl lg:text-3xl text-primary leading-tight lg:leading-tight font-bold text-center"
                data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1000" data-aos-duration="1000">
                <span class="block">Sobre esta capacitación</span>
                <div class="flex justify-center mt-4 lg:mt-6">
                    <div class="w-10 h-1 bg-primary"></div>
                </div>
            </div>

            @isset($training->description)
                <div class="mt-8 font-thin text-center w-full px-5 md:px-10 lg:px-16">
                    <span>
                        {{ $training->description }}
                    </span>
                </div>
            @endisset

        </x-container>

    </section>

    <section id="training_detail">

        <x-container class="px-4 section__spacing">

            <div class="flex items-center flex-col lg:flex-row gap-7 md:gap-8">

                {{-- Texto --}}
                <div class="w-full lg:w-1/2 px-2">

                    <div class="mx-auto max-w-[500px] lg:max-w-full">

                        <div class="space-y-4">

                            <span
                                class="text-xl lg:text-2xl text-center lg:text-start font-bold w-full block leading-relaxed">
                                En {{ $training->name }} verás los siguientes temas:

                            </span>

                            <div class="text-base md:text-lg">

                                <ol>
                                    @foreach ($training->topics as $topic)
                                        <li>
                                            {{ $topic->name }}
                                        </li>
                                    @endforeach
                                </ol>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- Imagen --}}
                <div class="w-full lg:w-1/2 flex justify-center px-0 sm:px-32 md:px-40 lg:px-8 xl:px-10">
                    <img class="size-full aspect-[4/4] lg:h-[450px] lg:w-full object-cover md:object-top object-center border-[4px] border-tertiary-border rounded-2xl"
                        src="{{ Storage::url($training->card_img_path) }}" alt="">
                </div>
            </div>

        </x-container>

    </section>

    {{-- @isset($training->additional_info)

        <section id="training_additional_info">
            <x-container class="px-4 section__spacing">
                <div class="px-4">

                    <span class="text-3xl lg:text-4xl leading-tight lg:leading-tight font-bold">
                        Más detalles:
                    </span>
                    <div class="mt-4">
                        <span>
                            {!! $training->additional_info !!}
                        </span>
                    </div>

                </div>
            </x-container>
        </section>
        
    @endisset --}}

    {{-- Sección destacada --}}
    <section class="bg-secondary py-8">
        <x-container>
            <div class="mx-auto p-6">
                <div>
                    <div class="text-2xl lg:text-3xl leading-relaxed font-bold text-center text-primary">
                        <span class="">¿Buscas capacitarte o tienes alguna duda de esta capacitación?</span>
                    </div>
                    <div class="flex justify-center mt-6 lg:mt-8">
                        <a href="{{ route('contact_us.index', $training) }}#form"
                            class="text-base lg:text-lg font-bold text-primary-contrast-1 py-3 px-6 rounded-lg border-[2px] border-primary bg-primary
                            hover:bg-primary-contrast-1 hover:text-primary transition duration-150">
                            Envía una consulta aquí
                        </a>
                    </div>
                </div>
            </div>
        </x-container>

    </section>

</x-app-layout>
