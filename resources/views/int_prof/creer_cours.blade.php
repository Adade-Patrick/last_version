@extends('layouts.app')

@section('content')

@include('partials.navbar')
@include('partials.sidebar')

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

                <!-- Classe et Matière -->
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

                <!-- Modules -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-blue-700 mb-2">Modules</label>

                    <input type="file" id="moduleFileInput" class="hidden" multiple>

                    <button type="button"
                        onclick="document.getElementById('moduleFileInput').click();"
                        class="bg-blue-500 text-white px-4 py-1 rounded hover:bg-blue-600">
                        + Ajouter un module
                    </button>

                    <!-- Affichage des fichiers sélectionnés -->
                    <div class="mb-6">
                        <div class="max-w-sm ml-0 mt-2 mx-auto bg-white rounded-xl shadow-md">
                            <div id="selectedFiles" class="grid grid-cols-1 gap-2"></div>
                        </div>
                    </div>
                </div>

                <!-- Type -->
                <div class="mb-6">
                    <label for="type" class="block text-sm font-medium text-blue-700 mb-2">Type</label>
                    <select name="type" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200" required">
                        <option value="pdf">PDF</option>
                        <option value="video">Vidéo</option>
                    </select>
                </div>

                <!-- Boutons -->
                <div class="flex flex-wrap gap-3">
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Enregistrer</button>
                    <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Aperçu</button>
                    <button type="button" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Annuler</button>
                    <button type="button" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Publier plus tard</button>
                </div>
            </form>
        </div>
    </main>
</div>

{{-- <script>
    const input = document.getElementById('moduleFileInput');
    const display = document.getElementById('selectedFiles');

    input.addEventListener('change', () => {
        let files = Array.from(input.files).map(f => f.name).join('<br>');
        display.innerHTML = files || '';
    });
</script> --}}

{{-- <script>
    const fileInput = document.getElementById('moduleFileInput');
    const fileListDisplay = document.getElementById('selectedFiles');
    let fileList = [];

    fileInput.addEventListener('change', () => {
        // Ajouter les fichiers sélectionnés au tableau
        fileList.push(...fileInput.files);

        // Nettoyer le champ file pour éviter de dupliquer les anciens fichiers
        fileInput.value = '';

        // Rafraîchir l'affichage
        renderFileList();
    });

    function renderFileList() {
        fileListDisplay.innerHTML = '';

        fileList.forEach((file, index) => {
            const li = document.createElement('li');
            li.className = 'flex justify-between items-center';

            li.innerHTML = `
                <span>${file.name}</span>
                <button type="button" onclick="removeFile(${index})"
                    class="text-red-500 hover:text-red-700 text-xs ml-2">Supprimer</button>
            `;

            fileListDisplay.appendChild(li);
        });
    }

    function removeFile(index) {
        fileList.splice(index, 1);
        renderFileList();
    }

    // À utiliser au moment de la soumission du formulaire
    // pour recréer dynamiquement un champ input avec les fichiers encore sélectionnés
    function appendFilesToForm(form) {
        const dataTransfer = new DataTransfer();
        fileList.forEach(file => dataTransfer.items.add(file));

        const newInput = document.createElement('input');
        newInput.type = 'file';
        newInput.name = 'modules[]';
        newInput.multiple = true;
        newInput.files = dataTransfer.files;
        newInput.style.display = 'none';

        form.appendChild(newInput);
    }

    // Exemple d’attachement à un formulaire
    const form = document.querySelector('form');
    form.addEventListener('submit', function (e) {
        appendFilesToForm(form);
    });
</script> --}}

{{-- <script>
    const fileInput = document.getElementById('moduleFileInput');
    const fileListDisplay = document.getElementById('selectedFiles');
    let fileList = [];

    fileInput.addEventListener('change', () => {
        fileList.push(...fileInput.files);
        fileInput.value = ''; // reset pour permettre rechargement même fichier
        renderFileList();
    });

    function renderFileList() {
        fileListDisplay.innerHTML = '';

        fileList.forEach((file, index) => {
            const fileCard = document.createElement('div');
            fileCard.className = 'flex items-center justify-between bg-gray-100 rounded p-2 shadow-sm';

            fileCard.innerHTML = `
                <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1M4 12V7a2 2 0 012-2h4l2 2h6a2 2 0 012 2v5" />
                    </svg>
                    <span class="text-sm text-gray-800 truncate max-w-[180px]">${file.name}</span>
                </div>
                <button onclick="removeFile(${index})"
                    class="text-red-500 hover:text-red-700 text-sm">Supprimer</button>
            `;

            fileListDisplay.appendChild(fileCard);
        });
    }

    function removeFile(index) {
        fileList.splice(index, 1);
        renderFileList();
    }

    // Gestion soumission formulaire
    const form = document.querySelector('form');
    form.addEventListener('submit', function (e) {
        appendFilesToForm(form);
    });

    function appendFilesToForm(form) {
        const dataTransfer = new DataTransfer();
        fileList.forEach(file => dataTransfer.items.add(file));

        const newInput = document.createElement('input');
        newInput.type = 'file';
        newInput.name = 'modules[]';
        newInput.multiple = true;
        newInput.files = dataTransfer.files;
        newInput.style.display = 'none';

        form.appendChild(newInput);
    }
</script> --}}

<script>
    const fileInput = document.getElementById('moduleFileInput');
    const fileListDisplay = document.getElementById('selectedFiles');
    let fileList = [];

    const typeIcons = {
        'application/pdf': '📕',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document': '📄', // DOCX
        'application/vnd.openxmlformats-officedocument.presentationml.presentation': '📊', // PPTX
        'image/jpeg': '🖼️',
        'image/png': '🖼️',
        'image/gif': '🖼️'
    };

    fileInput.addEventListener('change', () => {
        const allowedTypes = Object.keys(typeIcons);

        const newFiles = Array.from(fileInput.files);
        const validFiles = newFiles.filter(file => allowedTypes.includes(file.type));
        const rejectedFiles = newFiles.filter(file => !allowedTypes.includes(file.type));

        if (rejectedFiles.length > 0) {
            alert("Types de fichiers autorisés : PDF, DOCX, PPTX, images.");
        }

        fileList.push(...validFiles);
        fileInput.value = ''; // reset
        renderFileList();
    });

    function renderFileList() {
        fileListDisplay.innerHTML = '';

        fileList.forEach((file, index) => {
            const fileCard = document.createElement('div');
            fileCard.className = 'relative bg-blue-50 p-3 rounded shadow-md flex items-center space-x-3';

            const isImage = file.type.startsWith('image/');
            let iconHTML = '';

            if (isImage) {
                const reader = new FileReader();
                reader.onload = () => {
                    iconHTML = `<img src="${reader.result}" class="w-10 h-10 object-cover rounded" alt="image preview">`;
                    updateCardContent();
                };
                reader.readAsDataURL(file);
            } else {
                const icon = typeIcons[file.type] || '📁';
                iconHTML = `<div class="text-2xl">${icon}</div>`;
                updateCardContent();
            }

            function updateCardContent() {
                fileCard.innerHTML = `
                    <!-- Croix suppression -->
                    <button onclick="removeFile(${index})"
                        class="absolute top-1 right-1 text-red-600 hover:text-red-800 text-lg font-bold">
                        &times;
                    </button>

                    ${iconHTML}

                    <!-- Nom -->
                    <div class="flex-grow text-sm text-gray-800 truncate max-w-[180px]">${file.name}</div>
                `;
            }

            fileListDisplay.appendChild(fileCard);
        });
    }

    function removeFile(index) {
        fileList.splice(index, 1);
        renderFileList();
    }

    // Préparer les fichiers à la soumission
    const form = document.querySelector('form');
    form.addEventListener('submit', function (e) {
        appendFilesToForm(form);
    });

    function appendFilesToForm(form) {
        const dataTransfer = new DataTransfer();
        fileList.forEach(file => dataTransfer.items.add(file));

        const newInput = document.createElement('input');
        newInput.type = 'file';
        newInput.name = 'modules[]';
        newInput.multiple = true;
        newInput.files = dataTransfer.files;
        newInput.style.display = 'none';

        form.appendChild(newInput);
    }
</script>




@endsection

