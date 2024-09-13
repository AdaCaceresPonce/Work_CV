<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-[100dvh] pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    :class="{
        'translate-x-0 ease-out': sidebarOpen,
        '-translate-x-full ease-in': !sidebarOpen
    }"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">


        <ul class="pb-4 space-y-2 font-medium">

            {{-- Boton de visitar web --}}
            {{-- <li>
                <a href="{{ route('welcome.index') }}" target="_blank"
                    class="flex items-center p-2 rounded-lg text-white bg-sky-500 group">
                    <span class="inline-flex w-6 h-6 justify-center items-center">
                        <i class="ml-1 fa-solid fa-earth-americas"></i>
                    </span>
                    <span class="ms-2">
                        Visitar Web
                    </span>
                </a>
            </li> --}}

            {{-- Dashboard --}}
            <li>
                <a href="{{ $dashboard['route'] }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700 group {{ $dashboard['active'] ? ' bg-gray-200 dark:bg-gray-700' : '' }}">
                    <span class="inline-flex w-6 h-6 justify-center items-center">
                        <i class="{{ $dashboard['icon'] }}"></i>
                    </span>
                    <span class="ms-2">
                        {{ $dashboard['name'] }}
                    </span>
                </a>
            </li>

        </ul>

        <ul class="pt-4 pb-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
            <li>
                <h2 class="text-gray-400 font-bold">GESTIÓN</h2>
            </li>
            @foreach ($links as $link)
                <li>
                    <a href="{{ $link['route'] }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700 group {{ $link['active'] ? ' bg-gray-200 dark:bg-gray-700' : '' }}">
                        <span class="inline-flex w-6 h-6 justify-center items-center">
                            <i class="{{ $link['icon'] }}"></i>
                        </span>
                        <span class="ms-2">
                            {{ $link['name'] }}
                        </span>
                    </a>
                </li>
            @endforeach
        </ul>

        <ul class="pt-4 pb-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
            <li>
                <h2 class="text-gray-400 font-bold">BUZÓN DE MENSAJES</h2>
            </li>

            {{-- Consultas wire:poll.visible="refreshInquiriesCount"--}}
            <li>
                <a href="{{ $inquiries_mailbox['route'] }}" 
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700 group {{ $inquiries_mailbox['active'] ? ' bg-gray-200 dark:bg-gray-700' : '' }}">
                    <span class="inline-flex w-6 h-6 justify-center items-center">
                        <i class="{{ $inquiries_mailbox['icon'] }}"></i>
                    </span>
                    <span class="ms-2 flex-1">
                        {{ $inquiries_mailbox['name'] }}
                    </span>

                    @if ($new_inquiries_count > 0)
                        <span
                            class="inline-flex items-center justify-center size-5 ms-2 text-sm font-bold text-white bg-red-500 rounded-full">
                            {{ $new_inquiries_count }}
                        </span>
                    @endif

                </a>
            </li>

            {{-- Opiniones wire:poll.visible="refreshOpinionsCount"--}}
            <li>
                <a href="{{ $opinions_mailbox['route'] }}" 
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700 group {{ $opinions_mailbox['active'] ? ' bg-gray-200 dark:bg-gray-700' : '' }}">
                    <span class="inline-flex w-6 h-6 justify-center items-center">
                        <i class="{{ $opinions_mailbox['icon'] }}"></i>
                    </span>
                    <span class="ms-2 flex-1">
                        {{ $opinions_mailbox['name'] }}
                    </span>

                    @if ($new_opinions_count > 0)
                        <span
                            class="inline-flex items-center justify-center size-5 ms-2 text-sm font-bold text-white bg-red-500 rounded-full">
                            {{ $new_opinions_count }}
                        </span>
                    @endif

                </a>
            </li>
        </ul>

        <ul class="pt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
            <li>
                <h2 class="text-gray-400 font-bold">EDITOR DE PÁGINAS</h2>
            </li>
            @foreach ($web_pages as $web_page)
                <li>
                    <a href="{{ $web_page['route'] }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700 group {{ $web_page['active'] ? ' bg-gray-200 dark:bg-gray-700' : '' }}">
                        <span class="inline-flex w-6 h-6 justify-center items-center">
                            <i class="{{ $web_page['icon'] }}"></i>
                        </span>
                        <span class="ms-2">
                            {{ $web_page['name'] }}
                        </span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</aside>
