<div class="pt-5 w-[42rem]">
    <h1 class="text-white text-xl pl-6 font-bold">Users</h1>
    <div class="h-[32rem] overflow-y-auto rounded-lg  shadow-md m-5">
        <table class="w-full border-collapse bg-[#564d4d] text-left text-sm text-gray-500">
            <thead class="bg-[#564d4d]">
                <tr>
                    <th scope="col" class="px-6 py-4 font-bold text-white">NAME</th>
                    <th scope="col" class="px-6 py-4 font-bold text-white">ROLE</th>
                    {{-- <th scope="col" class="px-6 py-4 font-medium text-gray-900">Role</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Team</th> --}}
                    <th scope="col" class="px-6 py-4 font-medium text-white ">
                        <div class="searcher">
                            <div class="input-wrapper">
                                <button id="search-button" class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="white" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                        <path d="M21 21l-6 -6" />
                                    </svg>
                                </button>
                                <input id="search-input" type="text" name="text" class="input"
                                    placeholder="search.." wire:keydown="updateSearch($event.target.value)" />
                            </div>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                @foreach ($users as $user)
                    <tr class="hover:bg-[#202020]">
                        <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                            <div class="relative h-10 w-10">
                                <img class="h-full w-full rounded-full object-cover object-center"
                                    src="{{ asset($user->picture) }}" alt="" />
                                <span
                                    class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"></span>
                            </div>
                            <div class="text-sm">
                                <div class="font-medium text-gray-200">{{ $user->name }}
                                    {{ $user->surname }}
                                </div>
                                <div class="text-gray-300">{{ $user->email }} | {{ $user->username }}
                                </div>
                            </div>
                        </th>
                        <td class="px-6 py-4">
                            @if ($user->admin)
                                <a class="demote-user cursor-pointer  transition hover:scale-110"
                                    data-user-id="{{ $user->id }}">

                                    <span
                                        class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
                                        <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
                                        Admin
                                    </span>
                                </a>
                                <form id="demote-form-{{ $user->id }}"
                                    action="{{ route('demote.user', ['id' => $user->id]) }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                    @method('PUT')
                                </form>
                            @else
                                <a class="promote-user cursor-pointer transition hover:scale-110"
                                    data-user-id="{{ $user->id }}">
                                    <span
                                        class="inline-flex items-center gap-1 rounded-full bg-red-50 px-3.5 py-1 text-xs font-semibold text-red-600">
                                        <span class="h-1.5 w-1.5 rounded-full bg-red-600"></span>
                                        User
                                    </span>
                                </a>
                                <form id="promote-form-{{ $user->id }}"
                                    action="{{ route('promote.user', ['id' => $user->id]) }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                    @method('PUT')
                                </form>
                            @endif

                        </td>
                        <td class="px-6 py-4">
                            <div class="flex justify-end gap-4 transition hover:scale-110">
                                <a class="delete-user cursor-pointer" data-user-id="{{ $user->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="white" class="h-6 w-6" x-tooltip="tooltip">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </a>
                                <form id="delete-form-{{ $user->id }}"
                                    action="{{ route('delete.user', ['id' => $user->id]) }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
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
    <div id="promote-container" class="hidden relative z-50">
        <div class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center">
            <div class="bg-[#564d4d] rounded-lg p-8">
                <p class="text-white">Do you want to promote it for sure?</p>
                <div class="flex justify-end mt-4">
                    <button id="promote-confirm-delete" class="bg-red-500 text-white px-4 py-2">Accept</button>
                    <button id="promote-cancel-delete" class="bg-gray-500 text-white px-4 py-2 ml-2">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div id="demote-container" class="hidden relative z-50">
        <div class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center">
            <div class="bg-[#564d4d] rounded-lg p-8">
                <p class="text-white">Do you want to demote it for sure?</p>
                <div class="flex justify-end mt-4">
                    <button id="demote-confirm-delete" class="bg-red-500 text-white px-4 py-2">Accept</button>
                    <button id="demote-cancel-delete" class="bg-gray-500 text-white px-4 py-2 ml-2">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const deleteLinksUser = document.querySelectorAll('.delete-user');
    deleteLinksUser.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const userId = link.dataset.userId;

            document.getElementById('modal-container').classList.remove('hidden');

            const deleteFormUser = document.getElementById('delete-form-' + userId);
            const confirmDeleteBtnUser = document.getElementById('confirm-delete');

            confirmDeleteBtnUser.addEventListener('click', function() {
                deleteFormUser.submit();
            });
        });
    });

    const cancelDeleteBtnUser = document.getElementById('cancel-delete');

    cancelDeleteBtnUser.addEventListener('click', function() {
        document.getElementById('modal-container').classList.add('hidden');
    });

    const promoteUser = document.querySelectorAll('.promote-user');
    promoteUser.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const userId = link.dataset.userId;

            document.getElementById('promote-container').classList.remove('hidden');

            const deleteFormUser = document.getElementById('promote-form-' + userId);
            const confirmDeleteBtnUser = document.getElementById('promote-confirm-delete');

            confirmDeleteBtnUser.addEventListener('click', function() {
                deleteFormUser.submit();
            });
        });
    });

    const cancelDeleteBtnUserPromote = document.getElementById('promote-cancel-delete');

    cancelDeleteBtnUserPromote.addEventListener('click', function() {
        document.getElementById('promote-container').classList.add('hidden');
    });


    const demoteUser = document.querySelectorAll('.demote-user')
    demoteUser.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault(); // Evitar la acción predeterminada del enlace

            // Obtener la ID de la usera a eliminar
            const userId = link.dataset.userId;

            // Mostrar la ventana modal
            document.getElementById('demote-container').classList.remove('hidden');

            // Configurar el formulario de eliminación para enviar la solicitud DELETE
            const deleteFormUser = document.getElementById('demote-form-' + userId);
            const confirmDeleteBtnUser = document.getElementById('demote-confirm-delete');

            // Agregar un controlador de eventos al botón de confirmación para enviar el formulario
            confirmDeleteBtnUser.addEventListener('click', function() {
                deleteFormUser.submit(); // Enviar el formulario de eliminación
            });
        });
    });

    // Seleccionar los botones de cancelación
    const cancelDeleteBtnUserDemote = document.getElementById('demote-cancel-delete');

    // Agregar un controlador de eventos para el botón de cancelación
    cancelDeleteBtnUserDemote.addEventListener('click', function() {
        // Ocultar la ventana modal
        document.getElementById('demote-container').classList.add('hidden');
    });
</script>
