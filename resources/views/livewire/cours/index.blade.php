<div>
   <div class="p-4">
        <h2 class="text-xl font-bold text-blue-700 mb-4">Gestion des Cours</h2>

        <!-- Formulaire -->
        <form wire:submit.prevent="save" class="mb-6 grid gap-4 grid-cols-1 md:grid-cols-2">
            <div>
                <label class="block mb-1 text-blue-700 font-medium">Titre</label>
                <input wire:model.defer="titre" type="text" class="w-full border rounded px-3 py-2" placeholder="Titre du cours">
                @error('titre') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!--matiere-->
            <div>
                <label class="block mb-1 text-blue-700 font-medium">Matière</label>
                <select wire:model.defer="matiere_id" class="w-full border rounded px-3 py-2">
                    <option value="">Sélectionnez une matière</option>
                    @foreach($matieres as $matiere)
                        <option value="{{ $matiere->id }}">{{ $matiere->libelle_M }} ({{ $matiere->categorie->libelle_cat }}) {{ $matiere->classe->libelle_Cl }}</option>
                    @endforeach
                </select>
                @error('matiere_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!--description-->
            <div class="md:col-span-2">
                <label class="block mb-1 text-blue-700 font-medium">Description</label>
                <textarea wire:model.defer="description" class="w-full border rounded px-3 py-2" rows="3"></textarea>
            </div>

            <!--module-->
            <div>
                <label class="block mb-1 text-blue-700 font-medium">Module</label>
                <input wire:model.defer="module" type="text" class="w-full border rounded px-3 py-2">
                @error('module') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!--type-->
            <div>
                <label class="block mb-1 text-blue-700 font-medium">Type</label>
                <select wire:model.defer="type" class="w-full border rounded px-3 py-2">
                    <option value="pdf">PDF</option>
                    <option value="video">Vidéo</option>
                </select>
            </div>

            <div class="md:col-span-2">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Ajouter</button>
            </div>
        </form>

        <!-- Liste des cours -->
        <table class="min-w-full bg-white border">
            <thead>
                <tr class="bg-gray-100 text-blue-700">
                    <th class="px-4 py-2">Titre</th>
                    <th class="px-4 py-2">Matière</th>
                    <th class="px-4 py-2">Description</th>
                    <th class="px-4 py-2">Module</th>
                    <th class="px-4 py-2">Type</th>
                    <th class="px-4 py-2">Date</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($cours as $c)
                    <tr class="odd:bg-white even:bg-gray-50">
                        <td class="px-4 py-2">{{ $c->titre }}</td>
                        <td class="px-4 py-2">{{ $c->matiere->libelle_M }} ({{ $c->matiere->categorie->libelle_cat }}) {{ $c->matiere->classe->libelle_Cl }}</td>
                        <td class="px-4 py-2">{{ Str::limit($c->description, 50) }}</td>
                        <td class="px-4 py-2">{{ $c->module }}</td>
                        <td class="px-4 py-2">{{ $c->type }}</td>
                        <td class="px-4 py-2">
                            <button wire:click="delete({{ $c->id }})" class="text-white bg-red-500 px-2 py-1 rounded hover:bg-red-600">Supprimer</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">Aucun cours disponible.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>

</div>
