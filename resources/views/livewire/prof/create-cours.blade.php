@if($editModal)
<div>
    <div class="fixed-div p-3 sm:ml-64 bg-no-repeat bg-cover bg-white bg-blend-multiply overfl">
    <main class="mt-24 mb-0">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('int_prof.dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                        </svg>
                        Tableau de bord
                    </a>
                </li>

                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Créer cours</span>
                    </div>
                </li>
            </ol>
        </nav>
    </main>
    </div>

    <div class="p-1 sm:ml-64 bg-no-repeat bg-cover  bg-gray-100 bg-blend-multiply">
        <main class="mt-15 mb-15">
            <div class="p-6 bg-gray-100">
                <h2 class="text-2xl font-semibold text-blue-600 mb-6">Créer un nouveau cours
                </h2>
                    <!--Formulaire-->
                <form >
                    <!-- Titre du cours -->
                    <div class="mb-4">
                        <label class="block text-lg font-medium text-blue-700 mb-1">Titre du cours</label>
                        <input type="text" placeholder="Entrez le titre de votre cours" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-lg font-medium text-blue-700 mb-1">ImageUrl</label>
                        <input type="file" wire:model="imageUrl"
                            class="mt-1 w-full px-4 py-2 border rounded-xl" />
                        @error('imageUrl') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Classe -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="matiere_id" class="block text-lg font-medium text-blue-700 mb-1">Matière</label>
                            <select wire:model="matiere_id" name="matiere_id"
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200" required>
                                <option value="">Sélectionnez une matière</option>
                                @foreach($matieres as $matiere)
                                    <option value="{{ $matiere->id }}">{{ $matiere->libelle_M }}  ({{ $matiere->categorie->libelle_cat }}) {{ $matiere->classe->libelle_Cl }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label class="block text-lg font-medium text-blue-600 mb-1">Description du cours</label>
                        <textarea rows="4" placeholder="Décrivez le contenu et les objectifs de votre cours" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200"></textarea>
                    </div>



                    <!-- Boutons -->
                    <div class="flex flex-wrap gap-3">
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Enregistrer</button>

                        <a href="#">
                            <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Ajouter chapitre</button>
                        </a>

                        <button type="button" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Annuler</button>

                        <button type="button" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Publier plus tard</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>
@endif
