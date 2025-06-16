@extends('layouts.app')

@section('content')

@include('partials.navbar')
@include('partials.sidebar')

<div class="p-3 sm:ml-64  bg-no-repeat bg-cover bg-white bg-blend-multiply">
    <main class="mt-24 mb-0 ">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('super_admin.dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
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
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Gestion admin</span>
                    </div>
                </li>
            </ol>
        </nav>
    </main>
</div>

<div class="p-2 sm:ml-64 bg-no-repeat bg-cover bg-gray-200 bg-blend-multiply">
    <main class="mt-5 mb-5">
        <h2 class="text-3xl text-center font-bold text-blue-600 mb-6">Bienvenue dans la gestion des administrateurs</h2>
        <div class="p-8 overflow">
            <div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow-md">
                <h2 class="text-2xl font-bold text-blue-600 mb-6">Ajouter un admin</h2>

                <form method="GET" action="{{ route('super_admin.index') }}" class="mb-4">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Rechercher un admin..."
                        class="px-4 py-2 border rounded-lg focus:ring focus:ring-indigo-200">
                    <button type="submit" class="bg-violet-600 text-white px-4 py-2 rounded hover:bg-blue-600 ml-2">
                        Rechercher
                    </button>
                </form>

                <button id="openModalBtn" class="mb-4 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition" onclick="openModal()">
                    + Ajouter un admin
                </button>
            </div>
        </div>

        <div class="mt-4 max-w-full mx-auto bg-white p-8 rounded-xl shadow-md">
            <h3 class="mb-4 text-3xl text-center font-bold text-blue-600 dark:text-white">Liste des admins</h3>

            <div class="flex justify-center overflow-x-auto shadow-md sm:rounded-lg">

                <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-white uppercase bg-blue-500 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">ID</th>
                            <th scope="col" class="px-6 py-3">Nom</th>
                            <th scope="col" class="px-6 py-3">Prénom</th>
                            <th scope="col" class="px-6 py-3">Nom d'utilisateur</th>
                            <th scope="col" class="px-6 py-3">Email</th>
                            <th scope="col" class="px-6 py-3">Téléphone</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>

                    <tbody id="tableBody">
                        @if($admins->isEmpty())
                            <tr>
                                <td colspan="7">Aucun admin trouvé</td>
                            </tr>
                        @else
                            @foreach($admins as $admin)
                                <tr class="odd:bg-white even:bg-gray-50 border-b dark:border-gray-700 border-gray-200">
                                    <td class="px-6 py-4">{{ $admin->id }}</td>
                                    <td class="px-6 py-4">{{ $admin->infoPerso->nom }}</td>
                                    <td class="px-6 py-4">{{ $admin->infoPerso->prenom }}</td>
                                    <td class="px-6 py-4">{{ $admin->user->name }}</td>
                                    <td class="px-6 py-4">{{ $admin->user->email }}</td>
                                    <td class="px-6 py-4">{{ $admin->infoPerso->telephone ?? '-' }}</td>

                                    <td class="px-6 py-4">
                                        <!--button sup-->
                                        <form action="{{ route('super_admin.destroy', $admin->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-white hover:underline">
                                            <div class="p-1 hover:bg-red-600 bg-red-500 rounded-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" /></svg>
                                            </div>
                                            </button>

                                        </form>

                                        <!--button voir-->
                                        <form action="#" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-white hover:underline">
                                                <div class="p-1 hover:bg-blue-600 bg-blue-500 rounded-lg">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"> <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                </svg>
                                                </div>
                                            </button>
                                        </form>

                                        <!--button modif-->
                                        <form action="#" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-white hover:underline">
                                                <div class="p-1 hover:bg-green-600 bg-green-500 rounded-lg">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" >
                                                    </svg>
                                                </div>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>

 <!-- Formulaire modal -->
<div id="formModal" class="fixed inset-0 flex items-center justify-center invisible bg-black bg-opacity-30 backdrop-blur-sm z-50">
    <div class="bg-white p-2 rounded-lg shadow-lg w-full max-w-xl relative">
        <h2 class="text-xl font-bold mb-4 text-center text-blue-600">Ajouter un administrateur</h2>
        <form id="multiStepForm" action="{{ route('super_admin.storeInfo') }}" method="POST">
            @csrf
            <div id="step1" class="step hidden">
                <h3 class="text-lg font-semibold mb-2 text-gray-700">Étape 1 : Informations personnelles</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="nom" class="block text-sm font-medium text-blue-600">Nom</label>
                        <input type="text" name="nom" id="nom" class="w-full border p-1 rounded" pattern="^[A-Za-zÀ-ÿ][A-Za-zÀ-ÿ\s'-]*\d*$" required>
                        <span class="text-red-500 text-xs hidden error-message"></span>
                    </div>
                    <div class="mb-4">
                        <label for="prenom" class="block text-sm font-medium text-blue-600">Prénom</label>
                        <input type="text" name="prenom" id="prenom" class="w-full border p-1 rounded" required>
                        <span class="text-red-500 text-xs hidden error-message"></span>
                    </div>
                    <div class="mb-4">
                        <label for="date_N" class="block text-sm font-medium text-blue-600">Date de naissance</label>
                        <input type="date" name="date_N" id="date_N" class="w-full border p-1 rounded" required>
                        <span class="text-red-500 text-xs hidden error-message"></span>
                    </div>
                    <div class="mb-4">
                        <label for="lieu_N" class="block text-sm font-medium text-blue-600">Lieu de naissance</label>
                        <input type="text" name="lieu_N" id="lieu_N" class="w-full border p-1 rounded" required>
                        <span class="text-red-500 text-xs hidden error-message"></span>
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
                        <input type="email" name="email" class="w-full border p-1 rounded" required>
                        <span class="text-red-500 text-xs hidden error-message"></span>
                    </div>
                    <div class="mb-4">
                        <label for="nationalite" class="block text-sm font-medium text-blue-600">Nationalité</label>
                        <input type="text" name="nationalite" id="nationalite" class="w-full border p-1 rounded" required>
                        <span class="text-red-500 text-xs hidden error-message"></span>
                    </div>
                    <div class="mb-4">
                        <label for="ville_residence" class="block text-sm font-medium text-blue-600">Ville de résidence</label>
                        <input type="text" name="ville_residence" id="ville_residence" class="w-full border p-1 rounded" required>
                        <span class="text-red-500 text-xs hidden error-message"></span>
                    </div>
                    <div class="mb-4">
                        <label for="telephone" class="block text-sm font-medium text-blue-600">Téléphone</label>
                        <input type="tel" name="telephone" id="telephone"
                               pattern="^\d{2}\s\d{3}\s\d{2}\s\d{2}$"
                               minlength="9"
                               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-1"
                               placeholder="Ex : 06 610 29 10"
                               required>
                        <span class="text-red-500 text-xs hidden error-message"></span>
                    </div>
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="button" id="cancelBtn" class="bg-red-600 text-white px-4 p-1 rounded">Annuler</button>
                    <button type="button" class="nextStep bg-blue-600 text-white px-4 py-2 rounded">Suivant</button>
                </div>
            </div>

            <div id="step2" class="step">
                <h3 class="text-lg font-semibold mb-2 text-gray-700">Étape 2 : Informations utilisateur</h3>
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-blue-600">Nom utilisateur</label>
                    <input type="text" name="name" class="w-full border rounded p-1" required>
                    <span class="text-red-500 text-xs hidden error-message"></span>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-blue-600">Mot de passe</label>
                    <input type="password" name="password" class="w-full border rounded p-1" required>
                </div>
                <div class="flex justify-between mt-4">
                    <button type="button" class="prevStep bg-gray-400 text-white px-4 py-1 rounded">Retour</button>
                    <button type="button" class="nextStep bg-blue-600 text-white px-4 py-1 rounded">Suivant</button>
                </div>
            </div>

            <div id="step3" class="step hidden">
                <h3 class="text-lg font-semibold mb-2 text-gray-700">Étape 3 : Finalisation</h3>
                <p class="mb-4 text-sm text-gray-600">Cliquez sur <strong>Enregistrer</strong> pour ajouter l'administrateur.</p>
                <div class="flex justify-between">
                    <button type="button" class="prevStep bg-gray-400 text-white px-4 py-2 rounded">Retour</button>
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Enregistrer</button>
                </div>
            </div>
        </form>
        <button id="closeModalBtn" class="absolute top-2 right-3 text-gray-500 hover:text-red-600 text-lg font-bold">&times;</button>
    </div>
</div>

<script>
    document.querySelectorAll('#cancelBtn, #closeModalBtn').forEach(button => {
        button.addEventListener('click', function () {
            // Réinitialise le formulaire
            document.getElementById('multiStepForm').reset();

            // Revenir à l'étape 1
            document.querySelectorAll('.step').forEach(step => step.classList.add('hidden'));
            document.getElementById('step1').classList.remove('hidden');

            // Cacher la modale
            document.getElementById('formModal').classList.add('invisible');
        });
    });
</script>


<!--message required--->
<script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('multiStepForm');
            const steps = document.querySelectorAll('.step');
            let currentStep = 0;

            // Show the first step initially
            steps[0].classList.remove('hidden');

            // Handle next button clicks
            document.querySelectorAll('.nextStep').forEach(button => {
                button.addEventListener('click', function() {
                    if (validateCurrentStep()) {
                        steps[currentStep].classList.add('hidden');
                        currentStep++;
                        steps[currentStep].classList.remove('hidden');
                    }
                });
            });

            // Handle previous button clicks
            document.querySelectorAll('.prevStep').forEach(button => {
                button.addEventListener('click', function() {
                    steps[currentStep].classList.add('hidden');
                    currentStep--;
                    steps[currentStep].classList.remove('hidden');
                });
            });

            // Validate current step
            function validateCurrentStep() {
                const currentStepElement = steps[currentStep];
                const inputs = currentStepElement.querySelectorAll('input, select');
                let isValid = true;

                inputs.forEach(input => {
                    const errorMessage = input.nextElementSibling;

                    // Reset previous error states
                    input.classList.remove('border-red-500');
                    errorMessage.classList.add('hidden');

                    if (input.hasAttribute('required') && !input.value.trim()) {
                        isValid = false;
                        input.classList.add('border-red-500');
                        errorMessage.textContent = 'Ce champ est requis';
                        errorMessage.classList.remove('hidden');
                    } else if (input.type === 'email' && input.value && !isValidEmail(input.value)) {
                        isValid = false;
                        input.classList.add('border-red-500');
                        errorMessage.textContent = 'Veuillez entrer une adresse email valide';
                        errorMessage.classList.remove('hidden');
                    } else if (input.type === 'tel' && input.value && !isValidPhone(input.value)) {
                        isValid = false;
                        input.classList.add('border-red-500');
                        errorMessage.textContent = 'Format: XX XXX XX XX';
                        errorMessage.classList.remove('hidden');
                    }
                });

                return isValid;
            }


            // Email validation
            function isValidEmail(email) {
                return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
            }

            // Phone validation
            function isValidPhone(phone) {
                return /^\d{2}\s\d{3}\s\d{2}\s\d{2}$/.test(phone);
            }

            // Handle form submission
            form.addEventListener('submit', function(e) {
                if (!validateCurrentStep()) {
                    e.preventDefault();
                }
            });

            // Format phone number as user types
            document.getElementById('telephone').addEventListener('input', function (e) {
            let value = e.target.value.replace(/\D/g, ''); // Ne garder que les chiffres
            let formatted = '';

            if (value.length > 0) formatted += value.substring(0, 2);
            if (value.length > 2) formatted += ' ' + value.substring(2, 5);
            if (value.length > 5) formatted += ' ' + value.substring(5, 7);
            if (value.length > 7) formatted += ' ' + value.substring(7, 9);

            e.target.value = formatted;
            });
        });
</script>


    <!--active l'évenement-->
<script>
    document.getElementById('openModalBtn').addEventListener('click', function() {
        document.getElementById('formModal').classList.remove('invisible');
    });

    document.getElementById('closeModalBtn').addEventListener('click', function() {
        document.getElementById('formModal').classList.add('invisible');
    });
</script>

{{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        let currentStep = 0;
        const steps = document.querySelectorAll('.step');
        const nextButtons = document.querySelectorAll('.nextStep');
        const prevButtons = document.querySelectorAll('.prevStep');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const formModal = document.getElementById('formModal');

        function showStep(index) {
            steps.forEach((step, i) => {
                step.classList.toggle('hidden', i !== index);
            });
        }

        nextButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                if (currentStep < steps.length - 1) {
                    currentStep++;
                    showStep(currentStep);
                }
            });
        });

        prevButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                if (currentStep > 0) {
                    currentStep--;
                    showStep(currentStep);
                }
            });
        });

        closeModalBtn.addEventListener('click', () => {
            formModal.classList.add('invisible');
            currentStep = 0;
            showStep(currentStep);
        });

        // Init
        showStep(currentStep);
    });
</script> --}}

<!--fige buton--->
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const steps = document.querySelectorAll(".step");
    const nextButtons = document.querySelectorAll(".nextStep");
    const prevButtons = document.querySelectorAll(".prevStep");
    let currentStep = 0;

    // Afficher la première étape
    steps.forEach((step, index) => {
        step.classList.toggle("hidden", index !== currentStep);
    });

    function validateStep(stepIndex) {
        const inputs = steps[stepIndex].querySelectorAll("input, select");
        return Array.from(inputs).every(input => input.checkValidity());
    }

    function toggleNextButton(stepIndex) {
        const btn = steps[stepIndex].querySelector(".nextStep, [type='submit']");
        if (btn) {
            btn.enable = !validateStep(stepIndex);
        }
    }

    // Appliquer la validation en temps réel sur chaque champ
    steps.forEach((step, stepIndex) => {
        const inputs = step.querySelectorAll("input, select");
        inputs.forEach(input => {
            input.addEventListener("input", () => toggleNextButton(stepIndex));
            input.addEventListener("change", () => toggleNextButton(stepIndex));
        });
    });

    // Gérer les clics sur "Suivant"
    nextButtons.forEach(button => {
        button.addEventListener("click", function (e) {
            e.preventDefault();
            if (validateStep(currentStep)) {
                steps[currentStep].classList.add("hidden");
                currentStep++;
                steps[currentStep].classList.remove("hidden");
                toggleNextButton(currentStep);
            }
        });
    });

    // Gérer les clics sur "Retour"
    prevButtons.forEach(button => {
        button.addEventListener("click", function () {
            steps[currentStep].classList.add("hidden");
            currentStep--;
            steps[currentStep].classList.remove("hidden");
            toggleNextButton(currentStep);
        });
    });

    // Initialiser les boutons de l'étape 0
    toggleNextButton(0);
    });
</script>

<!-- Modal message -->
<div id="messageModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 invisible">
    <div class="bg-white rounded-lg shadow-lg p-6 w-96">
        <h2 class="text-lg font-semibold mb-4 text-center">Message</h2>

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

        <div class="flex justify-center">
            <button onclick="closeModal()" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                OK
            </button>
        </div>
    </div>
</div>

<script>
    function closeModal() {
        document.getElementById('messageModal').classList.add('invisible');
    }

    window.addEventListener('DOMContentLoaded', () => {
        @if ($errors->any() || session('success'))
            document.getElementById('messageModal').classList.remove('invisible');
        @endif
    });
</script>



@endsection
