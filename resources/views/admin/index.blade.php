<style>
    .Btn {
        justify-items: center;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        width: 45px;
        height: 45px;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        position: relative;
        overflow: hidden;
        transition-duration: .3s;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.199);
        background-color: #e6030b;
    }

    /* plus sign */
    .sign {
        width: 100%;
        font-size: 2em;
        color: white;
        transition-duration: .3s;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* text */
    .text {
        position: absolute;
        right: 0%;
        width: 0%;
        opacity: 0;
        color: white;
        font-size: 1.2em;
        font-weight: 500;
        transition-duration: .3s;
    }

    /* hover effect on button width */
    .Btn:hover {
        width: 125px;
        border-radius: 0px;
        transition-duration: .3s;
    }

    .Btn:hover .sign {
        width: 30%;
        transition-duration: .3s;
        padding-left: 20px;
    }

    /* hover effect button's text */
    .Btn:hover .text {
        opacity: 1;
        width: 70%;
        transition-duration: .3s;
        padding-right: 20px;
    }

    /* button click effect*/
    .Btn:active {
        transform: translate(2px, 2px);
    }
</style>
<x-app-layout>
    <div class="flex flex-col -mt-[42rem]">
        @if (session('msg') == 2)
            <div class="mx-auto">
                <x-toast-danger>Successfully deleted.</x-toast-danger>
            </div>
        @endif
        @if (session('msg') == 3)
            <div class="mx-auto">
                <x-toast-success>User promoted.</x-toast-success>
            </div>
        @endif
        @if (session('msg') == 4)
            <div class="mx-auto">
                <x-toast-success>User demoted.</x-toast-success>
            </div>
        @endif
        <div class="flex flex-row px-10">
            <livewire:user-search-component :users="$allUsers" />
            <livewire:review-search-component />


        </div>

        <div class="px-10 pt-10 grid grid-cols-3">

            <livewire:alert-search-component />
            <div>
                <h1 class="text-white text-xl pl-6 font-bold">Create Alert</h1>
                <form action="{{ route('create.alert') }}" method="POST"
                    class="max-w-sm px-7 pt-5 flex flex-row items-center gap-3">
                    @csrf
                    <div class="mb-5">
                        <label for="text"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Message</label>
                        <input type="text" id="text" name="message"
                            class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#e6030b] focus:border-[#e6030b] block w-full p-2.5 bg-[#564d4d] dark:border-gray-600 dark:placeholder-gray-300 dark:text-white dark:focus:ring-[#e6030b] dark:focus:border-[#e6030b]"
                            placeholder="Films incomming" required />
                    </div>
                    <button class="Btn mt-1">
                        <div class="sign pb-2 pr-0.5">+</div>
                        <div class="text pb-1">Create</div>
                    </button>
                </form>
                <div class="ml-7.5">
                    @if (session('msg') == 1)
                        <x-toast-success>Alert created.</x-toast-success>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
