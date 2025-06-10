@extends('layouts.app')

@section('content')

@include('partials.navbar')
@include('partials.sidebar')

<div class="p-3 sm:ml-64 bg-no-repeat bg-cover bg-white bg-blend-multiply">
    <main class="mt-24 mb-0">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-3 h-3 me-2.5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                        </svg>
                        Tableau de bord
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Élève</span>
                    </div>
                </li>
            </ol>
        </nav>
    </main>
</div>

<div class="p-10 sm:ml-64 bg-no-repeat bg-cover bg-gray-200 bg-blend-multiply">
    <main class="mt-5 mb-0">


        <div class="mt-10 max-w-full mx-auto bg-white p-6 rounded-xl shadow-md">
            <h3 class="mmb-4 text-3xl text-center font-bold text-blue-600 dark:text-white">Liste des comptes élèves</h3>

            <div class="flex justify-center overflow-x-auto shadow-md sm:rounded-lg">
                @if(session('success'))
                    <div class="flex justify-center bg-green-100 border-black text-green-500 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-white uppercase bg-blue-500 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class="px-6 py-3">ID</th>
                            <th class="px-6 py-3">Nom(s)</th>
                            <th class="px-6 py-3">Prénom(s)</th>
                            <th class="px-6 py-3">Cycle</th>
                            <th class="px-6 py-3">Classe</th>
                            <th class="px-6 py-3">Nom d'utilisateur</th>
                            <th class="px-6 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        @if($eleves->isEmpty())
                            <tr>
                                <td colspan="3" class="text-center">
                                    Aucun élève trouvé
                                </td>
                            </tr>
                            @else
                        @foreach($eleves as $eleve)
                            <tr class="odd:bg-white even:bg-gray-50 border-b dark:border-gray-700">
                                <td class="px-6 py-4">{{ $eleve->id }}</td>
                                <td class="px-6 py-4">{{ $eleve->dateNaissance->format('d/m/Y') }}</td>
                                <td class="px-6 py-4">{{ $eleve->telephone }}</td>
                                <td class="px-6 py-4">{{ $eleve->cycle->libelle ?? '' }}</td>
                                <td class="px-6 py-4">{{ $eleve->anneeScolaire->libelle_A ?? '' }}</td>
                                <td class="px-6 py-4">{{ $eleve->classe->libelle_Cl ?? '' }}</td>
                                <td class="px-6 py-4">{{ $eleve->user->user_name ?? '' }}</td>
                                <td class="px-6 py-4 space-x-2">

                                    <a href="{{ route('eleves.show', $eleve) }}" class="text-blue-600 hover:underline">Voir</a>

                                    <a href="{{ route('eleves.edit', $eleve) }}" class="text-yellow-600 hover:underline">Modifier</a>

                                    <form action="{{ route('eleves.destroy', $eleve) }}" method="POST" class="inline-block" onsubmit="return confirm('Supprimer cet élève ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Supprimer</button>
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
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-xl relative">
        <h2 class="text-xl font-bold mb-4 text-center text-blue-600">Ajouter un professeur</h2>
        <form id="multiStepForm" action="{{ route('prof.store') }}" method="POST">
            @csrf
            <div id="step1" class="step hidden">
                <h3 class="text-lg font-semibold mb-2 text-gray-700">Étape 1 : Informations personnelles</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="nom" class="block text-sm font-medium text-blue-600">Nom</label>
                        <input type="text" name="nom" id="nom" class="w-full border p-2 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label for="prenom" class="block text-sm font-medium text-blue-600">Prénom</label>
                        <input type="text" name="prenom" id="prenom" class="w-full border p-2 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label for="date_N" class="block text-sm font-medium text-blue-600">Date de naissance</label>
                        <input type="date" name="date_N" id="date_N" class="w-full border p-2 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label for="lieu_N" class="block text-sm font-medium text-blue-600">Lieu de naissance</label>
                        <input type="text" name="lieu_N" id="lieu_N" class="w-full border p-2 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label for="sexe" class="block text-sm font-medium text-blue-600">Sexe</label>
                        <select name="specialite" id="sexe" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                            <option value="">-- Sélectionner --</option>
                            <option value="Homme">Homme</option>
                            <option value="Femme">Femme</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-blue-600">Email</label>
                        <input type="email" name="email" class="w-full border rounded p-2" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" required>
                    </div>

                    <div class="mb-4">
                        <label for="nationalite" class="block text-sm font-medium text-blue-600">Nationalité</label>
                        <input type="text" name="nationalite" id="nationalite" class="w-full border p-2 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label for="ville_residence" class="block text-sm font-medium text-blue-600">Ville de résidence</label>
                        <input type="text" name="ville_residence" id="ville_residence" class="w-full border p-2 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label for="telephone" class="block text-sm font-medium text-blue-600">Téléphone</label>
                        <input type="tel" name="telephone" id="telephone"
                            pattern="^\d{2}\s\d{3}\s\d{2}\s\d{2}$"
                            minlength="9"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                            placeholder="Ex : 06 610 29 10"
                            required>
                        {{-- <p class="text-sm text-gray-500 mt-1">Le numéro doit contenir au moins 9 chiffres.</p> --}}
                    </div>
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="button" id="closeModalBtn" class="bg-red-600 text-white px-4 py-2 rounded">Annuler</button>
                    <button type="submit" class="nextStep bg-blue-600 text-white px-4 py-2 rounded" disabled>Suivant</button>
                </div>
            </div>

            <div id="step2" class="step">
                <h3 class="text-lg font-semibold mb-2 text-gray-700">Étape 2 : Informations utilisateur</h3>
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-blue-600">Nom utilisateur</label>
                    <input type="text" name="name" class="w-full border rounded p-2" required>
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-blue-600">Mot de passe</label>
                    <input type="password" name="password" pattern=".{6,}" class="w-full border rounded p-2" required>
                </div>

                <div class="flex justify-between mt-4">
                    <button type="button" class="prevStep bg-gray-400 text-white px-4 py-2 rounded">Retour</button>
                    <button type="submit" class="nextStep bg-blue-600 text-white px-4 py-2 rounded" disabled>Suivant</button>
                </div>
            </div>

            <!-- Étape 3 : Spécialité -->
            <div id="step3" class="step hidden">
                <h3 class="text-lg font-semibold mb-2 text-gray-700">Étape 3 : Spécialité du professeur</h3>
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-blue-600">Spécialité</label>
                    <input type="text" name="name" class="w-full border rounded p-2" required>
                </div>

                <div class="flex justify-between">
                    <button type="button" class="prevStep bg-gray-400 text-white px-4 py-2 rounded">Retour</button>
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded" disabled>Enregistrer</button>
                </div>
            </div>

            <div id="step3" class="step hidden">
                <h3 class="text-lg font-semibold mb-2 text-gray-700">Étape 4 : Finalisation</h3>
                <p class="mb-4 text-sm text-gray-600">Cliquez sur <strong>Enregistrer</strong> pour ajouter l'administrateur.</p>
                <div class="flex justify-between">
                    <button type="button" class="prevStep bg-gray-400 text-white px-4 py-2 rounded">Retour</button>
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded" disabled>Enregistrer</button>
                </div>
            </div>
        </form>
        <button id="closeModalBtn" class="absolute top-2 right-3 text-gray-500 hover:text-red-600 text-lg font-bold">&times;</button>
    </div>
</div>



    <!--active l'évenement-->
<script>
    document.getElementById('openModalBtn').addEventListener('click', function() {
        document.getElementById('formModal').classList.remove('invisible');
    });

    document.getElementById('closeModalBtn').addEventListener('click', function() {
        document.getElementById('formModal').classList.add('invisible');
    });
</script>


<script>
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
</script>

<script>
    document.getElementById('telephone').addEventListener('input', function (e) {
    let value = e.target.value.replace(/\D/g, ''); // Ne garder que les chiffres
    let formatted = '';

    if (value.length > 0) formatted += value.substring(0, 2);
    if (value.length > 2) formatted += ' ' + value.substring(2, 5);
    if (value.length > 5) formatted += ' ' + value.substring(5, 7);
    if (value.length > 7) formatted += ' ' + value.substring(7, 9);

    e.target.value = formatted;
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
            btn.disabled = !validateStep(stepIndex);
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

@endsection
