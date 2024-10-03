@props(['section_title' => 'Sin título', 'route_name' => 'welcome.index', 'section_id' => '#'])

<div class="flex items-center border-b-[2px] border-b-slate-400 px-3 py-2 mb-1">

    <span class="text-xl lg:text-2xl font-bold mr-3">
        {{ $section_title }}
    </span>

    <a href="{{ route($route_name) }}{{ $section_id }}" target="_blank"
        class="px-3 py-[7px] text-white bg-[rgb(0,117,255)] rounded-xl">
        <i class="fa-solid fa-eye"></i>
    </a>

</div>