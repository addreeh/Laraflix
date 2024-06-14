<div class="pt-5 ">
    <h1 class="text-white text-xl pl-6 font-bold">Reviews</h1>
    <div class="h-[32rem] overflow-y-auto rounded-lg  shadow-md m-5">
        <table class="w-full border-collapse bg-[#564d4d] text-left text-sm text-gray-500">
            <thead class="bg-[#564d4d]">
                <tr>
                    <th scope="col" class="px-6 py-4 font-bold text-white">FILM</th>
                    <th scope="col" class="px-6 py-4 font-bold text-white">REVIEWER</th>
                    <th scope="col" class="px-6 py-4 font-bold text-white">RATING</th>
                    <th scope="col"
                        class="px-6 py-4 font-bold text-white cursor-pointer flex flex-row mt-3.5 transition hover:scale-110"
                        wire:click="sortBy('updated_at')">CREATED <svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-menu-order ml-2" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 10h16" />
                            <path d="M4 14h16" />
                            <path d="M9 18l3 3l3 -3" />
                            <path d="M9 6l3 -3l3 3" />
                        </svg>
                    </th>


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
                @foreach ($reviews as $review)
                    <tr class="hover:bg-[#202020]">
                        <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                            <div class="relative z-10 h-14 w-14">
                                <img class="h-full w-full rounded-md object-cover object-center"
                                    src="{{ asset($review->movie->poster) }}"
                                    alt="{{ asset($review->movie->title) }}" />
                            </div>
                            <div class="text-sm items-center flex">
                                <div class="font-medium text-gray-200">{{ $review->movie->title }}
                                </div>
                            </div>
                        </th>
                        <td class="px-6 py-4">

                            <div class="text-sm items-center flex">
                                <div class="font-medium text-gray-200">{{ $review->user->email }} |
                                    {{ $review->user->username }}
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span
                                class="text-center align-baseline inline-flex px-2 py-1 mr-auto items-center font-semibold text-base/none
@if ($review->rating < 3) text-red-700 bg-red-300
@else
    text-green-700 bg-green-300 @endif
rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-star-filled pr-1" width="17" height="17"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                                        stroke-width="0" fill="currentColor" />
                                </svg>
                                {{ $review->rating }}
                            </span>

                        </td>
                        <td class="px-6 py-4">

                            <div class="text-sm items-center flex">
                                <div class="font-medium text-gray-200">
                                    {{ \Carbon\Carbon::parse($review->updated_at)->format('d/m/Y') }}
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex justify-end gap-4">
                                <a class="delete-review cursor-pointer transition hover:scale-110"
                                    data-review-id="{{ $review->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="white" class="h-6 w-6" x-tooltip="tooltip">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </a>
                                <form id="delete-form-review-{{ $review->id }}"
                                    action="{{ route('delete', ['id' => $review->id]) }}" method="POST"
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
</div>
<script>
    // Seleccionar el enlace de eliminación
    const deleteLinksReview = document.querySelectorAll('.delete-review');

    // Agregar un controlador de eventos para cada enlace de eliminación
    deleteLinksReview.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault(); // Evitar la acción predeterminada del enlace

            // Obtener la ID de la reviewa a eliminar
            const reviewId = link.dataset.reviewId;

            // Mostrar la ventana modal
            document.getElementById('modal-container').classList.remove('hidden');

            // Configurar el formulario de eliminación para enviar la solicitud DELETE
            const deleteFormReview = document.getElementById('delete-form-review-' + reviewId);
            const confirmDeleteBtnReview = document.getElementById('confirm-delete');

            // Agregar un controlador de eventos al botón de confirmación para enviar el formulario
            confirmDeleteBtnReview.addEventListener('click', function() {
                deleteFormReview.submit(); // Enviar el formulario de eliminación
            });
        });
    });

    // Seleccionar los botones de cancelación
    const cancelDeleteBtnReview = document.getElementById('cancel-delete');

    // Agregar un controlador de eventos para el botón de cancelación
    cancelDeleteBtnReview.addEventListener('click', function() {
        // Ocultar la ventana modal
        document.getElementById('modal-container').classList.add('hidden');
    });
</script>
