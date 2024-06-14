<div>
    @php
        $genreImages = [
            'Sci-Fi' => ['id' => 1, 'color' => 'bg-orange-400', 'pegi' => '12+', 'image' => 'images/inception.webp', 'title' => 'Inception', 'description' => 'Dom Cobb is a skilled thief, stealing secrets from deep within the subconscious during the dream state, when the mind is at its most vulnerable.'],
            'Drama' => ['id' => 2, 'color' => 'bg-orange-600', 'pegi' => '16+', 'image' => 'images/tsr.webp', 'title' => 'The Shawshank Redemption', 'description' => 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.'],
            'Crime' => ['id' => 3, 'color' => 'bg-red-600', 'pegi' => '18+', 'image' => 'images/tg.webp', 'title' => 'The Godfather', 'description' => 'An organized crime dynasty\'s aging patriarch transfers control of his clandestine empire to his reluctant son.'],
            'Action' => ['id' => 4, 'color' => 'bg-green-600', 'pegi' => '7+', 'image' => 'images/tdk.webp', 'title' => 'The Dark Knight', 'description' => 'When the menace known as The Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice.'],
        ];
    @endphp

    <div class="relative -mt-[42rem]">
        @if (empty($selectedGenre))
            <img class="w-full h-[41rem]" src="{{ asset('images/fc.webp') }}" alt="Fight Club Poster">
        @else
            {{-- Aquí puedes definir un array asociativo donde la clave sea el nombre del género y el valor sea la ruta de la imagen --}}

            {{-- Verifica si el género seleccionado tiene una imagen asociada --}}
            @if (array_key_exists($selectedGenre, $genreImages))
                <img class="w-full h-[41rem]" src="{{ asset($genreImages[$selectedGenre]['image']) }}"
                    alt="{{ $selectedGenre }} Poster">
            @else
                {{-- Si no hay una imagen asociada para el género seleccionado, muestra una imagen predeterminada --}}
                <img class="w-full h-[41rem] transition ease-in-out delay-150" src="{{ asset('images/evangelion.webp') }}"
                    alt="Default Poster">
            @endif
        @endif

        {{-- Agregar un div con un gradiente negro sobre la imagen --}}
        <div class="absolute inset-0 bg-gradient-to-r from-[#101010] to-transparent"></div>
    </div>


    <div class="absolute z-10 text-white top-20 left-24 w-[34rem] flex flex-row gap-10">
        <h1 class="text-3xl font-extrabold tracking-wide">Films</h1>

        <select id="genreSelect" wire:model="selectedGenre"
            class="bg-black border border-gray-300 text-white text-sm rounded-sm focus:ring-[#e6030c] focus:border-[#e6030c] block px-2.5">
            <option selected value="">All</option>
            @foreach ($genres as $genre)
                <option value="{{ $genre }}">{{ $genre }}</option>
            @endforeach
        </select>
    </div>
    <div class="absolute z-10 text-white top-64 left-24 w-[34rem]">
        {{-- <h1 class="text-6xl pl-14 tnr">INCEPTION</h1> --}}
        @if (empty($selectedGenre))
            <a href="{{ route('show', 14) }}">
                <h2 class="text-7xl tnr font-semibold">Fight Club</h2>
            </a>
            <p class="pt-6 pb-8 font-sans text-lg">An insomniac office worker and a devil-may-care soap maker form an
                underground fight club that evolves into something much, much more.</p>
        @else
            <a href="{{ route('show', $genreImages[$selectedGenre]['id']) }}">
                <h2 class="text-7xl tnr font-semibold">{{ $genreImages[$selectedGenre]['title'] }}</h2>
            </a>
            <p class="pt-6 pb-8 font-sans text-lg">{{ $genreImages[$selectedGenre]['description'] }}</p>
        @endif

        <div class="flex flex-row">
            {{-- <button type="button"
                class="font-sans text-black bg-white font-bold rounded-md text-base px-5 pt-2.5 pb-3 text-center inline-flex items-center me-4 mb-2 transition hover:scale-110 hover:bg-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-player-play-filled mr-2"
                    width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M6 4v16a1 1 0 0 0 1.524 .852l13 -8a1 1 0 0 0 0 -1.704l-13 -8a1 1 0 0 0 -1.524 .852z"
                        stroke-width="0" fill="currentColor" />
                </svg>
                Play
            </button> --}}
            {{-- @if (empty($selectedGenre))
                <livewire:film-info-component :queryOrFilm="'Fight Club'" />
            @else
                @php
                    $titulo = $genreImages[$selectedGenre]['title'];
                @endphp
                <livewire:film-info-component :queryOrFilm="'$titulo'" />
            @endif --}}
        </div>
    </div>
    @if (empty($selectedGenre))
        <div class="bg-gray-700 bg-opacity-40 py-3 pl-3 pr-20 w-28 border-l-4 absolute top-[32rem] right-0 z-10">
            <span class="text-white font-bold bg-red-600 rounded-lg p-1">18+</span>
        </div>
    @else
        <div class="bg-gray-700 bg-opacity-40 py-3 pl-3 pr-20 w-28 border-l-4 absolute top-[32rem] right-0 z-10">
            <span
                class="text-white font-bold {{ $genreImages[$selectedGenre]['color'] }} rounded-lg p-1">{{ $genreImages[$selectedGenre]['pegi'] }}</span>
        </div>
    @endif

    <div class="h-auto absolute top-[38rem] max-w-screen flex flex-col gap-2 justify-center pb-5 px-20">
        <h3 class="pt-10 text-white font-extrabold text-lg">Enjoy the best {{ $selectedGenre }} films
        </h3>
        <div class="max-w-screen grid grid-cols-5 gap-7">
            @foreach ($movies as $film)
                <div class="relative">
                    <div class="w-64 h-44 max-h-[22rem] rounded-sm bg-center-x bg-cover"
                        style="background-image: url({{ asset($film->poster) }})">
                    </div>
                    <div class="absolute -bottom-4 left-0 right-0 flex justify-center p-4">
                        <a href="{{ route('show', $film->id) }}">
                            {{-- <livewire:more-info-component :queryOrFilm="$film" /> --}}

                            <h4
                                class="bg-[#DD0E1F] text-xs text-white font-bold py-1 px-1.5 rounded-tl-sm transition hover:scale-110">
                                {{ $film->title }}</h4>
                        </a>

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

            @this.set('selectedGenre', selectedGenre);


            // Puedes agregar más código aquí para manejar el cambio en el género seleccionado
        });
    });
</script>
