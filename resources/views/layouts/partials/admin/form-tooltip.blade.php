@props(['formats' => 'JPG, JPEG, PNG, SVG', 'maxSize' => '1MB', 'dimensions' => '1200x800px'])

<div class="relative inline-block">
    <span x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" class="relative">
        <i class="fa-solid fa-info-circle text-blue-500 cursor-pointer ml-1"></i>
        <div x-show="open" 
            x-transition
            class="absolute z-20 mt-2 max-w-xs p-4 bg-blue-100 border border-blue-300 text-sm text-blue-900 rounded-md shadow-lg sm:w-72"
            :class="{ 
                'left-0': $el.getBoundingClientRect().left < 200, 
                'right-0': $el.getBoundingClientRect().right > window.innerWidth - 200, 
                'left-1/2 transform -translate-x-1/2': $el.getBoundingClientRect().right <= window.innerWidth - 200 && $el.getBoundingClientRect().left >= 200 
            }"
            style="display: none;">
            <p class="flex items-start mb-2">
                <i class="fa-solid fa-file-image text-blue-500 mr-2 mt-1"></i>
                <span>Formatos aceptados: <strong>{{ $formats }}</strong></span>
            </p>
            <p class="flex items-start mb-2">
                <i class="fa-solid fa-file-alt text-blue-500 mr-2 mt-1"></i>
                <span>Tamaño máximo: <strong>{{ $maxSize }}</strong></span>
            </p>
            <p class="flex items-start">
                <i class="fa-solid fa-arrows-alt text-blue-500 mr-2 mt-1"></i>
                <span>Dimensiones recomendadas: <strong>{{ $dimensions }}</strong></span>
            </p>
        </div>
    </span>
</div>
