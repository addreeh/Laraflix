<!-- resources/views/livewire/film-trailer-component.blade.php -->
<div>
    <button wire:click="openModal" type="button"
        class="bg-white text-xs text-black font-bold py-1 px-1.5 rounded-tr-sm transition hover:scale-110">Watch
        now</button>
    @if ($isOpen)
        <div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
            <div>
                <div class="bg-black bg-opacity-90 rounded-lg w-[35rem] relative">
                    <!-- Contenido del modal -->
                    <button wire:click="closeModal"
                        class="bg-black z-50 absolute top-0 right-0 m-4 text-white hover:text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <!-- Contenido del modal -->
                    <div class="p-7 flex flex-col gap-5">
                        <h1 class="text-white font-extrabold text-4xl">{{ $film->title }}</h1>
                        <div class="p-5 flex flex-row">

                            @if ($videoId)
                                <iframe width="560" height="315"
                                    src="{{ 'https://www.youtube.com/embed/' . $videoId }}" frameborder="0"
                                    allowfullscreen></iframe>
                            @else
                                <h1 class="text-3xl text-red-500">Error getting trailer.</h1>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

{{-- <div class="z-50">
    @if ($videoId)
        <h1 class="text-9xl text-green-500">PEPE{{ $video }}</h1>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $videoId }}"
            frameborder="0" allowfullscreen></iframe>
    @else
        <h1 class="texxt-9xl text-green-500">MANOLO</h1>
    @endif
</div> --}}
