@extends('layouts.app')

@section('content')

@include('partials.navbar')
@include('partials.sidebar')

<div class="p-3 sm:ml-64  bg-no-repeat bg-cover bg-white bg-blend-multiply">
    <main class="mt-24 mb-0 ">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
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
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Prof</span>
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
            <div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow-md">
                <h2 class="text-2xl font-bold text-blue-600 mb-6">Évaluations</h2>

                <!-- Formulaire de recherche -->
                <form method="GET" action="{{ route('traitements.evaluation.index') }}" class="mb-4">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Rechercher une évaluation..."
                        class="px-4 py-2 border rounded-lg focus:ring focus:ring-indigo-200">
                    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 ml-2">
                        Rechercher
                    </button>
                </form>

                <!-- Bouton d'ajout -->
                <a href="#"
                   class="mb-4 inline-block px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
                    + Ajouter une Évaluation
                </a>

                <!-- Liste des évaluations -->
                <ul class="divide-y divide-gray-200">
                    @foreach ($evaluations as $evaluation)
                        <li class="py-4">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-800">
                                        {{ $evaluation->chapitre->titre ?? 'Chapitre inconnu' }}
                                    </h3>
                                    <p class="text-sm text-gray-600 mt-1">
                                        Date de l’évaluation : {{ \Carbon\Carbon::parse($evaluation->date_evaluation)->format('d/m/Y') }}
                                    </p>
                                </div>
                                <div class="flex space-x-2">
                                    <a href="{{ route('evaluations.edit', $evaluation->id) }}"
                                       class="text-blue-500 hover:underline">Modifier</a>
                                    <form action="{{ route('evaluations.destroy', $evaluation->id) }}" method="POST"
                                          onsubmit="return confirm('Supprimer cette évaluation ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline">Supprimer</button>
                                    </form>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </main>
</div>


@endsection
