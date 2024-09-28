<div {{ $attributes->merge() }}>

    <h1 class="text-xl font-medium text-gray-900">{{ $title }}</h1>

    @isset($description)
        <p class="mt-1 text-base text-gray-600">
            {{ $description }}
        </p>
    @endisset

</div>
