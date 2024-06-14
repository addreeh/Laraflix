<x-app-layout>
    <livewire:movie-genre-component />
</x-app-layout>


{{-- <x-app-layout>
    <div class="my-10 mx-24 text-white">
        <div class="flex flex-row mb-6 justify-between">
            <div class="flex flex-row">
                <h1 class="text-2xl font-semibold">Search movies by category</h1>
                <img class="ml-2 w-6 h-6" src="{{ asset('images/ellipse.png') }}">
            </div>
            <div class="flex">
                <div class="inline-flex rounded-md shadow-sm" role="group">
                    @foreach ($genres as $key => $genre)
                        <button type="button"
                            class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 @if ($key == 0) rounded-s-lg @elseif($key == count($genres) - 1) rounded-e-lg @endif hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                            {{ $genre }}
                        </button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
