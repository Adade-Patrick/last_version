@extends('layouts.app')

@section('content')

@include('partials.navbar')
@include('partials.sidebar')

<div class="p-3 sm:ml-64 bg-no-repeat bg-cover bg-white bg-blend-multiply">
    <main class="mt-24 mb-0">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('super_admin.dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
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
                            <th class="px-6 py-3">Matricule</th>
                            <th class="px-6 py-3">Nom(s)</th>
                            <th class="px-6 py-3">Prénom(s)</th>
                            <th class="px-6 py-3">Classe</th>
                            <th class="px-6 py-3">Cycle</th>
                            <th class="px-6 py-3">Année scolaire</th>
                            <th class="px-6 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        @if($eleves->isEmpty())
                            <tr>
                                <td colspan="8" class="text-center">
                                    Aucun élève trouvé
                                </td>
                            </tr>
                            @else
                        @foreach($eleves as $eleve)
                            <tr class="odd:bg-white even:bg-gray-50 border-b dark:border-gray-700">
                                <td class="px-6 py-4">{{ $eleve->id }}</td>
                                <td class="px-6 py-4">{{ $eleve->Matricule }}</td>
                                <td class="px-6 py-4">{{ $eleve->infoPerso->nom }}</td>
                                <td class="px-6 py-4">{{ $eleve->infoPerso->prenom }}</td>
                                <td class="px-6 py-4">{{ $eleve->user->name }}</td>
                                <td class="px-6 py-4">{{ $eleve->classe->libelle_Cl}}</td>
                                <td class="px-6 py-4">{{ $eleve->cycle->libelle_C }}</td>
                                <td class="px-6 py-4 space-x-2">

                                    <form action="#" class="inline-block">
                                                <button type="submit" class="text-white hover:underline" title="Supprimer">
                                                <div class="p-1 hover:bg-red-600 bg-red-500 rounded-lg">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" /></svg>
                                                </div>
                                                </button>

                                            </form>


                                            <!--button modif-->
                                            <form action="#" class="inline-block">
                                                <button type="submit" class=" text-white hover:underline" title="Modifer">
                                                    <div class="p-1 hover:bg-green-600 bg-green-500 rounded-lg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" >
                                                        </svg>
                                                    </div>
                                                </button>
                                            </form>

                                            <!--button voir-->
                                            <form action="#"  class="inline-block" title="Voir">
                                                <button type="submit" class=" text-white hover:underline">
                                                    <div class="p-1 hover:bg-blue-600 bg-blue-500 rounded-lg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
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
