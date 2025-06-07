@extends('layouts.app')

@section('content')

@include('partials.navbar')
@include('partials.sidebar')

@livewire('prof.create-cours')



<!-- Modules -->
{{-- <div class="mb-6">
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
</div> --}}

<!-- Type -->
{{-- <div class="mb-6">
    <label for="type" class="block text-sm font-medium text-blue-700 mb-2">Type</label>
    <select name="type" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200" required">
        <option value="pdf">PDF</option>
        <option value="video">Vidéo</option>
    </select>
</div> --}}


{{-- <script>
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
</script> --}}
@endsection

