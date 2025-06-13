    <!-- Main modal -->
<div class= "@if(!$addChapitreModal) invisible @else flex @endif overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-black/40">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-blue-600 border-gray-200">
                <h3 class="text-lg font-semibold text-blue-500 dark:text-white">
                    Creer un chapitre
                </h3>
                <button wire:click="toggleAddChapitreModal"  type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form wire:submit.prevent="storeChapitre" class="p-4 md:p-5" enctype="multipart/form-data">

                @if($errors->any())
                    @foreach ($errors->all() as $error)
                    <span class="text-red-500 text-sm p-2 h-9 break-words overflow-y-auto">{{ $error }}</span>
                    @endforeach
                @endif

                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="titre" class="block mb-2 text-sm font-semibold text-blue-500 dark:text-white">Titre</label>
                        <input type="text" wire:model.defer="titre" id="titre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Titre du chapitre" required="">
                        @error('titre')
                        <span class="text-red-500 text-sm p-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <label for="temps_estime" class="block mb-2 text-sm font-semibold text-blue-500 dark:text-white">Temps estime (en minutes)</label>
                        <input type="number" wire:model.defer="temps_estime" id="temps_estime" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                        @error('temps_estime')>
                            <span class="text-red-500 text-sm p-2">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="col-span-2">
                        <label for="description" class="block mb-2 text-sm font-semibold text-blue-500 dark:text-white">Description</label>
                        <textarea id="description" wire:model.defer="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Description du chapitre" required=""></textarea>
                        @error('description')>
                            <span class="text-red-500 text-sm p-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <label for="ressource" class="block mb-2 text-sm font-semibold text-blue-500  dark:text-white">Ressource</label>
                        <input type="file" wire:model.defer="ressource" id="ressource" wire:model="ressource" accept="application/pdf" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @error('ressource')>
                            <span class="text-red-500 text-sm p-2">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-span-2">
                        <label class="mb-2 text-sm font-semibold text-blue-500 dark:text-white">
                            Evaluable
                        </label>
                        <input type="checkbox" id="oui" wire:model="has_evaluation"  class="accent-primary-600 focus:ring-primary-500">
                        @error('has_evaluation')
                            <span class="text-red-500 text-sm p-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="text-white inline-flex items-center bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-500 dark:focus:ring-blue-500">
                    valider
                </button>

                <button wire:click="toggleAddChapitreModal"  type="reset" class="text-white inline-flex items-center bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-500 dark:focus:ring-red-500">
                    Annuler
                </button>
            </form>
        </div>
    </div>
</div>

