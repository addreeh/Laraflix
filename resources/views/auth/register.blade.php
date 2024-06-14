<x-guest-layout>
    <div class="text-white mb-6">
        <h1 class="font-bold text-3xl">Sign Up</h1>
    </div>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <!-- Name -->
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                    </svg>
                </div>
                <input type="text" id="name" name="name"
                    class="text-gray-400 text-sm rounded-lg focus:ring-[#e6030b] focus:border-[#e6030b] bg-[#333333] block w-full ps-10 p-2.5"
                    placeholder="John" required>
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
            <!-- Surname -->
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        class="icon icon-tabler icon-tabler-user-plus" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                        <path d="M16 19h6" />
                        <path d="M19 16v6" />
                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4" />
                    </svg>
                </div>
                <input type="text" id="surname" name="surname"
                    class="text-gray-400 text-sm rounded-lg focus:ring-[#e6030b] focus:border-[#e6030b] bg-[#333333] block w-full ps-10 p-2.5"
                    placeholder="Smith">
            </div>
            <x-input-error :messages="$errors->get('surname')" class="mt-2" />
            <!-- Email -->
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 16">
                        <path
                            d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                        <path
                            d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                    </svg>
                </div>
                <input type="text" id="email" name="email"
                    class="text-gray-400 text-sm rounded-lg focus:ring-[#e6030b] focus:border-[#e6030b] bg-[#333333] block w-full ps-10 p-2.5"
                    placeholder="john@gmail.com" required>
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
            <!-- Username -->
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        class="icon icon-tabler icon-tabler-user-question" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                        <path d="M6 21v-2a4 4 0 0 1 4 -4h3.5" />
                        <path d="M19 22v.01" />
                        <path d="M19 19a2.003 2.003 0 0 0 .914 -3.782a1.98 1.98 0 0 0 -2.414 .483" />
                    </svg>
                </div>
                <input type="text" id="username" name="username"
                    class="text-gray-400 text-sm rounded-lg focus:ring-[#e6030b] focus:border-[#e6030b] bg-[#333333] block w-full ps-10 p-2.5"
                    placeholder="johnsito">
            </div>
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>
        <div class="relative mb-6">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                <svg class="w-5 h-5 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    class="icon icon-tabler icon-tabler-key" width="24" height="24" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path
                        d="M16.555 3.843l3.602 3.602a2.877 2.877 0 0 1 0 4.069l-2.643 2.643a2.877 2.877 0 0 1 -4.069 0l-.301 -.301l-6.558 6.558a2 2 0 0 1 -1.239 .578l-.175 .008h-1.172a1 1 0 0 1 -.993 -.883l-.007 -.117v-1.172a2 2 0 0 1 .467 -1.284l.119 -.13l.414 -.414h2v-2h2v-2l2.144 -2.144l-.301 -.301a2.877 2.877 0 0 1 0 -4.069l2.643 -2.643a2.877 2.877 0 0 1 4.069 0z" />
                    <path d="M15 9h.01" />
                </svg>
            </div>
            <input type="password" id="password" name="password" autocomplete="current-password"
                class="text-gray-400 text-sm rounded-lg focus:ring-[#e6030b] focus:border-[#e6030b] bg-[#333333] block w-full ps-10 p-2.5"
                placeholder="Password" required>
        </div>
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
        <div class="relative mb-6">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                <svg class="w-5 h-5 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    class="icon icon-tabler icon-tabler-key" width="24" height="24" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path
                        d="M16.555 3.843l3.602 3.602a2.877 2.877 0 0 1 0 4.069l-2.643 2.643a2.877 2.877 0 0 1 -4.069 0l-.301 -.301l-6.558 6.558a2 2 0 0 1 -1.239 .578l-.175 .008h-1.172a1 1 0 0 1 -.993 -.883l-.007 -.117v-1.172a2 2 0 0 1 .467 -1.284l.119 -.13l.414 -.414h2v-2h2v-2l2.144 -2.144l-.301 -.301a2.877 2.877 0 0 1 0 -4.069l2.643 -2.643a2.877 2.877 0 0 1 4.069 0z" />
                    <path d="M15 9h.01" />
                </svg>
            </div>
            <input type="password" id="password_confirmation" name="password_confirmation"
                autocomplete="password_confirmation"
                class="text-gray-400 text-sm rounded-lg focus:ring-[#e6030b] focus:border-[#e6030b] bg-[#333333] block w-full ps-10 p-2.5"
                placeholder="Repeat Password" required>
        </div>
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        <div class="flex items-center justify-center mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
