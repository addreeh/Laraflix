<x-app-layout>
    <div class="flex flex-row ml-44 text-white py-8 -mt-[41rem]">
        <h1 class="text-2xl font-semibold">{{ Auth::user()->username }}'s Profile
        </h1>
        @if (Auth::user()->admin)
            <span class="text-sm font-medium mx-2 px-2.5 pt-1 rounded bg-red-900 text-red-300">Admin</span>
        @endif
    </div>
    <div>
        <div class="w-10/12 mx-auto px-8 space-y-6">
            <div class="grid grid-cols-2">
                <div class="p-4 sm:p-8 bg-[#564d4d] shadow rounded-l-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
                <div class="p-4 sm:p-8 bg-[#564d4d] rounded-r-lg text-white">
                    <h2 class="text-lg font-medium text-gray-100">
                        Profile Picture</h2>
                    <form action="{{ route('picture') }}" method="POST" enctype="multipart/form-data" class="pt-4">
                        @csrf
                        {{-- <input type="file" name="picture" id="picture">
                        <button type="submit">Actualizar imagen</button> --}}
                        {{-- <input
                            class="block w-full text-sm  border rounded-lg cursor-pointer text-gray-400 focus:outline-none bg-[#222222] border-gray-600 placeholder-gray-400"
                            id="picture" name="picture" type="file">
                        <img src="{{ asset(Auth::user()->picture) }}" class="py-4 mx-auto rounded-full max-h-60"> --}}
                        <livewire:profile-picture-component />


                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                    </form>
                    {{-- <form action="{{ route('picture') }}" method="POST" wire:submit.prevent="savePicture"
                        enctype="multipart/form-data" class="pt-4">
                        @csrf

                        <livewire:profile-picture-component />
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                    </form> --}}



                </div>

            </div>
            <div class="p-4 sm:p-8 bg-[#564d4d] sm:rounded-lg grid grid-cols-2">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
                <div class="max-w-xl pl-10">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>


            {{-- <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div> --}}
        </div>
    </div>
</x-app-layout>
