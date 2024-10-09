@props(['section_title' => 'Título no definido', 'route_name' => 'welcome.index', 'section_id' => '#'])

<div class="flex items-center bg-slate-50 justify-between px-4 py-3 mb-2 rounded-r-lg shadow-md relative">
    <!-- Decoración lateral o icono -->
    <span class="absolute -left-2 bg-blue-500 border-[2px] border-blue-500 w-2 h-full rounded-l-lg"></span>

    <!-- Título -->
    <span class="text-xl lg:text-2xl font-bold mr-5 text-slate-900">
        {{ $section_title }}
    </span>

    <!-- Botón con ícono -->
    <a href="{{ route($route_name) }}{{ $section_id }}" target="_blank"
        class="px-4 py-2.5 text-xl text-white bg-blue-500 hover:bg-blue-600 rounded-full transition-all duration-300 ease-in-out transform hover:scale-105 shadow-lg">
        <i class="fa-solid fa-arrow-right"></i>
    </a>
</div>

