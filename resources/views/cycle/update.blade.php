<form action="{{ route('cycle.update') }}" method="POST">
    @csrf

    <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 " type="button">
    Toggle modal
    </button>

    <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-opacity-30 backdrop-blur-sm">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700 ">
                <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center">

                    <input type="hidden" name="id" id="cycle-id" required>
                    <div class="mb-4">
                        <label for="libelle" class="block text-sm font-medium text-gray-700">Libelle</label>
                        <input type="text" id="libelle_C" name="libelle_C" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required min="2000" max="2099">
                    </div>

                    <div class="flex justify-center space-x-4">
                        <button  class="bg-blue-600 text-white px-4 py-2 rounded">
                            Metre à jour
                        </button>
                        <button data-modal-hide="popup-modal" type="button" class="bg-red-600 text-white px-4 py-2 rounded">Annuler</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>







