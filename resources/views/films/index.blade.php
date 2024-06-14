<x-app-layout>

    <livewire:genre-selector-component />
    {{-- <livewire:movie-genre-component /> --}}
    {{-- <div class="h-auto max-w-screen flex flex-col gap-2 justify-center pb-4 px-20">
        <h3 class="pt-10 z-10 text-white font-extrabold text-lg">Watch again and again</h3>
        <div class="max-w-screen flex flex-row z-10 gap-7">
            @foreach ($genreFilms as $film)
                <div class="relative">

                    <div class="w-64 h-44 max-h-[22rem] rounded-sm"
                        style="background-image: url({{ asset($film->poster) }})">
                    </div>
                    <div class="absolute -bottom-4 left-0 right-0 flex justify-center p-4">
                        <livewire:more-info-component :queryOrFilm="$film" />

                        <button
                            class="bg-white text-xs text-black font-bold py-1 px-1.5 rounded-tr-sm transition hover:scale-110">Watch
                            now</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div> --}}
    <!-- Contenido de la página -->
</x-app-layout>
