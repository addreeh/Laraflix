<x-app-layout>
    <div class="flex flex-row justify-center -mt-[40rem] gap-10">
        <div class="rounded-lg shadow-sm shadow-red-500"><img class="object-cover rounded-lg h-full"
                src="{{ $movie->poster }}" alt="{{ $movie->title }}">
        </div>
        <div class="relative flex flex-col py-4 bg-[#564d4d] leading-normal rounded-md gap-3 w-[45rem]">
            <h1 class="pt-2 px-8 uppercase text-3xl font-bold tracking-tight text-white">
                {{ $movie->title }}</h1>
            <p class="px-8 font-normal text-gray-300">{{ $movie->description }}</p>
            <div class="px-10 flex flex-row mt-2 items-center justify-between pb-3">
                <div>
                    <span
                        class="text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">{{ $movie->director }}</span>
                    <span
                        class="text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">{{ $movie->genre }}</span>
                    <span
                        class="text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">{{ $movie->release_year }}</span>
                </div>
                <div class="flex ml-10">
                    <div class="flex space-x-1 rtl:space-x-reverse">
                        @for ($i = 0; $i < 5; $i++)
                            @if ($i < $averageRating)
                                <svg class="w-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 22 20">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                            @else
                                <svg class="w-4 text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 22 20">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                            @endif
                        @endfor

                    </div>
                    <span
                        class="text-xs font-semibold px-2.5 py-1 rounded dark:bg-red-200 dark:text-red-800 ml-4 h-6">{{ $averageRating }}</span>
                </div>
                <livewire:toggle-component :film="$movie" />
            </div>
            <div class="px-8 flex flex-row mb-10 gap-10">
                @foreach ($reviews as $review)
                    <div class="flex items-start gap-2.5">
                        <img class="h-8 rounded-full" src="{{ asset($review->user->picture) }}"
                            alt="{{ $review->user->name }} {{ $review->user->surname }}">
                        <div
                            class="flex flex-col w-full max-w-[320px] leading-1.5 p-4 border-gray-200 rounded-e-xl rounded-es-xl bg-[#222222]">
                            <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                <span class="text-sm font-semibold text-white">{{ $review->user->username }}</span>
                                <span
                                    class="text-sm font-normal text-gray-500 dark:text-gray-400">{{ $review->created_at->format('d/m/Y') }}</span>
                            </div>
                            <p class="text-sm font-normal py-2.5 text-white">{{ $review->comment }}
                            </p>
                            {{-- <span class="text-sm font-normal text-gray-400">{{ $review->rating }}</span> --}}
                            <div class="flex space-x-1 rtl:space-x-reverse mt-2">
                                @for ($i = 0; $i < 5; $i++)
                                    @if ($i < $review->rating)
                                        <svg class="w-4 text-yellow-300" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                            <path
                                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                        </svg>
                                    @else
                                        <svg class="w-4 text-gray-600" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                            <path
                                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                        </svg>
                                    @endif
                                @endfor

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="absolute bottom-0 w-full">
                <form action="{{ url('/films/review') }}" method="POST" href="{{ route('review') }}">
                    @csrf
                    <!-- Añadir un campo de token CSRF para protección contra ataques de falsificación de solicitudes entre sitios -->
                    <label for="chat" class="sr-only">Your comment</label>
                    <div class="mt-10 flex items-center px-3 py-2 rounded-lg">
                        <input type="hidden" name="movie_id" value="{{ $movie->id }}">
                        <select name="rating"
                            class="text-sm rounded-lg  block p-2.5 bg-[#222222] border-gray-600 dark:placeholder-gray-400 text-white focus:ring-red-500 focus:border-red-500">
                            @for ($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}">{{ $i }} ⭐️</option>
                            @endfor
                        </select>
                        <textarea id="chat" name="comment" rows="1"
                            class="block mx-4 p-2.5 w-full text-sm text-gray-900  rounded-lg border border-gray-300 focus:ring-red-500 focus:border-red-500 bg-[#222222] dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500"
                            placeholder="Your comment..."></textarea>
                        <button type="submit"
                            class="inline-flex justify-center p-2  rounded-full cursor-pointer hover:bg-red-100 text-red-600 dark:hover:bg-[#222222]">
                            <svg class="w-5 h-5 rotate-90 rtl:-rotate-90" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                <path
                                    d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z" />
                            </svg>
                            <span class="sr-only">Send comment</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="mx-auto mt-10 flex justify-center"> <!-- Agrega las clases mx-auto y flex justify-center aquí -->
        @if (session('msg') == 1)
            <x-toast-success>Film Followed.</x-toast-success>
        @endif
        @if (session('msg') == 3)
            <x-toast-success>Film Watched.</x-toast-success>
        @endif
        @if (session('msg') == 5)
            <x-toast-success>Review added.</x-toast-success>
        @endif

        @if (session('msg') == 2)
            <x-toast-danger>Film Unfollowed.</x-toast-danger>
        @endif
        @if (session('msg') == 4)
            <x-toast-danger>Film Unwatched.</x-toast-danger>
        @endif
    </div>

</x-app-layout>


{{-- <x-app-layout>
    <div class="relative flex flex-row items-center bg-white border border-[#e6030c] rounded-lg shadow dark:bg-gray-800  mx-auto  w-[1000px] h-[500px] -mt-[40rem]"
        style="background-color: rgba(233, 166, 166, 0.05)">
        <img class="object-cover rounded-t-lg w-80 md:rounded-none md:rounded-s-lg h-[499px]" src="{{ $movie->poster }}"
            alt="{{ $movie->title }}">
        <div class="flex flex-col justify-between py-4  leading-normal">
            <h1
                class="px-8 righteous-regular uppercase mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                {{ $movie->title }}</h1>
            <p class="px-8 mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $movie->description }}</p>
            <div class="px-8 flex flex-row mt-2 mb-5">
                <div class="mt-1">
                    <span
                        class="text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">{{ $movie->director }}</span>
                    <span
                        class="text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">{{ $movie->genre }}</span>
                    <span
                        class="text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">{{ $movie->release_year }}</span>
                </div>
                <div class="flex ml-10">
                    <div class="flex space-x-1 rtl:space-x-reverse">
                        @for ($i = 0; $i < 5; $i++)
                            @if ($i < $averageRating)
                                <svg class="w-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 22 20">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                            @else
                                <svg class="w-4 text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 22 20">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                            @endif
                        @endfor

                    </div>
                    <span
                        class="text-xs font-semibold px-2.5 py-1 rounded dark:bg-red-200 dark:text-red-800 ml-4 h-6 mt-2">{{ $averageRating }}</span>
                </div>
                <livewire:toggle-component :film="$movie" />
            </div>
            <div class="px-8 flex flex-row mb-10 gap-10">

                @foreach ($reviews as $review)
                    <div class="flex items-start gap-2.5">
                        <img class="h-8 rounded-full" src="{{ asset($review->user->picture) }}"
                            alt="{{ $review->user->name }} {{ $review->user->surname }}">
                        <div
                            class="flex flex-col w-full max-w-[320px] leading-1.5 p-4 border-gray-200 rounded-e-xl rounded-es-xl bg-gray-700">
                            <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                <span class="text-sm font-semibold text-white">{{ $review->user->username }}</span>
                                <span
                                    class="text-sm font-normal text-gray-500 dark:text-gray-400">{{ $review->created_at->format('d/m/Y') }}</span>
                            </div>
                            <p class="text-sm font-normal py-2.5 text-white">{{ $review->comment }}
                            </p>
                            <div class="flex space-x-1 rtl:space-x-reverse mt-2">
                                @for ($i = 0; $i < 5; $i++)
                                    @if ($i < $review->rating)
                                        <svg class="w-4 text-yellow-300" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                            <path
                                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                        </svg>
                                    @else
                                        <svg class="w-4 text-gray-600" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                            <path
                                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                        </svg>
                                    @endif
                                @endfor

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="absolute w-[678px] bottom-0">
                <form action="{{ url('/films/review') }}" method="POST" href="{{ route('review') }}">
                    @csrf
                    <label for="chat" class="sr-only">Your comment</label>
                    <div class="mt-10 flex items-center px-3 py-2 rounded-lg bg-gray-50 dark:bg-gray-700">
                        <input type="hidden" name="movie_id" value="{{ $movie->id }}">
                        <select name="rating"
                            class="text-sm rounded-lg  block p-2.5 bg-gray-700 border-gray-600 dark:placeholder-gray-400 text-white">
                            @for ($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}">{{ $i }} ⭐️</option>
                            @endfor
                        </select>
                        <textarea id="chat" name="comment" rows="1"
                            class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Your comment..."></textarea>
                        <button type="submit"
                            class="inline-flex justify-center p-2 text-red-600 rounded-full cursor-pointer hover:bg-red-100 dark:text-red-500 dark:hover:bg-gray-600">
                            <svg class="w-5 h-5 rotate-90 rtl:-rotate-90" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                <path
                                    d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z" />
                            </svg>
                            <span class="sr-only">Send comment</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="mx-auto mt-10 flex justify-center">
        @if (session('msg') == 1)
            <x-toast-success>Film Followed.</x-toast-success>
        @endif
        @if (session('msg') == 3)
            <x-toast-success>Film Watched.</x-toast-success>
        @endif
        @if (session('msg') == 5)
            <x-toast-success>Review added.</x-toast-success>
        @endif

        @if (session('msg') == 2)
            <x-toast-danger>Film Unfollowed.</x-toast-danger>
        @endif
        @if (session('msg') == 4)
            <x-toast-danger>Film Unwatched.</x-toast-danger>
        @endif
    </div>

</x-app-layout> --}}
