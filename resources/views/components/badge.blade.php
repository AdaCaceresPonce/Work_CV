@php
    // Definir las clases CSS según el tipo de badge
    $classes = match ($type) {
        'green' => 'bg-green-500 text-white',
        'red' => 'bg-red-100 hover:bg-red-100 text-red-800 text-sm font-medium dark:bg-gray-800 dark:border-red-400 dark:text-red-400 dark:hover:bg-gray-700 border border-red-400',
        default => 'bg-blue-100 hover:bg-blue-200 text-blue-800 text-sm font-medium dark:bg-gray-800 dark:border-[#60f0f5] dark:text-[#60f0f5] dark:hover:bg-gray-700 border border-blue-400',
    };
@endphp

@if($isLink)
    <a href="{{ $url }}" class="px-2.5 py-0.5 inline-flex items-center justify-center rounded-full {{ $classes }}">
        {{ $slot }}
    </a>
@else
    <span class="px-2.5 py-0.5 inline-flex items-center justify-center rounded-full {{ $classes }}">
        {{ $slot }}
    </span>
@endif