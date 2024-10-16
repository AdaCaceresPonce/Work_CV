<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{ isset($title) ? $title . ' - ' : '' }}{{ config('app.name', '') }}
    </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- AOS --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    @stack('css')

    {{-- FontAwesome --}}
    <script src="https://kit.fontawesome.com/c5d68cbda8.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles


    <style>
        /*Para que las listas puedan mostrarse correctamente*/
        ul,
        ol {
            list-style: revert;
            padding-left: 25px;
        }

        /*Whassap Flotante*/
        .whatsapp-button {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 20px;
            right: 20px;
            background-color: #25d366;
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            font-size: 30px;
            box-shadow: 2px 2px 3px #999;
            z-index: 100;
        }
    </style>

</head>

<body class="font-cabin antialiased lg:overflow-y-auto bg-white" x-data="{
    open: false,
}"
    :class="{
        'overflow-y-hidden': open
    }">
    <x-banner />

    <div class="min-h-screen bg-white ">
        {{-- @livewire('navigation-menu') --}}


        @include('layouts.partials.app.navbar')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main class="overflow-x-hidden overflow-y-hidden">
            {{ $slot }}
        </main>

        <!--Whatsapp Flotante-->
        @if (!is_null($whatsappNumber))
            <a href="https://api.whatsapp.com/send?phone={{ $whatsappNumber }}{{ $whatsappMessage ? '&text=' . urlencode($whatsappMessage) : '' }}"
                x-data="{ showButton: true }"
                x-bind:class="showButton ? 'opacity-100 scale-100' : 'opacity-0 scale-75 pointer-events-none'"
                @scroll.window="showButton = (document.querySelector('footer').getBoundingClientRect().top > window.innerHeight)"
                class="whatsapp-button transition-all duration-300 ease-in-out flex items-center justify-center hover:"
                target="_blank">
                <i class="fa fa-whatsapp"></i>
            </a>
        @endif

        @include('layouts.partials.app.footer')

    </div>

    @stack('modals')

    @livewireScripts

    @stack('js')

    <script>
        AOS.init();
    </script>

    {{-- Alerta para sesiones flash --}}
    @if (session('swal'))
        <script>
            Swal.fire({!! json_encode(session('swal')) !!});
        </script>
    @endif

</body>

</html>
