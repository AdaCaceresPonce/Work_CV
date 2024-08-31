<div class="grid grid-cols-1 gap-4">

    <div class="grid grid-cols-1 gap-4" id="topics_list">

        @foreach ($topics as $topic)
            <div class="bg-gray-100 border-2 flex" data-id="{{ $topic->id }}" wire:key="topic-{{ $topic->id }}">

                <div class="handle bg-gray-300 cursor-grab">
                    <span><i class="fa-solid fa-hand px-6 p-4"></i></span>
                </div>

                <div class="flex-1 p-4 items-center">
                    {{ $topic->position }}. {{ $topic->name }}
                </div>

                <div class="justify-end bg-gray-200 p-4 flex flex-col md:flex-row gap-2">
                    <button class="bg-yellow-500 text-white px-3 py-2 rounded-md">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <button class="bg-red-500 text-white px-3 py-2 rounded-md">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>

            </div>
        @endforeach

    </div>

    <button class="p-4 btn-blue font-bold">
        <i class="fa-solid fa-plus mr-1"></i> Agregar nuevo tema
    </button>
</div>

@push('js')
    <!-- jsDelivr :: Sortable :: Latest (https://www.jsdelivr.com/package/npm/sortablejs) -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

    <script>
        new Sortable(topics_list, {
            handle: '.handle',
            animation: 150,
            ghostClass: 'bg-blue-200',

            store: {
                set: function (sortable){
                    const sorts = sortable.toArray();
                    console.log(sorts);

                    Livewire.dispatch('sortTopics', { sorts: sorts });
                }
            }
        });
    </script>
@endpush
