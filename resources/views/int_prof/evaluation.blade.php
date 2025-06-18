@extends('layouts.app')

@section('content')

@include('partials.navbar')
@include('partials.sidebar')

<div class="p-3 sm:ml-64  bg-no-repeat bg-cover bg-white bg-blend-multiply">
    <main class="mt-24 mb-0 ">
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
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Evaluation
                    </div>
                </li>
            </ol>
        </nav>
    </main>
</div>

<div class="p-3 sm:ml-64 bg-no-repeat bg-cover bg-gray-200 bg-blend-multiply">
    <h2 class="text-3xl text-center font-bold text-blue-600 mb-6">Gestion des évaluations</h2>
    <main class="mt-24 mb-0">
        <div class="p-8">
            <!-- Evaluation -->
            <div class="max-w-xl mx-auto bg-white p-2 px-8 rounded-xl shadow-md">
                <h2 class="text-2xl font-bold text-blue-600 mb-6">
                    Ajouter une Evaluation
                </h2>

                <form method="GET" action="{{ route('int_prof.evaluation') }}" class="mb-4 overflow">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Rechercher une évaluation..."
                        class="px-4 py-2 border rounded-lg focus:ring focus:ring-indigo-200">
                    <button type="submit" class="bg-violet-600 text-white px-4 py-2 rounded hover:bg-blue-600 ml-2">
                        Rechercher
                    </button>
                </form>

                <!--Button-->
                <button id="openEvaluationModalBtn" class="mb-4 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition" onclick="openModal()">
                + Ajouter une évaluation
                </button>


            </div>

            <!-- Liste des évaluations -->
            <div class="mt-12 max-w-full mx-auto bg-white p-4 rounded-xl shadow-md">
                <h3 class="mb-4 text-3xl text-center font-bold text-blue-600 dark:text-white">Liste des Évaluations</h3>

                <div class="flex justify-center overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-white uppercase bg-blue-500 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th class="px-6 py-3">Id</th>
                                <th class="px-6 py-3">Titre</th>
                                <th class="px-6 py-3">Cours</th>
                                <th class="px-6 py-3">Chapitre</th>
                                <th class="px-6 py-3">Type</th>
                                <th class="px-6 py-3">Durée (min)</th>
                                <th class="px-6 py-3">Date de création</th>
                                <th class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @if($evaluations->isEmpty())
                                <tr>
                                    <td colspan="7">Aucune évaluation trouvée</td>
                                </tr>
                            @else
                                @foreach($evaluations as $evaluation)
                                    <tr class="odd:bg-white even:bg-gray-50 border-b dark:border-gray-700 border-gray-200">
                                        <td class="px-6 py-4">{{ $evaluation->id }}</td>
                                        <td class="px-6 py-4">{{ $evaluation->titre }}</td>
                                        <td class="px-6 py-4">{{ $evaluation->chapitre->titre}}</td>
                                        <td class="px-6 py-4">{{ ucfirst($evaluation->type) }}</td>
                                        <td class="px-6 py-4">{{ $evaluation->duree }}</td>
                                        <td class="px-6 py-4">{{ $evaluation->date_debut->format('d/m/Y') }}</td>

                                        <td class="px-6 py-4">
                                            <!-- Supprimer -->
                                            <form action="{{ route('evaluations.destroy', $evaluation->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-white hover:underline">
                                                    <div class="p-1 hover:bg-red-600 bg-red-500 rounded-lg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21a48.108 48.108 0 0 0-3.478-.397M4.772 5.79a48.11 48.11 0 0 1 3.478-.397M7.5 5.5v-.916c0-1.18.91-2.164 2.09-2.201a51.964 51.964 0 0 1 3.32 0c1.18.037 2.09 1.022 2.09 2.201V5.5" />
                                                        </svg>
                                                    </div>
                                                </button>
                                            </form>

                                            <!-- Voir -->
                                            <a href="{{ route('evaluations.show', $evaluation->id) }}" class="inline-block">
                                                <div class="p-1 hover:bg-blue-600 bg-blue-500 rounded-lg text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                    </svg>
                                                </div>
                                            </a>

                                            <!-- Modifier -->
                                            <a href="{{ route('evaluations.edit', $evaluation->id) }}" class="inline-block">
                                                <div class="p-1 hover:bg-green-600 bg-green-500 rounded-lg text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Z" />
                                                    </svg>
                                                </div>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>

<div id="evaluationModal" class="fixed inset-0 flex items-center justify-center invisible bg-black bg-opacity-30 backdrop-blur-sm z-50">
    <div class="max-w-xl w-full bg-white p-8 rounded-xl shadow-md">
        <h2 class="text-lg font-bold mb-4 text-center text-blue-600">Ajouter une évaluation</h2>
        <form id="evaluationForm" action="#" method="POST">
            @csrf

            <div class="mb-4">
                <label for="titre" class="block text-sm font-medium text-blue-600">Titre</label>
                <input type="text" id="titre" name="titre" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
            </div>

            <div class="mb-4">
                <label for="cours_id" class="block text-sm font-medium text-blue-600">Cours</label>
                <select id="chapitre_id" name="cours_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                    <option value="">-- Sélectionner un cours --</option>
                    @foreach($cours as $cour)
                        <option value="{{ $cour->id }}">{{ $cour->titre }} </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="chapitre_id" class="block text-sm font-medium text-blue-600">Chapitre</label>
                <select id="chapitre_id" name="chapitre_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                    <option value="">-- Sélectionner un chapitre --</option>
                    @foreach($chapitres as $chapitre)
                        <option value="{{ $chapitre->id }}">{{ $chapitre->titre }} </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="type" class="block text-sm font-medium text-blue-600">Type</label>
                <select id="type" name="type" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                    <option value="">-- Sélectionner --</option>
                    <option value="quiz">Quizz</option>
                    <option value="test">Test</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="duree" class="block text-sm font-medium text-blue-600">Durée (en minutes)</label>
                <input type="number" id="duree" name="duree" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required min="1">
            </div>

            <div class="mb-6">
                <label for="date_debut" class="block text-sm font-medium text-blue-600">Date de creation</label>
                <input type="date" id="date_debut" name="date_debut" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
            </div>

            <div class="flex justify-center space-x-4">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Enregistrer</button>
                <button type="button" id="closeEvaluationModalBtn" class="bg-red-600 text-white px-4 py-2 rounded">Annuler</button>
            </div>
        </form>
    </div>
</div>


<!-- Modal message -->
<div id="messageModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 invisible">
    <div class="bg-white rounded-lg shadow-lg p-6 w-96">
        <h2 class="text-lg font-semibold mb-4 text-center">Message</h2>

        @if ($errors->any())
            <ul class="text-red-500 mb-4 text-sm">
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
    document.getElementById('openEvaluationModalBtn').addEventListener('click', function() {
        document.getElementById('evaluationModal').classList.remove('invisible');
    });

    document.getElementById('closeEvaluationModalBtn').addEventListener('click', function() {
        document.getElementById('evaluationModal').classList.add('invisible');
    });
</script>

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
