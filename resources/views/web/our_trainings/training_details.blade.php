<x-app-layout :title="$training->name">

    {{-- Portada --}}
    <section class="w-full brightness-90 contrast-150 bg-cover bg-no-repeat bg-center relative"
        style="background-image: url('{{ Storage::url($training->cover_img_path) }}');">
        <div class="bg-blue-900 bg-opacity-50 inset-0 absolute z-10">
        </div>
        <x-container class="px-4 py-44 lg:py-48 h-full flex align-middle items-center relative z-20">
            <p class="text-white flex-1 text-center text-4xl font-bold tracking-normal">
                {{ $training->name }}
            </p>
        </x-container>
    </section>

    {{-- Titulo --}}
    <section class="bg-center">

        <x-container class="px-4 pt-20">

            <p class="text-2xl lg:text-3xl leading-tight lg:leading-tight font-bold text-center">
                <span class="block">Sobre esta capacitación</span>
            <div class="flex justify-center mt-6">
                <div class="w-10 h-1 bg-primary"></div>
            </div>
            </p>

        </x-container>

    </section>

    <section id="training_detail">
        <x-container class="px-4 section__spacing">
            <div class="flex items-center flex-wrap">

                {{-- Texto --}}
                <div class="w-full lg:w-1/2 px-4">
                    <span class="text-2xl lg:text-3xl leading-tight lg:leading-tight font-bold">
                        {!! $training->name !!}

                    </span>
                    <div class="mt-4">

                        <p class="font-bold text-lg">Temas:</p>
                        <ul class="list-disc list-inside text-base md:text-lg">
                            @foreach ($training->topics as $topic)
                                <li>{{ $topic->name }}</li>
                            @endforeach
                        </ul>

                        {{-- <span>
                            {!! $training->long_description !!}
                        </span> --}}
                    </div>

                </div>

                {{-- Imagen --}}
                <div
                    class="w-full lg:w-1/2 mt-8 lg:mt-0 flex justify-center p-0 sm:px-32 md:px-40 lg:pl-8 lg:pr-0 xl:pl-10">
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
                    <div class="text-2xl lg:text-3xl leading-tight lg:leading-tight font-bold text-center text-primary">
                        <span class="">¿Tienes alguna duda de esta capacitación?</span>
                    </div>
                    <div class="flex justify-center mt-8">
                        <a href="{{ route('contact_us.index', $training) }}#form"
                            class="text-lg font-bold text-white py-3 px-6 rounded-lg border-[3px] border-primary bg-primary
                        transition duration-150 hover:bg-primary-contrast-1 hover:text-primary">
                            Envía una consulta aquí
                        </a>
                    </div>
                </div>
            </div>
        </x-container>

    </section>

</x-app-layout>
