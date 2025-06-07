<div class="max-w-3xl mx-auto p-6 bg-white rounded-2xl shadow-md mt-10">
    <h2 class="text-xl font-bold text-gray-800 mb-4">Ajouter un chapitre au cours : {{ $cours->titre }}</h2>

    @if (session()->has('message'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded-xl">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save" class="space-y-6" enctype="multipart/form-data">
        <!-- Titre -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Titre</label>
            <input type="text" wire:model="titre" class="mt-1 w-full px-4 py-2 border rounded-xl" />
            @error('titre') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Description -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Description</label>
            <textarea wire:model="description" rows="3"
                      class="mt-1 w-full px-4 py-2 border rounded-xl"></textarea>
            @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Temps estimé -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Temps estimé (en minutes)</label>
            <input type="number" wire:model="temps_estime" min="1"
                   class="mt-1 w-full px-4 py-2 border rounded-xl" />
            @error('temps_estime') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Ressource -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Ressource (PDF ou vidéo)</label>
            <input type="file" wire:model="ressource"
                   class="mt-1 w-full px-4 py-2 border rounded-xl" />
            @error('ressource') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Évaluation optionnelle -->
        <div class="flex items-center">
            <input type="checkbox" wire:model="has_evaluation" id="has_evaluation"
                   class="h-4 w-4 text-blue-600 border-gray-300 rounded" />
            <label for="has_evaluation" class="ml-2 block text-sm text-gray-700">
                Ce chapitre contient une évaluation
            </label>
        </div>

        <!-- Bouton -->
        <div>
            <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-xl transition duration-300">
                Ajouter le chapitre
            </button>
        </div>
    </form>

    <!--liste chapitre-->   

    @if ($chapitres->isNotEmpty())
    <div class="mt-10 border-t pt-6">
        <h3 class="text-lg font-semibold mb-4 text-gray-800">Chapitres existants</h3>
        <ul class="space-y-4">
            @foreach ($chapitres as $chapitre)
                <li class="p-4 bg-gray-100 rounded-xl shadow-sm">
                    <div class="flex justify-between items-center">
                        <div>
                            <h4 class="text-md font-bold text-gray-900">{{ $chapitre->titre }}</h4>
                            <p class="text-sm text-gray-700">{{ $chapitre->description }}</p>
                            <p class="text-xs text-gray-600 mt-1">
                                Temps estimé : {{ $chapitre->temps_estime ?? '—' }} min
                                @if ($chapitre->has_evaluation)
                                    • Évaluation : ✅
                                @endif
                                @if ($chapitre->ressource)
                                    • <a href="{{ Storage::url($chapitre->ressource) }}" class="text-blue-500 hover:underline" target="_blank">Voir ressource</a>
                                @endif
                            </p>
                        </div>
                        <!-- Place pour bouton futur: éditer/supprimer -->
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@else
    <p class="mt-8 text-sm text-gray-600">Aucun chapitre n’a encore été ajouté à ce cours.</p>
@endif

</div>
