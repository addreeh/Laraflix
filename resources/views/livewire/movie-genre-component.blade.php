<div>
    <img class="w-full h-[41rem]" src="{{ asset('images/inception.webp') }}" alt="Evangelion Poster">
    <div class="absolute z-10 text-white top-20 left-24 w-[34rem] flex flex-row gap-10">
        <h1 class="text-3xl font-extrabold tracking-wide">Films</h1>

        <select id="genreSelect" wire:model="selectedGenre"
            class="bg-black border border-gray-300 text-white text-sm rounded-sm focus:ring-[#e6030c] focus:border-[#e6030c] block px-2.5">
            @foreach ($genres as $genre)
                <option value="{{ $genre }}">{{ $genre }}</option>
            @endforeach
        </select>
    </div>
    <div class="absolute z-10 text-white top-64 left-24 w-[34rem]">
        {{-- <h1 class="text-6xl pl-14 tnr">INCEPTION</h1> --}}
        <h2 class="text-7xl tnr font-semibold">INCEPTION</h2>
        <p class="pt-6 pb-8 font-sans text-lg">Dom Cobb is a skilled thief, stealing secrets from deep within the
            subconscious during the dream state, when the mind is at its most vulnerable.</p>
        <div class="flex flex-row">
            <button type="button"
                class="font-sans text-black bg-white font-bold rounded-md text-base px-5 pt-2.5 pb-3 text-center inline-flex items-center me-4 mb-2 transition hover:scale-110 hover:bg-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-player-play-filled mr-2"
                    width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M6 4v16a1 1 0 0 0 1.524 .852l13 -8a1 1 0 0 0 0 -1.704l-13 -8a1 1 0 0 0 -1.524 .852z"
                        stroke-width="0" fill="currentColor" />
                </svg>
                Play
            </button>
            {{-- <livewire:film-info-component :queryOrFilm="'Inception'" /> --}}
        </div>
    </div>
    <div class="my-10 mx-24 text-white">
        <div class="flex flex-row mb-6 justify-between">
            <div class="flex flex-row">
                <h1 class="text-2xl font-semibold">Search movies by category</h1>
                <img class="ml-2 w-6 h-6" src="{{ asset('images/ellipse.png') }}">
            </div>
            <div class="flex">
                <div class="inline-flex rounded-md shadow-sm" role="group">
                    <button wire:click="$set('selectedGenre', null)" type="button"
                        class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                        All
                    </button>
                    @foreach ($genres as $key => $genre)
                        <button wire:click="$set('selectedGenre', '{{ $genre }}')" type="button"
                            class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 @if ($key == count($genres) - 1) rounded-e-lg @endif hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                            {{ $genre }}
                        </button>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="grid grid-cols-3 gap-4">
            @foreach ($movies as $movie)
                {{-- <div class="bg-gray-800 p-4 rounded-md shadow-md">
                <h2 class="text-xl font-semibold text-white">{{ $movie->title }}</h2>
                <p class="text-gray-400">{{ $movie->description }}</p>
            </div> --}}
                <div class="relative shadow-[#032f7a] shadow rounded-lg">
                    <img src="{{ $movie->poster }}" class="rounded-lg bg-auto">
                    <div class="text-white absolute top-0 right-0 w-1/2 p-4 h-full flex flex-col justify-end rounded-r-lg"
                        style="backdrop-filter: blur(1px); background-color: rgba(0, 0, 0, 0.5);">
                        <h1 class="righteous-regular text-3xl uppercase">{{ $movie->title }}</h1>
                        <p>Year Release: {{ $movie->release_year }}</p>
                        <br>
                        <p class="text-sm">{{ $movie->description }}</p>
                        <div class="flex flex-row mt-auto">
                            <a href="{{ route('show', $movie->id) }}">
                                <button
                                    class="bg-[#053BA3] rounded-full py-1 px-5 font-bold hover:bg-[#032f7a] transform hover:scale-110 transition-all">More
                                    Info</button>
                            </a>
                            {{-- <button
                            class="bg-[#053BA3] rounded-full p-2 ml-2 transform hover:scale-110 transition-all pepe">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-heart"
                                width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                            </svg>
                        </button> --}}

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let select = document.getElementById("genreSelect");

        select.addEventListener('change', function(event) {
            let selectedGenre = event.target.value;
            console.log('Género seleccionado:', selectedGenre);

            @this.set('selectedGenre', selectedGenre);


            // Puedes agregar más código aquí para manejar el cambio en el género seleccionado
        });
    });
</script>
