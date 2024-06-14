{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
<style>
    .banner {
        /* background: rgb(221, 14, 31);
        background: -moz-linear-gradient(180deg, rgba(221, 14, 31, 1) 0%, rgba(16, 16, 16, 1) 70%, rgba(16, 16, 16, 1) 100%);
        background: -webkit-linear-gradient(180deg, rgba(221, 14, 31, 1) 0%, rgba(16, 16, 16, 1) 70%, rgba(16, 16, 16, 1) 100%);
        background: linear-gradient(180deg, rgba(221, 14, 31, 1) 0%, rgba(16, 16, 16, 1) 70%, rgba(16, 16, 16, 1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#dd0e1f", endColorstr="#101010", GradientType=1); */
        background: rgb(221, 14, 31);
        background: -moz-radial-gradient(circle, rgba(221, 14, 31, 1) 0%, rgba(16, 16, 16, 1) 70%, rgba(16, 16, 16, 1) 100%);
        background: -webkit-radial-gradient(circle, rgba(221, 14, 31, 1) 0%, rgba(16, 16, 16, 1) 70%, rgba(16, 16, 16, 1) 100%);
        background: radial-gradient(circle, rgba(221, 14, 31, 1) 0%, rgba(16, 16, 16, 1) 70%, rgba(16, 16, 16, 1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#dd0e1f", endColorstr="#101010", GradientType=1);
    }

    .banner2 {
        background: rgb(16, 16, 16);
        background: -moz-linear-gradient(180deg, rgba(16, 16, 16, 0) 0%, rgba(16, 16, 16, 1) 50%, rgba(16, 16, 16, 1) 100%);
        background: -webkit-linear-gradient(180deg, rgba(16, 16, 16, 0) 0%, rgba(16, 16, 16, 1) 50%, rgba(16, 16, 16, 1) 100%);
        background: linear-gradient(180deg, rgba(16, 16, 16, 0) 0%, rgba(16, 16, 16, 1) 50%, rgba(16, 16, 16, 1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#101010", endColorstr="#101010", GradientType=1);
    }

    .flag {
        clip-path: polygon(0 0, 100% 0, 100% 100%, 0 85%);

    }
</style>
<x-app-layout>
    <div>
        <img class="w-full h-screen absolute top-0 left-0 z-0" src="{{ asset('images/evengelion.webp') }}"
            alt="Evangelion Poster">
        {{-- <div class="absolute z-20 text-white pl-16 pt-40 w-[33rem]"> --}}
        <div class="absolute z-10 text-white top-64 left-24 w-[34rem]">
            <h1 class="text-6xl pl-14 tnr">EVANGELION</h1>
            <h2 class="text-7xl tnr font-semibold">DEATH (TRUE)<sup>2</sup></h2>
            <p class="pt-6 pb-8 font-sans text-lg">Fifteen years after a cataclysm, the apathetic young Shinji joins his
                parent's
                group.
                pardre's group,
                NERV, to
                to confront monstrous beings. But the truth could destroy them.</p>
            <div class="flex flex-row">
                @if (!Auth::user())
                    <a href="{{ route('login') }}"> <button type="button"
                            class="font-sans text-black bg-white font-bold rounded-md text-base px-5 pt-[0.8rem] pb-3 text-center inline-flex items-center me-4 mb-2 transition hover:scale-110 hover:bg-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-player-play-filled mr-2" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M6 4v16a1 1 0 0 0 1.524 .852l13 -8a1 1 0 0 0 0 -1.704l-13 -8a1 1 0 0 0 -1.524 .852z"
                                    stroke-width="0" fill="currentColor" />
                            </svg>
                            Play
                        </button>
                    </a>
                @else
                    <livewire:play-trailer-component :film="'Evangelion: Death (True)²'" />
                @endif
                {{-- <button wire:click="openModal" type="button"
                    class="font-sans text-white bg-gray-500 bg-opacity-70 font-bold rounded-md text-base px-5 pt-2.5 pb-3 text-center inline-flex items-center me-2 mb-2 transition hover:scale-110 hover:bg-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-info-circle mr-2"
                        width="26" height="26" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                        <path d="M12 9h.01" />
                        <path d="M11 12h1v4h1" />
                    </svg>
                    More Info
                </button> --}}
                {{-- <livewire:film-info-component :film="$film" /> --}}
                @if (!Auth::user())
                    <a href="{{ route('login') }}">
                        <button type="button"
                            class="font-sans text-white bg-gray-500 bg-opacity-70 font-bold rounded-md text-base px-5 pt-2.5 pb-3 text-center inline-flex items-center me-2 mb-2 transition hover:scale-110 hover:bg-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-info-circle mr-2" width="26" height="26"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                <path d="M12 9h.01" />
                                <path d="M11 12h1v4h1" />
                            </svg>
                            More Info
                        </button>
                    </a>
                @else
                    <livewire:film-info-component :queryOrFilm="'Evangelion: Death (True)²'" />
                @endif


                {{-- @livewire('film-info-component') --}}
            </div>
        </div>
        <div class="bg-gray-700 bg-opacity-40 py-3 pl-3 pr-20 w-28 border-l-4 absolute top-[32rem] right-0 z-10">
            <span class="text-white font-bold bg-orange-600 rounded-lg p-1">16+</span>
        </div>
        @auth
            @if (!empty($ratingFilms))
                <div class="h-auto banner2 absolute top-[38rem] max-w-screen flex flex-col gap-2 justify-center py-5 px-14">
                    <div class="flex flex-row items-center">
                        <h3 class="pt-10 text-white font-extrabold text-lg">Explore our blockbusters </h3>
                        <svg class="ml-2 mt-10 w-7 h-7" viewBox="0 0 28 30" class="svg-icon svg-icon-top-10-badge">
                            <rect x="0" width="28" height="30" rx="3" fill="#e50914"></rect>
                            <path
                                d="M16.8211527,22.1690594 C17.4133103,22.1690594 17.8777709,21.8857503 18.2145345,21.3197261 C18.5512982,20.7531079 18.719977,19.9572291 18.719977,18.9309018 C18.719977,17.9045745 18.5512982,17.1081018 18.2145345,16.5414836 C17.8777709,15.9754594 17.4133103,15.6921503 16.8211527,15.6921503 C16.2289952,15.6921503 15.7645345,15.9754594 15.427177,16.5414836 C15.0904133,17.1081018 14.9223285,17.9045745 14.9223285,18.9309018 C14.9223285,19.9572291 15.0904133,20.7531079 15.427177,21.3197261 C15.7645345,21.8857503 16.2289952,22.1690594 16.8211527,22.1690594 M16.8211527,24.0708533 C15.9872618,24.0708533 15.2579042,23.8605988 14.6324861,23.4406836 C14.0076618,23.0207685 13.5247891,22.4262352 13.1856497,21.6564897 C12.8465103,20.8867442 12.6766436,19.9786109 12.6766436,18.9309018 C12.6766436,17.8921018 12.8465103,16.9857503 13.1856497,16.2118473 C13.5247891,15.4379442 14.0076618,14.8410352 14.6324861,14.4205261 C15.2579042,14.0006109 15.9872618,13.7903564 16.8211527,13.7903564 C17.6544497,13.7903564 18.3844012,14.0006109 19.0098194,14.4205261 C19.6352376,14.8410352 20.1169224,15.4379442 20.4566558,16.2118473 C20.7952012,16.9857503 20.9656618,17.8921018 20.9656618,18.9309018 C20.9656618,19.9786109 20.7952012,20.8867442 20.4566558,21.6564897 C20.1169224,22.4262352 19.6352376,23.0207685 19.0098194,23.4406836 C18.3844012,23.8605988 17.6544497,24.0708533 16.8211527,24.0708533"
                                fill="#FFFFFF"></path>
                            <polygon fill="#FFFFFF"
                                points="8.86676 23.9094206 8.86676 16.6651418 6.88122061 17.1783055 6.88122061 14.9266812 11.0750267 13.8558085 11.0750267 23.9094206">
                            </polygon>
                            <path
                                d="M20.0388194,9.42258545 L20.8085648,9.42258545 C21.1886861,9.42258545 21.4642739,9.34834303 21.6353285,9.19926424 C21.806383,9.05077939 21.8919103,8.83993091 21.8919103,8.56731273 C21.8919103,8.30122788 21.806383,8.09572485 21.6353285,7.94961576 C21.4642739,7.80410061 21.1886861,7.73104606 20.8085648,7.73104606 L20.0388194,7.73104606 L20.0388194,9.42258545 Z M18.2332436,12.8341733 L18.2332436,6.22006424 L21.0936558,6.22006424 C21.6323588,6.22006424 22.0974133,6.31806424 22.4906012,6.51465818 C22.8831952,6.71125212 23.1872921,6.98684 23.4028921,7.34142182 C23.6178982,7.69659758 23.7259952,8.10522788 23.7259952,8.56731273 C23.7259952,9.04246424 23.6178982,9.45762788 23.4028921,9.8122097 C23.1872921,10.1667915 22.8831952,10.4429733 22.4906012,10.6389733 C22.0974133,10.8355673 21.6323588,10.9335673 21.0936558,10.9335673 L20.0388194,10.9335673 L20.0388194,12.8341733 L18.2332436,12.8341733 Z"
                                fill="#FFFFFF"></path>
                            <path
                                d="M14.0706788,11.3992752 C14.3937818,11.3992752 14.6770909,11.322063 14.9212,11.1664509 C15.1653091,11.0114327 15.3553697,10.792863 15.4913818,10.5107418 C15.6279879,10.2286206 15.695697,9.90136 15.695697,9.52717818 C15.695697,9.1535903 15.6279879,8.82573576 15.4913818,8.54361455 C15.3553697,8.26149333 15.1653091,8.04351758 14.9212,7.88790545 C14.6770909,7.73288727 14.3937818,7.65508121 14.0706788,7.65508121 C13.7475758,7.65508121 13.4642667,7.73288727 13.2201576,7.88790545 C12.9760485,8.04351758 12.7859879,8.26149333 12.6499758,8.54361455 C12.5139636,8.82573576 12.4456606,9.1535903 12.4456606,9.52717818 C12.4456606,9.90136 12.5139636,10.2286206 12.6499758,10.5107418 C12.7859879,10.792863 12.9760485,11.0114327 13.2201576,11.1664509 C13.4642667,11.322063 13.7475758,11.3992752 14.0706788,11.3992752 M14.0706788,12.9957842 C13.5634545,12.9957842 13.0995879,12.9090691 12.6784848,12.7344509 C12.2573818,12.5604267 11.8915152,12.3163176 11.5808848,12.0027176 C11.2708485,11.6891176 11.0314909,11.322063 10.8634061,10.9003661 C10.6953212,10.479263 10.6115758,10.0213358 10.6115758,9.52717818 C10.6115758,9.03302061 10.6953212,8.57568727 10.8634061,8.1539903 C11.0314909,7.73288727 11.2708485,7.36523879 11.5808848,7.05163879 C11.8915152,6.73803879 12.2573818,6.49452364 12.6784848,6.31990545 C13.0995879,6.14588121 13.5634545,6.05857212 14.0706788,6.05857212 C14.577903,6.05857212 15.0417697,6.14588121 15.4628727,6.31990545 C15.8839758,6.49452364 16.2498424,6.73803879 16.5604727,7.05163879 C16.871103,7.36523879 17.1098667,7.73288727 17.2779515,8.1539903 C17.4460364,8.57568727 17.5297818,9.03302061 17.5297818,9.52717818 C17.5297818,10.0213358 17.4460364,10.479263 17.2779515,10.9003661 C17.1098667,11.322063 16.871103,11.6891176 16.5604727,12.0027176 C16.2498424,12.3163176 15.8839758,12.5604267 15.4628727,12.7344509 C15.0417697,12.9090691 14.577903,12.9957842 14.0706788,12.9957842"
                                fill="#FFFFFF"></path>
                            <polygon fill="#FFFFFF"
                                points="8.4639503 12.8342327 6.65837455 13.2666206 6.65837455 7.77862061 4.65323515 7.77862061 4.65323515 6.22012364 10.4690897 6.22012364 10.4690897 7.77862061 8.4639503 7.77862061">
                            </polygon>
                        </svg>
                    </div>
                    <div class="max-w-screen flex flex-row gap-7">
                        @php
                            $moviesCount = count($ratingFilms);
                            $remainingSkeletons = max(0, 5 - $moviesCount);
                        @endphp
                        @for ($i = 0; $i < count($ratingFilms); $i++)
                            @php
                                $film = $ratingFilms[$i];
                            @endphp
                            <div class="relative">
                                <div class="w-64 h-44 max-h-[22rem] rounded-sm bg-center-x bg-cover"
                                    style="background-image: url({{ asset($film->poster) }})">
                                </div>
                                <div
                                    class="flag absolute top-0 left-0 bg-[#e6030c] h-[3.25rem] w-10 flex justify-center items-center">
                                    <div class="text-center mb-0 relative">
                                        <span
                                            class="-right-[0.95rem] absolute -top-[1.8rem] uppercase text-white font-extrabold">TOP</span>
                                        <span
                                            class="-right-[0.75rem] absolute -top-[1rem] uppercase text-white font-extrabold px-1 text-3xl ">{{ $i + 1 }}</span>
                                    </div>
                                </div>
                                <div class="absolute -bottom-4 left-0 right-0 flex justify-center p-4">
                                    <livewire:more-info-component :queryOrFilm="$film" />
                                    <livewire:film-trailer-component :film="$film" />
                                </div>
                            </div>
                        @endfor

                        {{-- Agregar divs esqueletos si es necesario --}}
                        @for ($i = 0; $i < $remainingSkeletons; $i++)
                            <div class="relative">
                                <div class="w-64 h-44 max-h-[22rem] rounded-sm bg-[#202020] animate-pulse"></div>
                            </div>
                        @endfor
                    </div>
                </div>
            @endif

            <div class="h-auto max-w-screen flex flex-col gap-2 justify-center pt-16 px-14 mt-20">
                <div class="flex flex-row">
                    <h3 class="pt-10 text-gray-300 font-extrabold text-lg">Recently uploaded films
                    </h3>
                    <img src="{{ asset('images/flame.webp') }}" class="w-8 h-8 ml-1 mt-9">

                </div>

                <div class="max-w-screen flex flex-row gap-7">
                    @foreach ($films as $film)
                        <div class="relative">
                            <div class="w-64 h-44 max-h-[22rem] rounded-sm bg-center-x bg-cover"
                                style="background-image: url({{ asset($film->poster) }})">
                            </div>
                            <div class="absolute -bottom-4 left-0 right-0 flex justify-center p-4">
                                <livewire:more-info-component :queryOrFilm="$film" />
                                <livewire:film-trailer-component :film="$film" />
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
            @if (!empty($watchedMovies))
                <div class="h-auto max-w-screen flex flex-col gap-2 justify-center pb-4 px-14">
                    <div class="flex flex-row items-center">
                        <h3 class="pt-10 z-10 text-white font-extrabold text-lg">Watch again and again</h3>
                        <img src="{{ asset('images/popcorn.webp') }}" class="w-7 h-7 ml-1 mt-8">
                    </div>
                    <div class="max-w-screen flex flex-row z-10 gap-7">
                        @php
                            $moviesCount = count($watchedMovies);
                            $remainingSkeletons = max(0, 5 - $moviesCount);
                        @endphp
                        @foreach ($watchedMovies as $film)
                            <div class="relative">
                                <div class="w-64 h-44 max-h-[22rem] rounded-sm bg-center-x bg-cover"
                                    style="background-image: url({{ asset($film->poster) }})">
                                </div>
                                <div class="absolute -bottom-4 left-0 right-0 flex justify-center p-4">
                                    <livewire:more-info-component :queryOrFilm="$film" />
                                    <livewire:film-trailer-component :film="$film" />
                                </div>
                            </div>
                        @endforeach
                        {{-- Agregar divs esqueletos si es necesario --}}
                        @for ($i = 0; $i < $remainingSkeletons; $i++)
                            <div class="relative">
                                <div class="w-64 h-44 max-h-[22rem] rounded-sm bg-[#202020] animate-pulse"></div>
                            </div>
                        @endfor
                    </div>
                </div>
            @endif
        @else
            <div
                class="banner absolute top-[40rem] left-0 right-0 w-11/12 h-40 mx-auto flex flex-row gap-14 justify-center items-center">
                <svg width="96" height="96" fill="none">
                    <path
                        d="M48 95.213c26.51 0 48-3.875 48-8.656 0-4.78-21.49-8.655-48-8.655S0 81.777 0 86.557c0 4.78 21.49 8.656 48 8.656Z"
                        fill="url(#a)"></path>
                    <path
                        d="M48 77.115c26.51 0 48-17.087 48-38.164C96 17.873 74.51.787 48 .787S0 17.874 0 38.95s21.49 38.164 48 38.164Z"
                        fill="url(#b)"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M75.376 75.624a2.36 2.36 0 1 0-2.817 1.408c-.062.157-.107.32-.134.486a3.15 3.15 0 0 0-1.161 4.298 3.146 3.146 0 0 0 4.297 1.161 3.148 3.148 0 0 0 4.927 2.228 2.36 2.36 0 1 0 3.662-2.809 3.148 3.148 0 0 0-4.448-4.447 2.355 2.355 0 0 0-2.67-.669 2.365 2.365 0 0 0-1.656-1.656Zm-50.983 1.49c0 .31-.044.619-.134.915a4.328 4.328 0 1 1-3.256 7.922 2.743 2.743 0 0 1-1.724.606c-.477.001-.946-.123-1.36-.358a1.966 1.966 0 0 1-3.74-.569 2.36 2.36 0 1 1-.013-4.445 3.148 3.148 0 0 1 4.07-3.145 3.148 3.148 0 1 1 6.157-.925Z"
                        fill="url(#c)"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M51.934 20.459c0 .388-.07.76-.198 1.102.234.114.452.256.65.422a3.146 3.146 0 0 1 3.102-1.498 3.147 3.147 0 0 1 5.888 1.646 3.154 3.154 0 0 1 1.953 1.498c.783.095 1.501.48 2.013 1.078a3.935 3.935 0 0 1 4.868 5.726c.559.375.983.918 1.212 1.552a3.148 3.148 0 0 1 5.26 3.445 3.147 3.147 0 1 1-3.08 4.701H24.392v-1.208a3.148 3.148 0 0 1-4.346-4.217 3.148 3.148 0 0 1 3.478-5.215 3.142 3.142 0 0 1 2.442-1.164 3.147 3.147 0 0 1 3.554-3.122 3.147 3.147 0 0 1 3.18-1.568 3.147 3.147 0 0 1 4.803-3.954 3.15 3.15 0 0 1 3.238 2.094c.41-.276.88-.45 1.371-.51a3.147 3.147 0 0 1 3.597-1.478 3.148 3.148 0 0 1 6.224.67Z"
                        fill="url(#d)"></path>
                    <path opacity="0.6" d="M46.033 36.984a7.475 7.475 0 1 0 0-14.951 7.475 7.475 0 0 0 0 14.95Z"
                        fill="url(#e)"></path>
                    <path opacity="0.6" d="M43.672 32.262a5.115 5.115 0 1 0 0-10.23 5.115 5.115 0 0 0 0 10.23Z"
                        fill="url(#f)"></path>
                    <path opacity="0.6" d="M42.098 36.197a5.115 5.115 0 1 0 0-10.23 5.115 5.115 0 0 0 0 10.23Z"
                        fill="url(#g)"></path>
                    <path opacity="0.6" d="M27.148 38.557a5.115 5.115 0 1 0 0-10.23 5.115 5.115 0 0 0 0 10.23Z"
                        fill="url(#h)"></path>
                    <path opacity="0.6" d="M30.295 36.197a5.115 5.115 0 1 0 0-10.23 5.115 5.115 0 0 0 0 10.23Z"
                        fill="url(#i)"></path>
                    <path opacity="0.6" d="M30.295 37.77a2.754 2.754 0 1 0 0-5.508 2.754 2.754 0 0 0 0 5.508Z"
                        fill="url(#j)"></path>
                    <path opacity="0.2" d="M73.574 36.197a2.754 2.754 0 1 0 0-5.508 2.754 2.754 0 0 0 0 5.508Z"
                        fill="url(#k)"></path>
                    <path opacity="0.2" d="M76.721 39.344a1.967 1.967 0 1 0 0-3.934 1.967 1.967 0 0 0 0 3.934Z"
                        fill="url(#l)"></path>
                    <path opacity="0.3" d="M72.787 40.131a3.541 3.541 0 1 0 0-7.082 3.541 3.541 0 0 0 0 7.082Z"
                        fill="url(#m)"></path>
                    <path opacity="0.2" d="M58.623 24.393a2.754 2.754 0 1 0 0-5.508 2.754 2.754 0 0 0 0 5.508Z"
                        fill="url(#n)"></path>
                    <path opacity="0.2" d="M48.393 21.246a1.967 1.967 0 1 0 0-3.935 1.967 1.967 0 0 0 0 3.935Z"
                        fill="url(#o)"></path>
                    <path opacity="0.2" d="M35.016 23.607a1.967 1.967 0 1 0 0-3.935 1.967 1.967 0 0 0 0 3.935Z"
                        fill="url(#p)"></path>
                    <path opacity="0.2" d="M61.77 33.05a5.115 5.115 0 1 0 0-10.23 5.115 5.115 0 0 0 0 10.23Z"
                        fill="url(#q)"></path>
                    <path opacity="0.6" d="M57.05 31.475a5.115 5.115 0 1 0 0-10.229 5.115 5.115 0 0 0 0 10.23Z"
                        fill="url(#r)"></path>
                    <path opacity="0.2" d="M59.41 33.836a5.115 5.115 0 1 0 0-10.23 5.115 5.115 0 0 0 0 10.23Z"
                        fill="url(#s)"></path>
                    <path d="M18.885 36.984h44.853l-3.935 51.934h-37.77l-3.148-51.934Z" fill="url(#t)"></path>
                    <path d="m71.607 85.77-11.804 3.148 3.935-51.934 14.95 3.934-7.081 44.852Z" fill="url(#u)"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="m46.33 47.333.254-10.35h-9.388l.104 9.84a16.418 16.418 0 0 0-4.664 1.825l-.327-11.664h-9.407l2.927 51.934h7.943l-.317-11.22a16.431 16.431 0 0 0 4.187 1.453l.105 9.767h7.558l.25-10.101a16.449 16.449 0 0 0 3.675-1.58l-.37 11.681h8.321l2.741-51.934h-9.417l-.388 12.237a16.47 16.47 0 0 0-3.788-1.888Zm16.078 40.89 2.95-.786 5.845-48.488-4.501-1.186-4.294 50.46Zm4.63-1.234 2.317-.618 7.838-45.846-4.375-1.152-5.78 47.616ZM53.507 62.95c0 6.953-5.636 12.59-12.59 12.59s-12.59-5.636-12.59-12.59 5.636-12.59 12.59-12.59 12.59 5.636 12.59 12.59Zm-7.172 6.795L44.64 64.26l4.108-3.047a.39.39 0 0 0-.2-.702 93.591 93.591 0 0 0-5.184-.274l-2.076-5.712a.394.394 0 0 0-.74 0l-2.076 5.712c-1.76.044-3.49.137-5.185.274a.39.39 0 0 0-.198.702l4.107 3.046-1.696 5.485a.394.394 0 0 0 .598.442l4.82-3.281 4.82 3.281a.394.394 0 0 0 .599-.441h-.001Z"
                        fill="url(#v)"></path>
                    <path opacity="0.4" d="M16.918 82.623a1.967 1.967 0 1 0 0-3.934 1.967 1.967 0 0 0 0 3.934Z"
                        fill="url(#w)"></path>
                    <path opacity="0.4" d="M13.77 84.984a1.967 1.967 0 1 0 0-3.935 1.967 1.967 0 0 0 0 3.935Z"
                        fill="url(#x)"></path>
                    <path opacity="0.4" d="M16.131 84.984a1.967 1.967 0 1 0 0-3.935 1.967 1.967 0 0 0 0 3.935Z"
                        fill="url(#y)"></path>
                    <path opacity="0.4" d="M19.279 86.557a1.967 1.967 0 1 0 0-3.934 1.967 1.967 0 0 0 0 3.934Z"
                        fill="url(#z)"></path>
                    <path opacity="0.4" d="M82.23 85.77a1.967 1.967 0 1 0 0-3.934 1.967 1.967 0 0 0 0 3.934Z"
                        fill="url(#A)"></path>
                    <path opacity="0.4" d="M81.836 82.623a2.36 2.36 0 1 0 0-4.721 2.36 2.36 0 0 0 0 4.721Z"
                        fill="url(#B)"></path>
                    <path opacity="0.4" d="M77.902 82.623a2.36 2.36 0 1 0 0-4.721 2.36 2.36 0 0 0 0 4.721Z"
                        fill="url(#C)"></path>
                    <path opacity="0.4" d="M75.147 81.836a2.754 2.754 0 1 0 0-5.508 2.754 2.754 0 0 0 0 5.508Z"
                        fill="url(#D)"></path>
                    <path opacity="0.4" d="M18.492 84.984a2.754 2.754 0 1 0 0-5.509 2.754 2.754 0 0 0 0 5.509Z"
                        fill="url(#E)"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M73.967 79.475a2.361 2.361 0 0 1 2.36 2.361 3.148 3.148 0 1 1-.88 6.17 2.36 2.36 0 0 1-4.613-.92 2.755 2.755 0 0 1 .773-5.222v-.028a2.36 2.36 0 0 1 2.36-2.36Z"
                        fill="url(#F)"></path>
                    <defs>
                        <radialGradient id="a" cx="0" cy="0" r="1"
                            gradientUnits="userSpaceOnUse" gradientTransform="matrix(0 -8.70201 48.2567 0 48 86.604)">
                            <stop offset="0.286" stop-color="#7D2889"></stop>
                            <stop offset="0.724" stop-color="#FF66D9" stop-opacity="0.41"></stop>
                            <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
                        </radialGradient>
                        <radialGradient id="b" cx="0" cy="0" r="1"
                            gradientUnits="userSpaceOnUse" gradientTransform="matrix(0 -38.3681 48.2567 0 48 39.155)">
                            <stop stop-color="#FFCA45"></stop>
                            <stop offset="0.453" stop-color="#FF66D9" stop-opacity="0.36"></stop>
                            <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
                        </radialGradient>
                        <radialGradient id="c" cx="0" cy="0" r="1"
                            gradientUnits="userSpaceOnUse" gradientTransform="rotate(180 23.41 39.738) scale(37.7705)">
                            <stop offset="0.432" stop-color="#FF8B54"></stop>
                            <stop offset="0.76" stop-color="#FFBB8D"></stop>
                            <stop offset="1" stop-color="#F9DDD1"></stop>
                        </radialGradient>
                        <radialGradient id="d" cx="0" cy="0" r="1"
                            gradientUnits="userSpaceOnUse" gradientTransform="matrix(0 -10.623 28.257 0 47.607 27.934)">
                            <stop offset="0.302" stop-color="#F9DDD1"></stop>
                            <stop offset="0.674" stop-color="#FFBB8D"></stop>
                            <stop offset="1" stop-color="#FF8B54"></stop>
                        </radialGradient>
                        <radialGradient id="e" cx="0" cy="0" r="1"
                            gradientUnits="userSpaceOnUse" gradientTransform="rotate(90 8.042 37.99) scale(7.03568)">
                            <stop offset="0.375" stop-color="#FFF4EB"></stop>
                            <stop offset="1" stop-color="#FFF3EB" stop-opacity="0"></stop>
                        </radialGradient>
                        <radialGradient id="f" cx="0" cy="0" r="1"
                            gradientUnits="userSpaceOnUse" gradientTransform="rotate(90 8.112 35.56) scale(4.81389)">
                            <stop offset="0.375" stop-color="#FFF4EB"></stop>
                            <stop offset="1" stop-color="#FFF3EB" stop-opacity="0"></stop>
                        </radialGradient>
                        <radialGradient id="g" cx="0" cy="0" r="1"
                            gradientUnits="userSpaceOnUse" gradientTransform="rotate(90 5.358 36.74) scale(4.81389)">
                            <stop offset="0.375" stop-color="#FFF4EB"></stop>
                            <stop offset="1" stop-color="#FFF3EB" stop-opacity="0"></stop>
                        </radialGradient>
                        <radialGradient id="h" cx="0" cy="0" r="1"
                            gradientUnits="userSpaceOnUse" gradientTransform="rotate(90 -3.298 30.445) scale(4.81389)">
                            <stop offset="0.375" stop-color="#FFF4EB"></stop>
                            <stop offset="1" stop-color="#FFF3EB" stop-opacity="0"></stop>
                        </radialGradient>
                        <radialGradient id="i" cx="0" cy="0" r="1"
                            gradientUnits="userSpaceOnUse" gradientTransform="rotate(90 -.544 30.839) scale(4.81389)">
                            <stop offset="0.375" stop-color="#FFF4EB"></stop>
                            <stop offset="1" stop-color="#FFF3EB" stop-opacity="0"></stop>
                        </radialGradient>
                        <radialGradient id="j" cx="0" cy="0" r="1"
                            gradientUnits="userSpaceOnUse" gradientTransform="rotate(90 -2.442 32.737) scale(2.59209)">
                            <stop offset="0.375" stop-color="#FFF4EB"></stop>
                            <stop offset="1" stop-color="#FFF3EB" stop-opacity="0"></stop>
                        </radialGradient>
                        <radialGradient id="k" cx="0" cy="0" r="1"
                            gradientUnits="userSpaceOnUse" gradientTransform="rotate(90 19.985 53.59) scale(2.59209)">
                            <stop offset="0.375" stop-color="#FFF4EB"></stop>
                            <stop offset="1" stop-color="#FFF3EB" stop-opacity="0"></stop>
                        </radialGradient>
                        <radialGradient id="l" cx="0" cy="0" r="1"
                            gradientUnits="userSpaceOnUse" gradientTransform="rotate(90 19.614 57.107) scale(1.85149)">
                            <stop offset="0.375" stop-color="#FFF4EB"></stop>
                            <stop offset="1" stop-color="#FFF3EB" stop-opacity="0"></stop>
                        </radialGradient>
                        <radialGradient id="m" cx="0" cy="0" r="1"
                            gradientUnits="userSpaceOnUse" gradientTransform="rotate(90 17.994 54.792) scale(3.33269)">
                            <stop offset="0.375" stop-color="#FFF4EB"></stop>
                            <stop offset="1" stop-color="#FFF3EB" stop-opacity="0"></stop>
                        </radialGradient>
                        <radialGradient id="n" cx="0" cy="0" r="1"
                            gradientUnits="userSpaceOnUse" gradientTransform="rotate(90 18.41 40.212) scale(2.59209)">
                            <stop offset="0.375" stop-color="#FFF4EB"></stop>
                            <stop offset="1" stop-color="#FFF3EB" stop-opacity="0"></stop>
                        </radialGradient>
                        <radialGradient id="o" cx="0" cy="0" r="1"
                            gradientUnits="userSpaceOnUse" gradientTransform="rotate(90 14.5 33.894) scale(1.8515)">
                            <stop offset="0.375" stop-color="#FFF4EB"></stop>
                            <stop offset="1" stop-color="#FFF3EB" stop-opacity="0"></stop>
                        </radialGradient>
                        <radialGradient id="p" cx="0" cy="0" r="1"
                            gradientUnits="userSpaceOnUse" gradientTransform="rotate(90 6.63 28.386) scale(1.85149)">
                            <stop offset="0.375" stop-color="#FFF4EB"></stop>
                            <stop offset="1" stop-color="#FFF3EB" stop-opacity="0"></stop>
                        </radialGradient>
                        <radialGradient id="q" cx="0" cy="0" r="1"
                            gradientUnits="userSpaceOnUse" gradientTransform="rotate(90 16.768 45.003) scale(4.81389)">
                            <stop offset="0.375" stop-color="#FFF4EB"></stop>
                            <stop offset="1" stop-color="#FFF3EB" stop-opacity="0"></stop>
                        </radialGradient>
                        <radialGradient id="r" cx="0" cy="0" r="1"
                            gradientUnits="userSpaceOnUse" gradientTransform="rotate(90 15.194 41.855) scale(4.81389)">
                            <stop offset="0.375" stop-color="#FFF4EB"></stop>
                            <stop offset="1" stop-color="#FFF3EB" stop-opacity="0"></stop>
                        </radialGradient>
                        <radialGradient id="s" cx="0" cy="0" r="1"
                            gradientUnits="userSpaceOnUse" gradientTransform="rotate(90 15.194 44.216) scale(4.81389)">
                            <stop offset="0.375" stop-color="#FFF4EB"></stop>
                            <stop offset="1" stop-color="#FFF3EB" stop-opacity="0"></stop>
                        </radialGradient>
                        <radialGradient id="w" cx="0" cy="0" r="1"
                            gradientUnits="userSpaceOnUse" gradientTransform="rotate(90 -31.927 48.845) scale(1.8515)">
                            <stop offset="0.375" stop-color="#F9DDD1"></stop>
                            <stop offset="1" stop-color="#FFF3EB" stop-opacity="0"></stop>
                        </radialGradient>
                        <radialGradient id="x" cx="0" cy="0" r="1"
                            gradientUnits="userSpaceOnUse" gradientTransform="rotate(90 -34.681 48.452) scale(1.8515)">
                            <stop offset="0.375" stop-color="#F9DDD1"></stop>
                            <stop offset="1" stop-color="#FFF3EB" stop-opacity="0"></stop>
                        </radialGradient>
                        <radialGradient id="y" cx="0" cy="0" r="1"
                            gradientUnits="userSpaceOnUse" gradientTransform="rotate(90 -33.5 49.632) scale(1.8515)">
                            <stop offset="0.375" stop-color="#F9DDD1"></stop>
                            <stop offset="1" stop-color="#FFF3EB" stop-opacity="0"></stop>
                        </radialGradient>
                        <radialGradient id="z" cx="0" cy="0" r="1"
                            gradientUnits="userSpaceOnUse" gradientTransform="rotate(90 -32.714 51.993) scale(1.85149)">
                            <stop offset="0.375" stop-color="#F9DDD1"></stop>
                            <stop offset="1" stop-color="#FFF3EB" stop-opacity="0"></stop>
                        </radialGradient>
                        <radialGradient id="A" cx="0" cy="0" r="1"
                            gradientUnits="userSpaceOnUse" gradientTransform="rotate(90 -.845 83.075) scale(1.85149)">
                            <stop offset="0.375" stop-color="#F9DDD1"></stop>
                            <stop offset="1" stop-color="#FFF3EB" stop-opacity="0"></stop>
                        </radialGradient>
                        <radialGradient id="B" cx="0" cy="0" r="1"
                            gradientUnits="userSpaceOnUse" gradientTransform="rotate(90 .718 81.118) scale(2.2218)">
                            <stop offset="0.375" stop-color="#F9DDD1"></stop>
                            <stop offset="1" stop-color="#FFF3EB" stop-opacity="0"></stop>
                        </radialGradient>
                        <radialGradient id="C" cx="0" cy="0" r="1"
                            gradientUnits="userSpaceOnUse" gradientTransform="rotate(90 -1.25 79.151) scale(2.2218)">
                            <stop offset="0.375" stop-color="#F9DDD1"></stop>
                            <stop offset="1" stop-color="#FFF3EB" stop-opacity="0"></stop>
                        </radialGradient>
                        <radialGradient id="D" cx="0" cy="0" r="1"
                            gradientUnits="userSpaceOnUse" gradientTransform="rotate(90 -2.048 77.196) scale(2.5921)">
                            <stop offset="0.375" stop-color="#F9DDD1"></stop>
                            <stop offset="1" stop-color="#FFF3EB" stop-opacity="0"></stop>
                        </radialGradient>
                        <radialGradient id="E" cx="0" cy="0" r="1"
                            gradientUnits="userSpaceOnUse" gradientTransform="rotate(90 -31.95 50.442) scale(2.5921)">
                            <stop offset="0.375" stop-color="#F9DDD1"></stop>
                            <stop offset="1" stop-color="#FFF3EB" stop-opacity="0"></stop>
                        </radialGradient>
                        <radialGradient id="F" cx="0" cy="0" r="1"
                            gradientUnits="userSpaceOnUse"
                            gradientTransform="rotate(111.038 9.116 68.506) scale(5.48002)">
                            <stop stop-color="#FDF7F2"></stop>
                            <stop offset="1" stop-color="#FFD8BD"></stop>
                        </radialGradient>
                        <linearGradient id="t" x1="59.803" y1="88.918" x2="33.764" y2="21.046"
                            gradientUnits="userSpaceOnUse">
                            <stop stop-color="#E0B1CC"></stop>
                            <stop offset="0.431" stop-color="#FFF1F1"></stop>
                            <stop offset="1" stop-color="#FFC9A5"></stop>
                        </linearGradient>
                        <linearGradient id="u" x1="59.803" y1="53.115" x2="83.41" y2="53.115"
                            gradientUnits="userSpaceOnUse">
                            <stop stop-color="#D16AE9"></stop>
                            <stop offset="1" stop-color="#FF661D"></stop>
                        </linearGradient>
                        <linearGradient id="v" x1="18.111" y1="36.984" x2="75.136" y2="85.621"
                            gradientUnits="userSpaceOnUse">
                            <stop stop-color="#FF661D"></stop>
                            <stop offset="0.5" stop-color="#CE3A00"></stop>
                            <stop offset="1" stop-color="#A60A5E"></stop>
                        </linearGradient>
                    </defs>
                </svg>
                <div class="flex flex-col text-white">
                    <h3 class="font-extrabold text-2xl">Join our platform to enjoy your favourites films.</h3>
                    <p class="font-semibold text-lg">Explore and share films with your friends.</p>
                    <div class="flex flex-row mt-3 text-[#448ef4] text-lg items-center">
                        <button type="button" class="inline-flex items-center me-2 mb-2 transition hover:scale-110">Log
                            In
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" data-mirrorinrtl="true"
                                class="default-ltr-cache-4z3qvp e1svuwfo1" data-name="ChevronRight"
                                aria-labelledby=":Ratahh:" aria-hidden="true">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M15.5859 12L8.29303 19.2928L9.70725 20.7071L17.7072 12.7071C17.8948 12.5195 18.0001 12.2652 18.0001 12C18.0001 11.7347 17.8948 11.4804 17.7072 11.2928L9.70724 3.29285L8.29303 4.70706L15.5859 12Z"
                                    fill="currentColor"></path>
                            </svg></button>

                    </div>
                </div>
            </div>
            {{-- <div class="w-full text-white mt-32 flex flex-row justify-center items-center">
                <div class="flex flex-col gap-3 w-[30rem]">
                    <h3 class="text-3xl font-bold">Disfruta en tu tele
                    </h3>
                    <p class="font-semibold text-lg">Smart TV, Playstation, Xbox, Chromecast, Apple TV, reproductores
                        Blu-ray y
                        muchos
                        más.
                    </p>
                </div>
                <div class="relative">
                    <!-- Imagen del televisor -->
                    <img src="{{ asset('images/tv.png') }}" alt="TV FlickFlow" class="w-full h-auto" />

                    <!-- Contenedor del video -->
                    <div class="absolute inset-0 flex justify-center items-center w-[28rem] left-24 bottom-7">
                        <!-- Video -->
                        <video data-uia="nmhp-card-animation-asset-video" autoplay="" playsinline="" muted=""
                            loop="">
                            <source
                                src="https://assets.nflxext.com/ffe/siteui/acquisition/ourStory/fuji/desktop/video-tv-0819.m4v"
                                type="video/mp4">
                        </video>
                    </div>
                </div>
            </div> --}}
        @endauth
    </div>

    <!-- Contenido de la página -->
</x-app-layout>
