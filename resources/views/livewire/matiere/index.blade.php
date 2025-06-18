<div>
  <div class="p-3 sm:ml-64 bg-no-repeat bg-cover  bg-gray-100 bg-blend-multiply">

    <h2 class="text-2xl font-semibold text-blue-600 mb-2">Créer une nouvelle matière</h2>
    <div class="p-8 overflow">
        <div class=" mx-auto bg-white p-4 rounded-xl shadow-md">
            @if ($errors->any())
                <ul class="text-red-500 mb-4">
                    @foreach ($errors->all() as $error)
                        <li class="mb-1">• {{ $error }}</li>
                    @endforeach
                </ul>
            @endif

        @if (session('success'))
            <div class="text-green-500 mb-4">
                {{ session('success') }}
            </div>
        @endif
            <form wire:submit.prevent= @if($isModify) "update" @else "store" @endif  >
                @csrf
                <!-- Libelle du cours -->
                <div class="mb-4">
                    <label for="libelle_M" class="form-control block text-lg font-medium text-blue-600">Libellé </label>
                    <input type="text" wire:model.defer="libelle_M" id="libelle_M" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" required>

                </div>

                <!-- Categorie du cours -->
                <div class="mb-4">
                    <label for="categories_id" class="block text-lg font-medium text-blue-600">Categorie</label>
                    <select wire:model.defer="categories_id" id="categories_id" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" required>
                        <option value="">-- Sélectionnez une categorie --</option>
                        @foreach($categories as $categorie)
                            <option value="{{ $categorie->id }}">{{ $categorie->libelle_cat }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Sélection de la classe -->
                <div class="mb-4">
                    <label for="classes_id" class="block text-lg font-medium text-blue-600">Classe</label>
                    <select wire:model.defer="classes_id" id="classes_id" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" required>
                        <option value="">-- Sélectionnez une classe --</option>
                        @foreach($classes as $classe)
                            <option value="{{ $classe->id }}">{{ $classe->libelle_Cl }}</option>
                        @endforeach
                    </select>
                </div>

                <!--prof-->
                <div class="mb-4">
                    <label for="prof_id" class="block text-lg font-medium text-blue-600">Professeur</label>
                    <select wire:model.defer="prof_id" id="prof_id" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" required>
                        <option value="">-- Associer un professeur --</option>
                        @foreach($profs as $prof)
                            <option value="{{ $prof->id }}">{{ $prof->infoPerso->prenom }} {{ $prof->infoPerso->nom }} ({{ $prof->specialite }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex space-x-2">

                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-500"> @if($isModify) Mise à jours @else Créer la matière @endif </button>
                    @if($isModify)
                    <button type="button" wire:click="cancelEdit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-400">
                        Annuler
                    </button>
    @endif
                </div>
            </form>
        </div>
    </div>

    <!--tableau matière-->
    <div class="mt-1 max-w-full mx-auto bg-white p-4 rounded-xl shadow-md">
            <h3 class="mb-4 text-3xl text-center font-bold text-blue-600 dark:text-white">Liste des matières</h3>

            <div class="flex justify-center overflow-x-auto shadow-md sm:rounded-lg">

                <!--Tableau-->
                <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-white uppercase bg-blue-500 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">ID</th>
                            <th scope="col" class="px-6 py-3">Libelle</th>
                            <th scope="col" class="px-6 py-3">Categorie</th>
                            <th scope="col" class="px-6 py-3">Classe</th>
                            <th scope="col" class="px-6 py-3">Professeur</th>
                            <th scope="col" class="px-6 py-3">Specialite</th>
                            <th scope="col" class="px-6 py-3">Date de creation</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>

                    <tbody id="tableBody">
                        @if($matieres->isEmpty())
                            <tr>
                                <td colspan="7">Aucune matière trouvée</td>
                            </tr>
                        @else
                            @foreach($matieres as $matiere)
                                <tr class="odd:bg-white even:bg-gray-50 border-b dark:border-gray-700 border-gray-200">
                                    <td class="px-6 py-4">{{ $matiere->id}}</td>

                                    <td class="px-6 py-4">{{ $matiere->libelle_M }}</td>

                                    <td class="px-6 py-4">{{ $matiere->categorie->libelle_cat }}</td>

                                    <td class="px-6 py-4">{{ $matiere->classe->libelle_Cl }}</td>

                                    <td class="px-6 py-4">{{ $matiere->prof->infoPerso->prenom }} {{ $matiere->prof->infoPerso->nom }}</td>

                                    <td class="px-6 py-4">{{ $matiere->prof->specialite }}</td>

                                    <td class="px-6 py-4">{{ $matiere->created_at->format('h:m d/m/Y') }}</td>


                                    <td class="px-6 py-4">
                                        <!--button sup-->
                                        <form wire:submit.prevent="delete({{ $matiere->id }})" class="inline-block" title="Supprimer">
                                            <button type="submit" class="text-white hover:underline">
                                            <div class="p-1 hover:bg-red-600 bg-red-500 rounded-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" /></svg>
                                            </div>
                                            </button>

                                        </form>


                                        <!--button modif-->
                                        <button wire:click="loadData({{ $matiere->id }})" type="button" title="Modifier" class="inline-block text-white hover:underline">
                                            <div class="p-1 hover:bg-green-600 bg-green-500 rounded-lg">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" >
                                                </svg>
                                            </div>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>


</div>

