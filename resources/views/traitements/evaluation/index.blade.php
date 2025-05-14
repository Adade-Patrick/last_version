@extends('layouts.app')

@section('content')

@include('partials.navbar')
@include('partials.sidebar')

<div class="p-3 sm:ml-64 bg-no-repeat bg-cover bg-white bg-blend-multiply">
    <main class="mt-24 mb-0">
        <div class="min-h-screen p-8">
            <div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow-md">
                <h2 class="text-2xl font-bold text-gray-700 mb-6">Gestion des Évaluations</h2>

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
