<div class="my-10 mx-24 text-white">
    <div class="flex flex-row mb-6 justify-between">
        <div class="flex flex-row">
            <h1 class="text-2xl font-semibold">Search your favourite movie</h1>
            <img class="ml-2 w-6 h-6" src="{{ asset('images/ellipse.png') }}">
        </div>
        <div class="flex">
            <div class="relative w-full">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="icon icon-tabler icon-tabler-movie w-4 h-4 text-gray-500 dark:text-gray-400 mr-1"
                        viewBox="0 0 21 21" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="
                        M0 0h24v24H0z" fill="none" />
                        <path d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
                        <path d="M8 4l0 16" />
                        <path d="M16 4l0 16" />
                        <path d="M4 8l4 0" />
                        <path d="M4 16l4 0" />
                        <path d="M4 12l16 0" />
                        <path d="M16 8l4 0" />
                        <path d="M16 16l4 0" />
                    </svg>
                </div>
                <input wire:model.live="searchTerm" type="text" id="simple-search"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search movie title..." required />
            </div>
            <button wire:click="$refresh" type="submit"
                class="p-2.5 ms-2 text-sm font-medium text-white bg-[#053BA3] rounded-lg border border-[#053BA3] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300  dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
                <span class="sr-only">Search</span>
            </button>
        </div>
    </div>
    <div class="grid auto-rows-[500px] grid-cols-3 gap-4">
        @foreach ($movies as $index => $movie)
            <div key="{{ $index }}"
                class="relative rounded-xl border-2 border-slate-400/10 bg-neutral-100 dark:bg-neutral-900 flex flex-col justify-end">
                <img src="{{ $movie->poster }}" alt="{{ $movie->title }}" class="object-auto w-full h-full rounded-xl">
                <div
                    class="absolute inset-x-0 bottom-0 bg-gray-900 bg-opacity-75 p-4 flex justify-between items-center">
                    <div class="flex flex-col">
                        <h2 class="righteous-regular uppercase text-lg font-bold">{{ $movie->title }}</h2>
                        <p class="text-white">{{ $movie->release_year }}</p>
                    </div>
                    <div>
                        <a href="{{ route('show', $movie->id) }}">
                            <button
                                class="bg-[#053BA3] text-white rounded-full py-1 px-5 font-bold hover:bg-[#032f7a] transform hover:scale-110 transition-all">More
                                Info</button>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
