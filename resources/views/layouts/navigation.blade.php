<style>
    .arreglo {
        background: rgb(0, 0, 0);
        background: -moz-linear-gradient(180deg, rgba(0, 0, 0, 0.6890951276102089) 0%, rgba(0, 0, 0, 0.4918793503480279) 65%, rgba(0, 0, 0, 0) 100%);
        background: -webkit-linear-gradient(180deg, rgba(0, 0, 0, 0.6890951276102089) 0%, rgba(0, 0, 0, 0.4918793503480279) 65%, rgba(0, 0, 0, 0) 100%);
        background: linear-gradient(180deg, rgba(0, 0, 0, 0.6890951276102089) 0%, rgba(0, 0, 0, 0.4918793503480279) 65%, rgba(0, 0, 0, 0) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#000000", endColorstr="#000000", GradientType=1);
    }

    .searcher {
        .input-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            position: relative;
        }

        .input {
            border-style: none;
            height: 50px;
            width: 50px;
            padding: 10px;
            outline: none;
            border-radius: 50%;
            transition: 0.5s ease-in-out;
            background-color: transparent;
            padding-right: 40px;
            color: #fff;
        }

        .input::placeholder,
        .input {
            font-family: "Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande",
                "Lucida Sans", Arial, sans-serif;
            font-size: 17px;
        }

        .input::placeholder {
            color: #8f8f8f;
        }

        .icon {
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            right: 0px;
            cursor: pointer;
            outline: none;
            border-style: none;
            border-radius: 50%;
            pointer-events: painted;
            background-color: transparent;
            transition: 0.2s linear;
        }

        .icon:focus~.input,
        .input:focus {
            box-shadow: none;
            width: 150px;
            border-radius: 0px;
            background-color: transparent;
            border-bottom: 3px solid #e6030c;
            transition: all 500ms cubic-bezier(0, 0.11, 0.35, 2);
        }

    }
</style>
@php
    $currentRoute = Route::current()->getName();
@endphp
<nav x-data="{ open: false }"
    class="{{ $currentRoute === 'welcome' ? 'arreglo relative z-10 bg-transparent h-screen mb-20 lg:mb-0' : 'relative z-10bg-[#101010] mb-20 lg:mb-0' }} ">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('welcome') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>
                @auth
                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('welcome')" :active="request()->routeIs('welcome')">
                            Home
                        </x-nav-link>
                        <x-nav-link :href="route('films')" :active="request()->routeIs('films')">
                            Films
                        </x-nav-link>
                        <x-nav-link class="animate__animated animate__pulse animate__infinite text-red-400"
                            :href="route('upcomming')" :active="request()->routeIs('upcomming')">
                            Upcomming
                        </x-nav-link>
                        <x-nav-link class="text-yellow-100" :href="route('user')" :active="request()->routeIs('user')">
                            Profile
                        </x-nav-link>
                    </div>
                @endauth
                {{-- @auth
                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('index')" :active="request()->routeIs('index')">
                            Catálogo
                        </x-nav-link>
                        <x-nav-link :href="route('create')" :active="request()->routeIs('create')">
                            Crear Película
                        </x-nav-link>
                    </div>
                @endauth --}}
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                    <div class="flex flex-row gap-5">
                        <div class="searcher">
                            <div class="input-wrapper">
                                <button id="search-button" class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search"
                                        width="28" height="28" viewBox="0 0 24 24" stroke-width="2" stroke="white"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                        <path d="M21 21l-6 -6" />
                                    </svg>
                                </button>
                                <input id="search-input" type="text" name="text" class="input"
                                    placeholder="search.." />
                            </div>
                        </div>


                        <!-- NOTIFICACIONES -->
                        <button id="dropdownNotificationButton" data-dropdown-toggle="dropdownNotification"
                            class="relative inline-flex items-center text-sm font-medium text-center text-white transition hover:scale-110"
                            type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bell" width="28"
                                height="28" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                                <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                            </svg>
                            <!-- SI HAY NOTIFICACIONES -->
                            @if (!$alerts->isEmpty())
                                <div
                                    class="absolute top-0 inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -end-2 dark:border-gray-900">
                                    {{ count($alerts) }}</div>
                            @endif
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdownNotification"
                            class="z-20 hidden w-full max-w-sm divide-y divide-white shadow bg-black bg-opacity-90 border-gray-100 overflow-y-auto max-h-[20rem]"
                            aria-labelledby="dropdownNotificationButton">
                            <div class="divide-y divide-gray-100 ">
                                @foreach ($alerts as $alert)
                                    <div class="flex px-4 py-3 hover:bg-gray-600 ">
                                        <div class="flex-shrink-0">
                                            <img class="rounded-full w-11 h-11" src="{{ asset('images/bot.avif') }}"
                                                alt="Bot Profile">
                                            <div
                                                class="absolute flex items-center justify-center w-5 h-5 ms-6 -mt-5 bg-red-500 border border-white rounded-full dark:border-gray-800">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-exclamation-mark" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="3" stroke="white"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M12 19v.01" />
                                                    <path d="M12 15v-10" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="w-full ps-5">
                                            <div class="text-gray-200 mb-1.5 text-base">{{ $alert->message }}</div>
                                            <div class="text-xs text-gray-400">{{ $alert->created_at }}</div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>

                        <!-- DROPDOWN USUARIO -->
                        <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName"
                            class="flex items-center text-sm pe-1 font-medium text-white" type="button">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 me-2 rounded-sm" src="{{ Auth::user()->picture }}" alt="user photo">
                            {{-- Bonnie Green --}}
                            <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 4 4 4-4" />
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdownAvatarName"
                            class="z-10 hidden divide-y divide-gray-50 shadow w-48 bg-black bg-opacity-90">
                            <div class="py-2">
                                <a
                                    class="flex px-4 py-2 text-sm hover:bg-gray-600 text-white font-bold hover:text-white justify-center">{{ Auth::user()->username }}
                                    Panel</a>
                            </div>
                            <ul class="py-2 text-sm text-gray-200 font-semibold"
                                aria-labelledby="dropdownInformdropdownAvatarNameButtonationButton">
                                @if (Auth::user()->admin)
                                    <li class="flex items-center"> <!-- Utilizamos flexbox aquí -->
                                        <a href="{{ route('admin') }}"
                                            class="flex items-center px-4 py-2 hover:bg-gray-600 hover:text-white w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-pencil mr-3" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="3"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                                <path d="M13.5 6.5l4 4" />
                                            </svg>
                                            Admin site
                                        </a>
                                    </li>
                                @endif
                                <li class="flex items-center"> <!-- Utilizamos flexbox aquí -->
                                    <a href="{{ route('requests') }}"
                                        class="flex items-center px-4 py-2 hover:bg-gray-600 hover:text-white w-full">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-git-pull-request mr-3" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M6 18m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                            <path d="M6 6m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                            <path d="M18 18m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                            <path d="M6 8l0 8" />
                                            <path d="M11 6h5a2 2 0 0 1 2 2v8" />
                                            <path d="M14 9l-3 -3l3 -3" />
                                        </svg>
                                        Requests
                                    </a>
                                </li>
                                <li class="flex items-center"> <!-- Utilizamos flexbox aquí -->
                                    <a href="{{ route('profile.edit') }}"
                                        class=" flex items-center px-4 py-2 hover:bg-gray-600 hover:text-white w-full">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-user mr-3" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                        </svg>
                                        Account
                                    </a>
                                </li>
                            </ul>
                            <div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="route('logout')"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                        class="flex px-4 py-2 text-sm hover:bg-gray-600 text-white font-bold hover:text-white justify-center">Sign
                                        out</a>
                                </form>
                            </div>
                        </div>

                    </div>


                    <!-- AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA -->
                    {{-- <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>



                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown> --}}
                @else
                    <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                        Log In
                    </x-nav-link>
                    <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                        Register
                    </x-nav-link>
                @endauth
            </div>



            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <!-- SEARCH -->
    <div id="search-div"
        class="z-20 w-full max-w-sm divide-y divide-white shadow bg-black bg-opacity-90 border-gray-100 border-t-2 absolute right-[17.5rem] h-96 overflow-y-auto hidden">

        @foreach ($films as $film)
            <a href="{{ route('show', $film->id) }}" class="flex px-4 py-3 hover:bg-gray-600 ">
                <div class="flex-shrink-0">
                    <img class="rounded-xs w-11" src="{{ asset($film->poster) }}" alt="{{ $film->title }}">
                    <div
                        class="absolute flex items-center justify-center w-5 h-5 ms-6 -mt-5 bg-[#e6030c] border border-white rounded-full dark:border-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-movie p-0.5"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="white"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
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
                </div>
                <div class="w-full ps-5 items-center">
                    <div class="text-gray-200 mb-1.5 text-base">{{ $film->title }}</div>
                    <div class="text-xs text-gray-400">{{ $film->release_year }} | {{ $film->genre }} |
                        {{ $film->director }}</div>
                </div>
            </a>
        @endforeach
    </div>

    </div>
    {{-- <div class="bg-green-500 h-auto absolute right-72">
        <ul>
            @foreach ($latestMovies as $movie)
                <li>{{ $movie->title }}</li>
            @endforeach
        </ul>
    </div> --}}
    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        @auth

            <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>


                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @else
            <div>Pepe</div>
        @endauth

    </div>
</nav>
@if (Auth::user())
    <script>
        document.getElementById('search-button').addEventListener('click', (event) => {
            event.stopPropagation(); // Evita que el clic en el botón se propague al documento
            document.getElementById('search-div').style.display = "block";
        });

        document.addEventListener('click', (event) => {
            const searchDiv = document.getElementById('search-div');
            const searchButton = document.getElementById('search-button');
            const searchInput = document.getElementById('search-input');

            if (event.target !== searchDiv && event.target !== searchButton && event.target !== searchInput) {
                searchDiv.style.display = "none";
            }
        });

        document.getElementById('search-input').addEventListener('input', function() {
            const searchTerm = this.value.trim()
                .toLowerCase(); // Obtener el término de búsqueda y convertirlo a minúsculas
            const films = document.querySelectorAll('#search-div a'); // Obtener todas las películas

            films.forEach(function(film) {
                const title = film.querySelector('.text-base').textContent
                    .toLowerCase(); // Obtener el título de la película y convertirlo a minúsculas

                if (title.includes(
                        searchTerm
                    )) { // Comprobar si el título de la película contiene el término de búsqueda
                    film.style.display = 'flex'; // Mostrar la película si coincide
                } else {
                    film.style.display = 'none'; // Ocultar la película si no coincide
                }
            });
        });
    </script>
@endif
