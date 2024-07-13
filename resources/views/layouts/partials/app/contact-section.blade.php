@props(['service' => ''])

<section id="contact" class="">
    <x-container class="px-4 section__spacing">
        {{-- Titulo --}}
        <div class="mb-10 px-4 text-center sm:px-15 lg:px-20">
            <div>
                <span class="text-3xl lg:text-4xl leading-tight lg:leading-tight font-bold">
                    {!! $contact_section['contact_us_title'] !!}
                </span>
            </div>
            <div class="mt-4">
                <span class="text-base sm:text-lg lg:text-xl font-bold">
                    {!! $contact_section['contact_us_description'] !!}
                </span>
            </div>
        </div>
        {{-- Cuadro de contacto --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">

            <div class="w-full order-last lg:order-first">
                {{-- Formulario --}}
                @livewire('web.inquiries.save-inquiry', compact('service'))
            </div>

            {{-- Info de contacto --}}
            <div class="w-full h-full flex flex-col">
                {{-- Datos --}}
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-3 mb-3">

                    {{-- Telefono --}}
                    <div class="w-full p-[10px] sm:h-[83px] sm:px-[17px] bg-[#C8F8FF] rounded-full flex items-center">
                        {{-- Icono --}}
                        <div class="rounded-full bg-[#0075FF] size-[50px] flex items-center justify-center">
                            <i class="fa-solid fa-phone text-xl text-white"></i>
                        </div>

                        {{-- Texto --}}
                        <div class="ml-2 sm:ml-3 flex flex-1 flex-col">
                            <span class="font-bold">Números de contacto</span>
                            <span class="font-medium text-sm text-[#535353]">
                                {{ $clinic_information['cellphone'] ?? '' }}{{ $clinic_information['cellphone'] && $clinic_information['phone'] ? ' - ' : '' }}{{ $clinic_information['phone'] ?? '' }}
                            </span>
                        </div>
                    </div>

                    {{-- Horarios --}}
                    <div
                        class="w-full p-[10px] sm:h-[83px] sm:px-[17px] bg-[#C8F8FF] rounded-full flex items-center">
                        {{-- Icono --}}
                        <div class="rounded-full bg-[#0075FF] size-[50px] flex items-center justify-center">
                            <i class="fa-regular fa-clock text-2xl text-white"></i>
                        </div>

                        {{-- Texto --}}
                        <div class="ml-2 sm:ml-3 flex flex-1 flex-col">
                            <span class="font-bold">Horarios de atención</span>
                            <span class="font-medium text-xs leading-4 sm:text-sm text-[#535353]">
                                {{ $clinic_information['schedule'] }}
                            </span>
                        </div>
                    </div>

                    {{-- Email --}}
                    <div
                        class="w-full p-[10px] sm:h-[83px] sm:px-[17px] bg-[#C8F8FF] rounded-full flex items-center">
                        {{-- Icono --}}
                        <div class="rounded-full bg-[#0075FF] size-[50px] flex items-center justify-center">
                            <i class="fa-regular fa-envelope text-2xl text-white"></i>
                        </div>

                        {{-- Texto --}}
                        <div class="ml-2 sm:ml-3 flex flex-1 flex-col">
                            <span class="font-bold">Correo electrónico</span>
                            <span class="font-medium text-xs leading-4 sm:text-sm text-[#535353]">
                                {{ $clinic_information['email'] }}
                            </span>
                        </div>
                    </div>

                    {{-- Direccion --}}
                    <div class="w-full p-[10px] sm:h-[83px] sm:px-[17px] bg-[#C8F8FF] rounded-full flex items-center">
                        {{-- Icono --}}
                        <div class="rounded-full bg-[#0075FF] size-[50px] flex items-center justify-center">
                            <i class="fa-solid fa-map-location-dot text-2xl text-white"></i>
                        </div>

                        {{-- Texto --}}
                        <div class="ml-2 sm:ml-3 flex flex-1 flex-col">
                            <span class="font-bold">Dirección</span>
                            <span class="font-medium text-sm sm:text-base text-[#535353]">
                                {{ $clinic_information['address'] }}
                            </span>
                        </div>
                    </div>

                </div>
                {{-- Imagen --}}
                <img class="size-full aspect-[2/1] grow object-cover object-center border-[3px] border-[#00CAF7] rounded-xl"
                    src="{{ Storage::url($contact_section['contact_us_img']) }}" alt="">
            </div>
        </div>
    </x-container>
</section>