<form action="{{ route('traitements.prof.update') }}" method="POST">
    @csrf

    <button data-modal-target="popup-prof" data-modal-toggle="popup-prof" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
    Toggle modal
    </button>

    <div id="popup-prof" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full  bg-opacity-30 backdrop-blur-sm">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-prof">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center">

                    {{-- <input type="hidden" name="id" id="classe-id" required>
                    <div class="mb-4">
                        <label for="libelle" class="block text-sm font-medium text-blue-600">Libelle</label>
                        <input type="text" id="libelle_Cl"  name="libelle_Cl" class="text-center mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required min="2000" max="2099">
                    </div>

                    <div class="mb-4">
                        <label for="cycle" class="block text-sm font-medium text-blue-600">
                            Cycle
                        </label>
                        <select name="cycle_id" id="cycle" class="w-full border border-gray-300 p-2 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                            <option value="" disabled selected>
                                -- Sélectionnez un cycle --
                            </option>
                            @foreach($cycles as $cycle)
                                <option value="{{ $cycle->id }}">
                                    {{ $cycle->libelle_C }}
                                </option>
                            @endforeach
                        </select>
                    </div> --}}
                    <h2 class="text-xl font-bold mb-4 text-center text-blue-600">Modifier un professeur</h2>
                    <input type="hidden" name="id" id="prof-id" required>
                    <div class="grid grid-cols-2 gap-4">
                    <!-- Les champs sont pré-remplis avec $prof et $prof->infoPerso -->
                    <div class="mb-4">
                        <label for="nom" class="block text-sm font-medium text-blue-600">Nom</label>
                        <input type="text" name="nom" id="nom" class="w-full border p-1 rounded"  required>
                    </div>
                    <div class="mb-4">
                        <label for="prenom" class="block text-sm font-medium text-blue-600">Prénom</label>
                        <input type="text" name="prenom" id="prenom" class="w-full border p-1 rounded"  required>
                    </div>
                    <div class="mb-4">
                        <label for="date_N" class="block text-sm font-medium text-blue-600">Date de naissance</label>
                        <input type="date" name="date_N" id="date_N" class="w-full border p-1 rounded"  required>
                    </div>
                    <div class="mb-4">
                        <label for="lieu_N" class="block text-sm font-medium text-blue-600">Lieu de naissance</label>
                        <input type="text" name="lieu_N" id="lieu_N" class="w-full border p-1 rounded"  required>
                    </div>
                    <div class="mb-4">
                        <label for="sexe" class="block text-sm font-medium text-blue-600">Sexe</label>
                        <select name="sexe" id="sexe" class="w-full border p-1 rounded" required>
                            <option value="">-- Sélectionner --</option>
                            <option value="Homme">Homme</option>
                            <option value="Femme">Femme</option>
                        </select>
                        <span class="text-red-500 text-xs hidden error-message"></span>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-blue-600">Email</label>
                        <input type="email" name="email" class="w-full border p-1 rounded"  required>
                    </div>
                    <div class="mb-4">
                        <label for="nationalite" class="block text-sm font-medium text-blue-600">Nationalité</label>
                        <input type="text" name="nationalite" id="nationalite" class="w-full border p-1 rounded"  required>
                    </div>
                    <div class="mb-4">
                        <label for="ville_residence" class="block text-sm font-medium text-blue-600">Ville de résidence</label>
                        <input type="text" name="ville_residence" id="ville_residence" class="w-full border p-1 rounded" required>
                    </div>
                    <div class="mb-4">
                        <label for="telephone" class="block text-sm font-medium text-blue-600">Téléphone</label>
                        <input type="tel" name="telephone" id="telephone" class="w-full border p-1 rounded"  required>
                    </div>

                    <div class="mb-4">
                    <label for="specialite" class="block text-sm font-medium text-blue-600">Spécialité</label>
                    <input type="specialite" id="specialite" name="specialite" class="w-full border rounded p-1" required>
                </div>
                </div>

                    <div class="flex justify-center space-x-4">
                        <button  class="bg-blue-600 text-white px-4 py-2 rounded">
                            Modifier
                        </button>
                        <button data-modal-hide="popup-prof" type="button" class="bg-red-600 text-white px-4 py-2 rounded">Annuler</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

{{-- <div id="updateModal" class="fixed inset-0 flex items-center justify-center invisible bg-black bg-opacity-30 backdrop-blur-sm z-50">
    <div class="bg-white p-2 rounded-lg shadow-lg w-full max-w-xl relative">
        <h2 class="text-xl font-bold mb-4 text-center text-blue-600">Modifier un professeur</h2>
        <form id="updateForm" action="{{ route('super_admin.update', $prof->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div id="updateStep1" class="step">
                <h3 class="text-lg font-semibold mb-2 text-gray-700">Étape 1 : Informations personnelles</h3>
                <div class="grid grid-cols-2 gap-4">
                    <!-- Les champs sont pré-remplis avec $prof et $prof->infoPerso -->
                    <div class="mb-4">
                        <label for="nom" class="block text-sm font-medium text-blue-600">Nom</label>
                        <input type="text" name="nom" id="nom" class="w-full border p-1 rounded" value="{{ $prof->infoPerso->nom }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="prenom" class="block text-sm font-medium text-blue-600">Prénom</label>
                        <input type="text" name="prenom" id="prenom" class="w-full border p-1 rounded" value="{{ $prof->infoPerso->prenom }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="date_N" class="block text-sm font-medium text-blue-600">Date de naissance</label>
                        <input type="date" name="date_N" id="date_N" class="w-full border p-1 rounded" value="{{ $prof->infoPerso->date_N }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="lieu_N" class="block text-sm font-medium text-blue-600">Lieu de naissance</label>
                        <input type="text" name="lieu_N" id="lieu_N" class="w-full border p-1 rounded" value="{{ $prof->infoPerso->lieu_N }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="sexe" class="block text-sm font-medium text-blue-600">Sexe</label>
                        <select name="sexe" id="sexe" class="w-full border p-1 rounded" required>
                            <option value="">-- Sélectionner --</option>
                            <option value="Homme" {{ $prof->infoPerso->sexe == 'Homme' ? 'selected' : '' }}>Homme</option>
                            <option value="Femme" {{ $prof->infoPerso->sexe == 'Femme' ? 'selected' : '' }}>Femme</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-blue-600">Email</label>
                        <input type="email" name="email" class="w-full border p-1 rounded" value="{{ $prof->user->email }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="nationalite" class="block text-sm font-medium text-blue-600">Nationalité</label>
                        <input type="text" name="nationalite" id="nationalite" class="w-full border p-1 rounded" value="{{ $prof->infoPerso->nationalite }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="ville_residence" class="block text-sm font-medium text-blue-600">Ville de résidence</label>
                        <input type="text" name="ville_residence" id="ville_residence" class="w-full border p-1 rounded" value="{{ $prof->infoPerso->ville_residence }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="telephone" class="block text-sm font-medium text-blue-600">Téléphone</label>
                        <input type="tel" name="telephone" id="telephone" class="w-full border p-1 rounded" value="{{ $prof->infoPerso->telephone }}" required>
                    </div>
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="button" id="cancelUpdateBtn" class="bg-red-600 text-white px-4 p-1 rounded">Annuler</button>
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Modifier</button>
                </div>
            </div>
        </form>
        <button id="closeUpdateModalBtn" class="absolute top-2 right-3 text-gray-500 hover:text-red-600 text-lg font-bold">&times;</button>
    </div>
</div> --}}
