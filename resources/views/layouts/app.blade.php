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
    </style>

</head>

<body class="font-cabin antialiased lg:overflow-y-auto bg-white" x-data="{
    open: false,
}"
    :class="{
        'overflow-y-hidden': open
    }">
    <x-banner />

    <div class="min-h-screen bg-white">
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
        <main>
            {{ $slot }}
        </main>

        @include('layouts.partials.app.footer')

    </div>

    @stack('modals')

    @livewireScripts

    @stack('js')



    {{-- Alerta para sesiones flash --}}
    @if (session('swal'))
        <script>
            Swal.fire({!! json_encode(session('swal')) !!});
        </script>
    @endif

</body>

</html>
