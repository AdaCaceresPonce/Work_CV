@props(['breadcrumbs' => []])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- Select2 CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    {{-- AOS --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    @stack('css')

    <style>
        html {
            scroll-behavior: smooth;
            scroll-padding-top: 5rem;
        }
    </style>

    {{-- FontAwesome --}}
    <script src="https://kit.fontawesome.com/c5d68cbda8.js" crossorigin="anonymous"></script>

    {{-- JQuery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    {{-- Select2 JS --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased sm:overflow-y-auto" x-data="{
    sidebarOpen: false
}"
    :class="{
        'overflow-y-hidden': sidebarOpen,
    }">


    <div class="fixed inset-0 bg-gray-900 bg-opacity-50 z-20 sm:hidden" style="display: none" x-show="sidebarOpen"
        x-on:click="sidebarOpen = false">
    </div>

    @include('layouts.partials.admin.navigation')

    {{-- @include('layouts.partials.admin.sidebar') --}}
    @livewire('layouts.partials.admin.sidebar')

    <div class="p-4 sm:ml-64">

        <div class="mt-14">

            <div class="flex justify-between items-center">
                {{-- Breadcrumb --}}
                @include('layouts.partials.admin.breadcrumb')

                {{-- Botón de 'Nuevo', es para los crud --}}
                @isset($action)
                    <div>
                        {{ $action }}
                    </div>
                @endisset

            </div>

            <div class="p-4 overflow-x-hidden overflow-y-hidden border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">

                {{ $slot }}

            </div>
        </div>
    </div>

    {{-- SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @livewireScripts

    {{-- Alerta para sesiones flash --}}
    @if (session('swal'))
        <script>
            Swal.fire({!! json_encode(session('swal')) !!});
        </script>
    @endif

    @stack('js')

    <script>
        AOS.init({
            easing: 'ease-out-back',
            duration: 1000
        });
    </script>

    {{-- Alertas para livewire --}}
    <script>
        Livewire.on('swal', data => {
            Swal.fire(data[0]);
        });

        Livewire.on('toast', data => {

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-right',
                iconColor: 'white',
                customClass: {
                    popup: 'colored-toast',
                },
                showConfirmButton: false,
                timer: 3500,
                timerProgressBar: true,
            })

            Toast.fire(data[0]);
        });
    </script>

</body>

</html>
