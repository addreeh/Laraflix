<div>
    <button wire:click="openModal" type="button"
        class="font-sans text-white bg-gray-500 bg-opacity-70 font-bold rounded-md text-base px-5 pt-2.5 pb-3 text-center inline-flex items-center me-2 mb-2 transition hover:scale-110 hover:bg-gray-600">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-info-circle mr-2" width="26"
            height="26" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
            stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
            <path d="M12 9h.01" />
            <path d="M11 12h1v4h1" />
        </svg>
        More Info
    </button>
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
                    <div class="h-full max-h-72"
                        style="z-index: 40; position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgb(0,0,0);
                        background: -moz-linear-gradient(180deg, rgba(0,0,0,0) 0%, rgba(0,0,0,0.5311778290993072) 50%, rgba(0,0,0,1) 100%);
                        background: -webkit-linear-gradient(180deg, rgba(0,0,0,0) 0%, rgba(0,0,0,0.5311778290993072) 50%, rgba(0,0,0,1) 100%);
                        background: linear-gradient(180deg, rgba(0,0,0,0) 0%, rgba(0,0,0,0.5311778290993072) 50%, rgba(0,0,0,1) 100%);
                        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#000000',endColorstr='#000000',GradientType=1);">
                    </div>
                    <div class="poster h-full max-h-72 bg-contain relative"
                        style="background-image: url({{ $data->Poster }}); background-size: contain;">

                        <div class="absolute bottom-0 p-5  z-50 text-white">
                            <div class="flex flex-row gap-4">

                                <h3 class="font-extrabold text-4xl text-end">{{ $data->Title }}</h3>
                                @if (strlen($data->Title) > 20)
                                    <div class="mt-1">
                                @endif
                                <button wire:click="toggleWatch"
                                    class="border border-white rounded-full px-1.5 py-1.5 transition hover:scale-110">
                                    @if ($isWatched)
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-eye-filled" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M12 4c4.29 0 7.863 2.429 10.665 7.154l.22 .379l.045 .1l.03 .083l.014 .055l.014 .082l.011 .1v.11l-.014 .111a.992 .992 0 0 1 -.026 .11l-.039 .108l-.036 .075l-.016 .03c-2.764 4.836 -6.3 7.38 -10.555 7.499l-.313 .004c-4.396 0 -8.037 -2.549 -10.868 -7.504a1 1 0 0 1 0 -.992c2.831 -4.955 6.472 -7.504 10.868 -7.504zm0 5a3 3 0 1 0 0 6a3 3 0 0 0 0 -6z"
                                                stroke-width="0" fill="currentColor" />
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye"
                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                            <path
                                                d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                        </svg>
                                    @endif
                                </button>

                                <button wire:click="toggleFollow"
                                    class="border border-white rounded-full px-1.5 py-1.5 transition hover:scale-110">
                                    @if ($isFollowing)
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-thumb-up-filled" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M13 3a3 3 0 0 1 2.995 2.824l.005 .176v4h2a3 3 0 0 1 2.98 2.65l.015 .174l.005 .176l-.02 .196l-1.006 5.032c-.381 1.626 -1.502 2.796 -2.81 2.78l-.164 -.008h-8a1 1 0 0 1 -.993 -.883l-.007 -.117l.001 -9.536a1 1 0 0 1 .5 -.865a2.998 2.998 0 0 0 1.492 -2.397l.007 -.202v-1a3 3 0 0 1 3 -3z"
                                                stroke-width="0" fill="currentColor" />
                                            <path
                                                d="M5 10a1 1 0 0 1 .993 .883l.007 .117v9a1 1 0 0 1 -.883 .993l-.117 .007h-1a2 2 0 0 1 -1.995 -1.85l-.005 -.15v-7a2 2 0 0 1 1.85 -1.995l.15 -.005h1z"
                                                stroke-width="0" fill="currentColor" />
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-thumb-up" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M7 11v8a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1v-7a1 1 0 0 1 1 -1h3a4 4 0 0 0 4 -4v-1a2 2 0 0 1 4 0v5h3a2 2 0 0 1 2 2l-1 5a2 3 0 0 1 -2 2h-7a3 3 0 0 1 -3 -3" />
                                        </svg>
                                    @endif
                                </button>
                                @if (strlen($data->Title) > 20)
                            </div>
    @endif
</div>

</div>
</div>
<div class="p-5 flex flex-row gap-5">
    <div class="flex flex-col w-[40rem]">
        <div class="flex flex-row gap-5 text-sm mb-4">
            {{-- <p class="text-green-400 pt-[0.1rem]">valoracion</p> --}}
            <a href="{{ route('pdf', $data->Title) }}"
                class="text-green-400 pt-[0.1rem] font-bold transition hover:scale-x-125 cursor-pointer">PDF</a>
            <p class="text-gray-300 pt-[0.1rem]">{{ $this->formatRuntime($data->Runtime) }}</p>
            <p class="text-gray-300 pt-[0.1rem]">{{ $data->Year }}</p>
            <span
                class="bg-[#DD0E1F] text-red-200 text-sm font-medium me-2 px-2.5 py-0.5 rounded ">{{ $data->imdbVotes }}</span>
        </div>
        <p class="text-white text-sm
                                    font-semibold mb-4">
            {{ $data->Plot }}
        </p>

    </div>
    <div class="flex flex-col gap-2">
        <p class="text-xs font-semibold text-white"><span class="text-gray-500 text-[0.8rem]">Cast:
            </span>{{ $data->Actors }}</p>
        <p class="text-xs font-semibold text-white"><span class="text-gray-500 text-[0.8rem]">Genres:
            </span>{{ $data->Genre }}</p>
    </div>
</div>
<div class="p-5 flex items-center gap-3">
    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-library" width="24"
        height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
        stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path
            d="M7 3m0 2.667a2.667 2.667 0 0 1 2.667 -2.667h8.666a2.667 2.667 0 0 1 2.667 2.667v8.666a2.667 2.667 0 0 1 -2.667 2.667h-8.666a2.667 2.667 0 0 1 -2.667 -2.667z" />
        <path d="M4.012 7.26a2.005 2.005 0 0 0 -1.012 1.737v10c0 1.1 .9 2 2 2h10c.75 0 1.158 -.385 1.5 -1" />
        <path d="M11 7h5" />
        <path d="M11 10h6" />
        <path d="M11 13h3" />
    </svg>
    <span>Similar {{ $data->Title }}'s Films</span>
</div>

<div class="flex flex-row gap-5 px-5 pb-5">
    @php
        $moviesCount = count($similarFilms);
        $remainingSkeletons = max(0, 3 - $moviesCount);
    @endphp
    @foreach ($similarFilms as $film)
        <div class="relative flex justify-center items-center">
            <a href="{{ route('show', $film->id) }}" class="transition hover:scale-110">
                <div class="w-40 h-44 max-h-[22rem] rounded-sm flex justify-center items-center"
                    style="background-image: url({{ asset($film->poster) }}); background-position: center; background-size: cover;">
                </div>
            </a>
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
</div>
</div>
@endif
</div>
