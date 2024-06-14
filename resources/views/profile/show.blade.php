<x-app-layout>
    @php
        $followedMovies = $user->followedMovies()->get();
        $viewedMovies = $user->viewedMovies()->get();
        $reviewedMovies = $user->reviewedMovies()->get();
    @endphp
    <div class="flex flex-row ml-36 text-white py-8">
        <h1 class="text-2xl font-semibold">{{ Auth::user()->username }}'s Profile</h1>
        <img class="ml-2 w-6 h-6" src="{{ asset('images/ellipse.png') }}">
    </div>
    <div class="grid grid-cols-3 w-10/12 mx-auto px-20 text-white text-center pb-10">
        <div class="flex flex-col">
            <div class="text-[#053BA3] text-5xl font-extrabold">{{ $followedMovies->count() }}</div>
            <div class="underline underline-offset-8 decoration-[#053BA3]">Following Films</div>
        </div>
        <div class="flex flex-col">
            <div class="text-[#053BA3] text-5xl font-extrabold">{{ $viewedMovies->count() }}</div>
            <div class="underline underline-offset-8 decoration-[#053BA3]">Watched Films</div>
        </div>
        <div class="flex flex-col">
            <div class="text-[#053BA3] text-5xl font-extrabold">{{ $reviewedMovies->count() }}</div>
            <div class="underline underline-offset-8 decoration-[#053BA3]">Reviewed Films</div>
        </div>
    </div>
    <div class="text-white mx-auto px-4 flex flex-col items-center">
        <h1 class="text-xl font-semibold pb-5">{{ Auth::user()->username }}'s Favourites Films</h1>
        <div class="flex flex-row gap-10 px-10">
            @foreach ($followedMovies as $movie)
                <a href="{{ route('show', $movie->id) }}">
                    <img class="rounded-lg h-[400px] w-[270px]" src="{{ asset($movie->poster) }}">
                </a>
            @endforeach
        </div>
        <img class="py-10" src="{{ asset('images/dots.png') }}">
    </div>
    <div class="text-white mx-auto px-4 flex flex-col items-center">
        <h1 class="text-xl font-semibold pb-5">{{ Auth::user()->username }}'s Watched Films</h1>
        <div class="flex flex-row gap-10 px-10">
            @foreach ($viewedMovies as $movie)
                <a href="{{ route('show', $movie->id) }}">
                    <img class="rounded-lg h-[400px] w-[270px]" src="{{ asset($movie->poster) }}">
                </a>
            @endforeach
        </div>
        <img class="py-10" src="{{ asset('images/dots.png') }}">
    </div>
    <div class="text-white mx-auto px-4 flex flex-col items-center">
        <h1 class="text-xl font-semibold pb-5">{{ Auth::user()->username }}'s Reviews</h1>
        <div class="grid grid-cols-2 gap-10 px-10">
            @foreach ($reviewedMovies as $movie)
                <div class="w-full h-[300px] rounded-lg flex flex-row"
                    style="background-color: rgba(233, 166, 166, 0.05)">
                    {{-- <img src="{{ $review->user->profile_image }}" alt="{{ $review->user->name }}"
                    class="w-32 h-32 rounded-full"> --}}
                    <img src="{{ asset('images/avatar.jpg') }}" alt="{{ Auth::user()->name }}"
                        class="w-32 h-32 rounded-full mt-4 ml-4">
                    <div class="mx-10 flex flex-col flex-grow justify-between">
                        <div class="flex items-center mt-4">
                            <h2 class="font-semibold text-xl">{{ $movie->title }}</h2>
                            <span class="ml-3 mt-1 font-regular text-gray-400">{{ $movie->release_year }}</span>
                        </div>
                        <div class="flex items-center mt-1">
                            <h3 class="text-gray-400">Review by <span
                                    class="text-[#053BA3]">{{ Auth::user()->username }}</span></h3>
                            <div class="flex items-center ml-2">
                                @for ($i = 0; $i < 5; $i++)
                                    @if ($i < $movie->pivot->rating)
                                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                            <path
                                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                        </svg>
                                    @endif
                                @endfor
                            </div>
                        </div>
                        <h4 class="grow mt-3">{{ $movie->pivot->comment }}</h4>
                    </div>
                    <img src="{{ $movie->poster }}" alt="{{ $movie->title }}"
                        class="justify-end w-[250px] rounded-lg">
                </div>
            @endforeach
        </div>
        <img class="py-10" src="{{ asset('images/dots.png') }}">
    </div>
    @php
        $followedMovies = $user->followedMovies()->get();
        $viewedMovies = $user->viewedMovies()->get();
        $reviewedMovies = $user->reviewedMovies()->get();
    @endphp
    <div class="flex flex-row ml-36 text-white py-8">
        <h1 class="text-2xl font-semibold">{{ Auth::user()->username }}'s Profile</h1>
        <img class="ml-2 w-6 h-6" src="{{ asset('images/ellipse.png') }}">
    </div>
    <div class="grid grid-cols-3 w-10/12 mx-auto px-20 text-white text-center pb-10">
        <div class="flex flex-col">
            <div class="text-[#053BA3] text-5xl font-extrabold">{{ $followedMovies->count() }}</div>
            <div class="underline underline-offset-8 decoration-[#053BA3]">Following Films</div>
        </div>
        <div class="flex flex-col">
            <div class="text-[#053BA3] text-5xl font-extrabold">{{ $viewedMovies->count() }}</div>
            <div class="underline underline-offset-8 decoration-[#053BA3]">Watched Films</div>
        </div>
        <div class="flex flex-col">
            <div class="text-[#053BA3] text-5xl font-extrabold">{{ $reviewedMovies->count() }}</div>
            <div class="underline underline-offset-8 decoration-[#053BA3]">Reviewed Films</div>
        </div>
    </div>
    <div class="text-white mx-auto px-4 flex flex-col items-center">
        <h1 class="text-xl font-semibold pb-5">{{ Auth::user()->username }}'s Favourites Films</h1>
        <div class="flex flex-row gap-10 px-10">
            @foreach ($followedMovies as $movie)
                <a href="{{ route('show', $movie->id) }}">
                    <img class="rounded-lg h-[400px] w-[270px]" src="{{ asset($movie->poster) }}">
                </a>
            @endforeach
        </div>
        <img class="py-10" src="{{ asset('images/dots.png') }}">
    </div>
    <div class="text-white mx-auto px-4 flex flex-col items-center">
        <h1 class="text-xl font-semibold pb-5">{{ Auth::user()->username }}'s Watched Films</h1>
        <div class="flex flex-row gap-10 px-10">
            @foreach ($viewedMovies as $movie)
                <a href="{{ route('show', $movie->id) }}">
                    <img class="rounded-lg h-[400px] w-[270px]" src="{{ asset($movie->poster) }}">
                </a>
            @endforeach
        </div>
        <img class="py-10" src="{{ asset('images/dots.png') }}">
    </div>
    <div class="text-white mx-auto px-4 flex flex-col items-center">
        <h1 class="text-xl font-semibold pb-5">{{ Auth::user()->username }}'s Reviews</h1>
        <div class="grid grid-cols-2 gap-10 px-10">
            @foreach ($reviewedMovies as $movie)
                <div class="w-full h-[300px] rounded-lg flex flex-row"
                    style="background-color: rgba(233, 166, 166, 0.05)">
                    {{-- <img src="{{ $review->user->profile_image }}" alt="{{ $review->user->name }}"
                class="w-32 h-32 rounded-full"> --}}
                    <img src="{{ asset('images/avatar.jpg') }}" alt="{{ Auth::user()->name }}"
                        class="w-32 h-32 rounded-full mt-4 ml-4">
                    <div class="mx-10 flex flex-col flex-grow justify-between">
                        <div class="flex items-center mt-4">
                            <h2 class="font-semibold text-xl">{{ $movie->title }}</h2>
                            <span class="ml-3 mt-1 font-regular text-gray-400">{{ $movie->release_year }}</span>
                        </div>
                        <div class="flex items-center mt-1">
                            <h3 class="text-gray-400">Review by <span
                                    class="text-[#053BA3]">{{ Auth::user()->username }}</span></h3>
                            <div class="flex items-center ml-2">
                                @for ($i = 0; $i < 5; $i++)
                                    @if ($i < $movie->pivot->rating)
                                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 22 20">
                                            <path
                                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                        </svg>
                                    @endif
                                @endfor
                            </div>
                        </div>
                        <h4 class="grow mt-3">{{ $movie->pivot->comment }}</h4>
                    </div>
                    <img src="{{ $movie->poster }}" alt="{{ $movie->title }}"
                        class="justify-end w-[250px] rounded-lg">
                </div>
            @endforeach
        </div>
        <img class="py-10" src="{{ asset('images/dots.png') }}">
    </div>
</x-app-layout>
