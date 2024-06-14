<style>
    /* *::-webkit-scrollbar {
        width: 15px;
    }

    *::-webkit-scrollbar-track {
        background: var(--primary);
        border-radius: 5px;
    }

    *::-webkit-scrollbar-thumb {
        background-color: var(--secondary);
        border-radius: 14px;
        border: 3px solid var(--primary);
    } */

    .edit-button {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: #564d4d;
        border: none;
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.164);
        cursor: pointer;
        transition-duration: 0.3s;
        overflow: hidden;
        position: relative;
        text-decoration: none !important;
    }

    .edit-svgIcon {
        width: 17px;
        transition-duration: 0.3s;
    }

    .edit-svgIcon path {
        fill: white;
    }

    .edit-button:hover {
        width: 120px;
        border-radius: 50px;
        transition-duration: 0.3s;
        background-color: rgb(255, 69, 69);
        align-items: center;
    }

    .edit-button:hover .edit-svgIcon {
        width: 20px;
        transition-duration: 0.3s;
        transform: translateY(60%);
        -webkit-transform: rotate(360deg);
        -moz-transform: rotate(360deg);
        -o-transform: rotate(360deg);
        -ms-transform: rotate(360deg);
        transform: rotate(360deg);
    }

    .edit-button::before {
        display: none;
        content: "Edit";
        color: white;
        transition-duration: 0.3s;
        font-size: 2px;
    }

    .edit-button:hover::before {
        display: block;
        padding-right: 10px;
        font-size: 13px;
        opacity: 1;
        transform: translateY(0px);
        transition-duration: 0.3s;
    }

    .remove-button {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: rgb(20, 20, 20);
        border: none;
        font-weight: 600;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.164);
        cursor: pointer;
        transition-duration: 0.3s;
        overflow: hidden;
        position: relative;
        gap: 2px;
        margin-top: 15px;
    }

    .svgIcon {
        width: 12px;
        transition-duration: 0.3s;
    }

    .svgIcon path {
        fill: white;
    }

    .remove-button:hover {
        transition-duration: 0.3s;
        background-color: rgb(255, 69, 69);
        align-items: center;
        gap: 0;
    }

    .bin-top {
        transform-origin: bottom right;
    }

    .remove-button:hover .bin-top {
        transition-duration: 0.5s;
        transform: rotate(160deg);
    }

    #button-edit {
        transition: transform .7s ease-in-out;

    }

    #button-edit:hover {
        transform: rotate(360deg);
    }
</style>
<x-app-layout>
    <!-- Main modal -->
    <div id="crud-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative rounded-lg shadow bg-[#221F1F]">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-[#e6030c]">
                    <h3 class="text-lg font-semibold text-white">
                        Edit Review
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form id="edit-form" method="POST" class="p-4 md:p-5">
                    @csrf <!-- Agregar token CSRF -->
                    @method('PUT') <!-- Método de envío POST -->
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Comment</label>
                            <textarea id="review-comment" name="review-comment" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-[#e6030c] focus:border-[#e6030c] dark:bg-[#564d4d] dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-[#e6030c] dark:focus:border-[#e6030c]"></textarea>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="col-span-2 sm:col-span-1">
                            <label for="category"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rating</label>
                            <select id="review-rating" name="review-rating"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#e6030c] focus:border-[#e6030c] block w-full p-2.5 dark:bg-[#564d4d] dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-[#e6030c] dark:focus:border-[#e6030c]">
                                @for ($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="flex items-end justify-center">
                            <button class="edit-button">
                                <svg class="edit-svgIcon" viewBox="0 0 512 512">
                                    <path
                                        d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div class="flex flex-row gap-10 -mt-[42rem]">
        <div class="flex flex-col mx-auto ml-10">
            <div class="text-white card h-64 w-96 bg-[#564d4d] shadow hover:shadow mt-24 rounded-md">
                <img class="w-40 h-40 mx-auto rounded-full -mt-20 border-8 border-white"
                    src="{{ asset($user->picture) }}" alt="{{ $user->username }}">
                <div class="text-center mt-2 text-3xl font-medium">{{ $user->name }} {{ $user->surname }}</div>
                <div class="text-center mt-2 font-light text-sm">&#64;{{ $user->username }}</div>
                <hr class="w-48 h-1 mx-auto mt-3  border-0 rounded  bg-[#E6030C]">
                <div class="flex p-4">
                    <div class="w-1/2 text-center">
                        <span class="font-bold"> {{ $followedMovies->count() }}</span> Following
                    </div>
                    <div class="w-0 border-2 border-[#E6030C] rounded">
                    </div>
                    <div class="w-1/2 text-center">
                        <span class="font-bold"> {{ $viewedMovies->count() }}</span> Watched
                    </div>
                    <div class="w-0 border-2 border-[#E6030C] rounded">
                    </div>
                    <div class="w-1/2 text-center">
                        <span class="font-bold"> {{ $reviewedMovies->count() }}</span> Reviews
                    </div>
                </div>
            </div>
            <div class="mx-auto mt-10">
                @if (session('msg') == 1)
                    <x-toast-success>Review Edited.</x-toast-success>
                @endif
                @if (session('msg') == 2)
                    <x-toast-danger>Review Removed.</x-toast-danger>
                @endif
            </div>
        </div>
        <div class="w-[65rem] pt-16">
            <h3 class="mb-1 text-white font-extrabold text-lg">Following Films
            </h3>
            <div class="w-[62rem] flex flex-row gap-7 overflow-x-auto overflow-y-hidden">
                @php
                    $moviesCount = count($followedMovies);
                    $remainingSkeletons = max(0, 5 - $moviesCount);
                @endphp
                @foreach ($followedMovies as $film)
                    <div class="relative">
                        {{-- <div class="w-72 h-96 max-h-[22rem] rounded-lg"
                        style="background-image: url({{ asset($film->poster) }})">
                    </div> --}}
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
                {{-- Agregar divs esqueletos si es necesario --}}
                @for ($i = 0; $i < $remainingSkeletons; $i++)
                    <div class="relative">
                        <div class="w-64 h-44 max-h-[22rem] rounded-sm bg-[#202020] animate-pulse"></div>
                    </div>
                @endfor
            </div>

            <h3 class="mt-5 mb-1 text-white font-extrabold text-lg">Watched Films
            </h3>
            <div class="w-[62rem] flex flex-row gap-7 overflow-x-auto overflow-y-hidden">
                @php
                    $moviesCount = count($viewedMovies);
                    $remainingSkeletons = max(0, 5 - $moviesCount);
                @endphp
                @foreach ($viewedMovies as $film)
                    <div class="relative">
                        {{-- <div class="w-72 h-96 max-h-[22rem] rounded-lg"
                        style="background-image: url({{ asset($film->poster) }})">
                    </div> --}}
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
                {{-- Agregar divs esqueletos si es necesario --}}
                @for ($i = 0; $i < $remainingSkeletons; $i++)
                    <div class="relative">
                        <div class="w-64 h-44 max-h-[22rem] rounded-sm bg-[#202020] animate-pulse"></div>
                    </div>
                @endfor
            </div>


            <h3 class="mt-5 mb-1 text-white font-extrabold text-lg">Reviews
            </h3>

            <div class="w-[62rem] flex flex-row gap-7 overflow-x-auto overflow-y-hidden">
                @php
                    $moviesCount = count($reviewedMovies);
                    $remainingSkeletons = max(0, 5 - $moviesCount);
                @endphp
                @foreach ($reviewedMovies as $review)
                    <div class="w-[350px]">
                        <div
                            class="flex flex-col w-[350px] p-4 border-gray-200 rounded-e-xl rounded-es-xl bg-[#564d4d]">
                            <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                <span class="uppercase text-sm font-semibold text-white">{{ $review->title }}</span>
                                <span
                                    class="text-sm font-normal text-gray-500 dark:text-gray-400">{{ $review->pivot->updated_at->format('d/m/Y') }}</span>
                            </div>
                            <p class="text-sm font-normal pt-2.5 text-white">{{ $review->pivot->comment }}</p>
                            <div class="flex flex-row justify-between items-center">
                                <div class="flex space-x-1 rtl:space-x-reverse items-center">
                                    @for ($i = 0; $i < 5; $i++)
                                        @if ($i < $review->pivot->rating)
                                            <svg class="w-4 text-yellow-300" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 22 20">
                                                <path
                                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                            </svg>
                                        @else
                                            <svg class="w-4 text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 22 20">
                                                <path
                                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                            </svg>
                                        @endif
                                    @endfor
                                </div>
                                <div class="flex flex-row gap-4 items-center">
                                    <!-- Modal toggle -->
                                    <button id="button-edit" data-film="{{ json_encode($review) }}"
                                        data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                                        class="h-[3.15rem] text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-3.5 py-1 text-center dark:bg-[#141414] dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                        type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-pencil" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                            <path d="M13.5 6.5l4 4" />
                                        </svg>
                                    </button>
                                    <form id="delete-form"
                                        action="{{ url('/delete-review', ['id' => $review->pivot->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="remove-button">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 69 14" class="svgIcon bin-top">
                                                <g clip-path="url(#clip0_35_24)">
                                                    <path fill="black"
                                                        d="M20.8232 2.62734L19.9948 4.21304C19.8224 4.54309 19.4808 4.75 19.1085 4.75H4.92857C2.20246 4.75 0 6.87266 0 9.5C0 12.1273 2.20246 14.25 4.92857 14.25H64.0714C66.7975 14.25 69 12.1273 69 9.5C69 6.87266 66.7975 4.75 64.0714 4.75H49.8915C49.5192 4.75 49.1776 4.54309 49.0052 4.21305L48.1768 2.62734C47.3451 1.00938 45.6355 0 43.7719 0H25.2281C23.3645 0 21.6549 1.00938 20.8232 2.62734ZM64.0023 20.0648C64.0397 19.4882 63.5822 19 63.0044 19H5.99556C5.4178 19 4.96025 19.4882 4.99766 20.0648L8.19375 69.3203C8.44018 73.0758 11.6746 76 15.5712 76H53.4288C57.3254 76 60.5598 73.0758 60.8062 69.3203L64.0023 20.0648Z">
                                                    </path>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_35_24">
                                                        <rect fill="white" height="14" width="69"></rect>
                                                    </clipPath>
                                                </defs>
                                            </svg>

                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 69 57" class="svgIcon bin-bottom">
                                                <g clip-path="url(#clip0_35_22)">
                                                    <path fill="black"
                                                        d="M20.8232 -16.3727L19.9948 -14.787C19.8224 -14.4569 19.4808 -14.25 19.1085 -14.25H4.92857C2.20246 -14.25 0 -12.1273 0 -9.5C0 -6.8727 2.20246 -4.75 4.92857 -4.75H64.0714C66.7975 -4.75 69 -6.8727 69 -9.5C69 -12.1273 66.7975 -14.25 64.0714 -14.25H49.8915C49.5192 -14.25 49.1776 -14.4569 49.0052 -14.787L48.1768 -16.3727C47.3451 -17.9906 45.6355 -19 43.7719 -19H25.2281C23.3645 -19 21.6549 -17.9906 20.8232 -16.3727ZM64.0023 1.0648C64.0397 0.4882 63.5822 0 63.0044 0H5.99556C5.4178 0 4.96025 0.4882 4.99766 1.0648L8.19375 50.3203C8.44018 54.0758 11.6746 57 15.5712 57H53.4288C57.3254 57 60.5598 54.0758 60.8062 50.3203L64.0023 1.0648Z">
                                                    </path>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_35_22">
                                                        <rect fill="white" height="57" width="69"></rect>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </button>
                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
                {{-- Agregar divs esqueletos si es necesario --}}
                @for ($i = 0; $i < $remainingSkeletons; $i++)
                    <div class="relative">
                        <div class="w-64 max-h-[22rem] rounded-sm bg-[#202020] animate-pulse" style="height: auto;">
                        </div>
                    </div>
                @endfor
            </div>

        </div>
    </div>
</x-app-layout>
<script>
    // Capturar el evento de clic en el botón
    document.querySelectorAll('[data-modal-toggle="crud-modal"]').forEach(item => {
        item.addEventListener('click', event => {
            // Obtener el film desde el atributo data-film
            const filmData = JSON.parse(item.getAttribute('data-film'));

            console.log(filmData);
            console.log(filmData['pivot']['comment']);

            document.getElementById('review-comment').innerHTML = filmData['pivot']['comment'];

            // Puedes agregar más datos del film aquí según sea necesario

            // Seleccionar automáticamente la opción de rating en el select
            const ratingSelect = document.getElementById('review-rating');
            const ratingValue = filmData['pivot']['rating'];
            for (let i = 0; i < ratingSelect.options.length; i++) {
                if (ratingSelect.options[i].value == ratingValue) {
                    ratingSelect.options[i].selected = true;
                    break;
                }
            }

            // Establecer el ID de la reseña como parte de la acción del formulario
            const form = document.getElementById('edit-form');
            console.log(filmData['id']);
            console.log(form.action);
            form.action = `/edit-review/${filmData['pivot']['id']}`;
            console.log(form.action);

            // Mostrar el modal
            document.getElementById(item.getAttribute('data-modal-target')).classList.toggle('hidden');
        });
    });
</script>
