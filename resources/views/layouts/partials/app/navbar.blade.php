@php
    $links = [
        [
            'name' => 'Inicio',
            'route' => route('welcome.index'),
            'active' => request()->routeIs('welcome.index'),
        ],
        [
            'name' => 'Mi currículum',
            'route' => route('professional_profile.index'),
            'active' => request()->routeIs('professional_profile.index'),
        ],
        [
            'name' => 'Capacitaciones',
            'route' => route('our_trainings.index'),
            'active' => request()->routeIs('our_trainings.*'),
        ],

        [
            'name' => 'Contacto',
            'route' => route('contact_us.index'),
            'active' => request()->routeIs('contact_us.index'),
        ],
    ];
@endphp

<header class="bg-primary border-b-2 border-primary-border sticky top-0 z-50">
    <x-container class="py-2 px-4">

        <div class="flex justify-between gap-x-8 items-center">

            <button class="text-2xl text-primary-contrast-2 lg:hidden" x-on:click="open = true">
                <i class="fas fa-bars"></i>
            </button>

            {{-- Logo empresa --}}
            <div class="flex h-[52px]">
                <a href="{{ route('welcome.index') }}" class="flex items-center">
                    {{-- <img class="size-[52px] object-cover border-[3px] rounded-full"
                        src="{{ Storage::url($clinicInformation['navbar_clinic_logo']) }}" alt=""> --}}
                    <h1 class="ml-2 text-2xl text-primary-contrast-1 font-semibold">Presentación Personal</h1>
                </a>
            </div>
            {{-- Enlaces --}}
            <div class="flex-1 hidden lg:block">

                <div class="flex justify-end space-x-8 h-full">

                    @foreach ($links as $link)
                        <a href="{{ $link['route'] }}"
                            class="text-lg text-primary-contrast-2 font-semibold hover:text-primary-contrast-3 {{ $link['active'] ? 'text-primary-contrast-3 underline underline-offset-[6px]' : '' }}">
                            {{ $link['name'] }}
                        </a>
                    @endforeach

                </div>

            </div>

            {{-- Boton Intranet --}}
            <div class="hidden lg:block">
                <a href="{{ route('admin.dashboard') }}" class="bg-secondary text-base font-medium text-secondary-contrast-1 px-7 py-2.5 rounded-md">
                    Intranet
                </a>
            </div>
        </div>

    </x-container>

    {{-- Menu mobile --}}
    <nav x-show="open" id="navigation-menu" class="bg-gray-700 bg-opacity-25 w-full absolute lg:hidden"
        style="display: none;">

        <div x-on:click.away="open=false" class="bg-secondary h-full w-6/12 md:w-5/12 overflow-y-auto mt-[1.9px]">
            <ul class="mt-2 list-none pl-0">
                @foreach ($links as $link)
                    <li class="py-3 px-4 sm:px-6">
                        <a href="{{ $link['route'] }}"
                            class="text-base font-semibold hover:text-primary {{ $link['active'] ? 'text-primary' : '' }}">
                            {{ $link['name'] }}
                        </a>
                    </li>
                @endforeach
                <li class="py-3 flex px-4 sm:px-6">
                    <a href="{{ route('admin.dashboard') }}" class="text-base text-primary-contrast-1 px-7 py-2 bg-primary rounded-lg">
                        Intranet
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <style>
        #navigation-menu {
            height: calc(100vh - 68px);
        }
    </style>

</header>
