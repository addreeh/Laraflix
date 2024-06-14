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
    <div class="mx-auto -mt-[41rem]">

        @if (session('msg') == 1)
            <div class="mx-auto flex justify-center">
                <x-toast-success>Request status updated.</x-toast-success>
            </div>
        @endif
        @if (session('msg') == 2)
            <div class="mx-auto flex justify-center">
                <x-toast-danger>Request deleted.</x-toast-danger>
            </div>
        @endif
        @if (session('msg') == 4)
            <div class="mx-auto flex justify-center">
                <x-toast-danger>Error inserting.</x-toast-danger>
            </div>
        @endif
        <div class="flex flex-row gap-2  px-10">

            <div class="w-[70rem]">
                <h1 class="text-white text-xl pl-6 font-bold">User Requests</h1>
                <div class="overflow-hidden rounded-lg  shadow-md m-5 h-[32rem] overflow-y-auto">
                    <table class="w-full border-collapse bg-[#564d4d] text-left text-sm text-gray-500">
                        <thead class="bg-[#564d4d]">
                            <tr>
                                <th scope="col" class="px-6 py-4 font-bold text-white">REQUESTER</th>
                                <th scope="col" class="px-6 py-4 font-bold text-white">FILM</th>
                                <th scope="col" class="px-6 py-4 font-bold text-white">STATUS</th>
                                <th scope="col" class="px-6 py-4 font-bold text-white">UPVOTES</th>
                                @if (Auth::user())
                                    <th scope="col" class="px-6 py-4 font-bold text-white">VOTE</th>
                                @endif
                                {{-- <th scope="col" class="px-6 py-4 font-medium text-gray-900">Role</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Team</th> --}}
                                @if (Auth::user() && Auth::user()->admin)
                                    <th scope="col" class="px-6 py-4 font-medium text-white"></th>
                                    <th scope="col" class="px-6 py-4 font-medium text-white"></th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                            @foreach ($requests as $request)
                                <tr class="hover:bg-[#202020]">
                                    <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                                        <div class="relative h-10 w-10">
                                            <img class="h-full w-full rounded-full object-cover object-center"
                                                src="{{ asset($request->user->picture) }}" alt="" />
                                            <span
                                                class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"></span>
                                        </div>
                                        <div class="text-sm">
                                            <div class="font-medium text-gray-200">{{ $request->user->name }}
                                                {{ $request->user->surname }}
                                            </div>
                                            <div class="text-gray-300">{{ $request->user->email }} |
                                                {{ $request->user->username }}</div>
                                        </div>
                                    </th>
                                    <td class="px-6 py-4">
                                        <div class="text-sm items-center flex">
                                            <div class="font-medium text-gray-200">{{ $request->title }}
                                            </div>
                                        </div>

                                    </td>
                                    <td class="p-3 pl-6 text-start">
                                        <span
                                            class="text-center align-baseline inline-flex px-4 py-3 mr-auto items-center font-semibold text-[.95rem] leading-none
    {{ $request->status === 'approved' ? 'text-blue-500 bg-blue-200' : ($request->status === 'rejected' ? 'text-red-500 bg-red-200' : 'text-orange-500 bg-orange-200') }} rounded-lg">
                                            {{ ucfirst($request->status) }}
                                        </span>
                                    </td>
                                    <td class="py-3 text-center">
                                        <livewire:upvote-view-component :request="$request" />

                                    </td>

                                    @if (Auth::user())
                                        <td class="p-3 text-center">
                                            <livewire:upvote-component :request="$request->id" />
                                        </td>
                                    @endif
                                    @if (Auth::user() && Auth::user()->admin)
                                        <td class="pt-4 text-center">
                                            <div class="flex gap-4">
                                                @if ($request->status != 'rejected')
                                                    <form action="{{ route('reject.request', ['id' => $request->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="transition hover:scale-110"><svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                class="icon icon-tabler icon-tabler-x" width="24"
                                                                height="24" viewBox="0 0 24 24" stroke-width="3"
                                                                stroke="white" fill="none" stroke-linecap="round"
                                                                stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <path d="M18 6l-12 12" />
                                                                <path d="M6 6l12 12" />
                                                            </svg></button>
                                                    </form>
                                                @endif
                                                @if ($request->status != 'pending')
                                                    <form
                                                        action="{{ route('pending.request', ['id' => $request->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="transition hover:scale-110"><svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                class="icon icon-tabler icon-tabler-clock"
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                stroke-width="3" stroke="white" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                <path d="M12 7v5l3 3" />
                                                            </svg></button>
                                                    </form>
                                                @endif
                                                @if ($request->status != 'approved')
                                                    <form
                                                        action="{{ route('approve.request', ['id' => $request->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="title"
                                                            value="{{ $request->title }}">
                                                        <button type="submit" class="transition hover:scale-110">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="icon icon-tabler icon-tabler-check"
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                stroke-width="3" stroke="white" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <path d="M5 12l5 5l10 -10" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    @endif

                                    @if ((Auth::user() && Auth::user()->admin) || (Auth::user() && Auth::user()->id == $request->user_id))
                                        <td class="px-6 py-4">
                                            <div class="flex justify-end gap-4  transition hover:scale-110">
                                                <a class="delete-request cursor-pointer"
                                                    data-request-id="{{ $request->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="white"
                                                        class="h-6 w-6" x-tooltip="tooltip">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                    </svg>
                                                </a>
                                                <form id="delete-form-{{ $request->id }}"
                                                    action="{{ route('delete.request', ['id' => $request->id]) }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <div id="modal-container" class="hidden relative z-50">
                <div class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center">
                    <div class="bg-[#564d4d] rounded-lg p-8">
                        <p class="text-white">Do you want to delete it for sure?</p>
                        <div class="flex justify-end mt-4">
                            <button id="confirm-delete" class="bg-red-500 text-white px-4 py-2">Delete</button>
                            <button id="cancel-delete" class="bg-gray-500 text-white px-4 py-2 ml-2">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <h1 class="text-white text-xl pl-6 font-bold">Create Request</h1>
                <form action="{{ route('create.request') }}" method="POST"
                    class="max-w-sm px-7 pt-5 flex flex-col items-center">
                    @csrf
                    <div class="mb-5">
                        <label for="text"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Film</label>
                        <input type="text" id="text" name="request"
                            class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#e6030b] focus:border-[#e6030b] block w-full p-2.5 bg-[#564d4d] dark:border-gray-600 dark:placeholder-gray-300 dark:text-white dark:focus:ring-[#e6030b] dark:focus:border-[#e6030b]"
                            placeholder="Films request" required />
                    </div>
                    <button class="Btn mt-1">
                        <div class="sign pb-2 pr-0.5">+</div>
                        <div class="text pb-1">Create</div>
                    </button>
                </form>
                <div class="ml-7.5">
                    @if (session('msg') == 3)
                        <x-toast-success>Request created.</x-toast-success>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    const deleteLinksRequest = document.querySelectorAll('.delete-request');
    deleteLinksRequest.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const requestId = link.dataset.requestId;
            console.log(requestId);

            document.getElementById('modal-container').classList.remove('hidden');

            const deleteFormRequest = document.getElementById('delete-form-' + requestId);
            const confirmDeleteBtnRequest = document.getElementById('confirm-delete');

            confirmDeleteBtnRequest.addEventListener('click', function() {
                deleteFormRequest.submit();
            });
        });
    });

    const cancelDeleteBtnRequest = document.getElementById('cancel-delete');

    cancelDeleteBtnRequest.addEventListener('click', function() {
        document.getElementById('modal-container').classList.add('hidden');
    });
</script>
