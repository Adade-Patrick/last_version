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
        <div class="h-full p-8 overflow">
            <!--Zone erreur-->
            <div class="max-w-xl mx-auto bg-white p-0 rounded-xl">
                @if($errors->any())
                    <ul>
                        @foreach($errors->all() as $error)
                            <li role="alert" class="flex justify-center  bg-red-100 border-black text-red-500 px-4 py-3 rounded relative">{{$error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <!--message apres action-->
                    @if (session('success'))
                        <div class="flex justify-center  bg-green-100 border-black text-green-500 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{session('success')}}</span>
                    </div>
                @endif
            </div>
            {{-- Formulaire de recherche et ajout --}}
            <div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow-md">
                <h2 class="text-2xl font-bold text-blue-600 mb-6">Elèves</h2>

                <form method="GET" action="{{ route('traitements.eleve.index') }}" class="mb-4">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Rechercher un élève..."
                        class="px-4 py-2 border rounded-lg focus:ring focus:ring-indigo-200">
                    <button type="submit" class="bg-violet-600 text-white px-4 py-2 rounded hover:bg-blue-600 ml-2">
                        Rechercher
                    </button>
                </form>

                <button id="openModalBtn" class="mb-4 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition" onclick="openModal()">
                    + Ajouter un élève
                </button>

                <ul class="divide-y divide-gray-200">
                    {{-- @foreach ($eleves as $eleve)
                        <li class="py-3 flex justify-between items-center">
                            <span class="text-gray-800">{{ $eleves->libelle_Cl }}</span>
                            <div class="flex space-x-2">
                                <a href="{{ route('classe.edit', $classes->classe_id) }}" class="text-blue-500 hover:underline">Modifier</a>
                                <form action="{{ route('annee.destroy', $classes->classes_id) }}" method="POST" onsubmit="return confirm('Supprimer cette année ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline">Supprimer</button>
                                </form>
                            </div>
                        </li>
                    @endforeach --}}
                </ul>
            </div>
        </div>

        <div class="mt-10 max-w-full mx-auto bg-white p-6 rounded-xl shadow-md">
            <h3 class="mmb-4 text-3xl text-center font-bold text-blue-600 dark:text-white">Liste des élèves</h3>

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
                                <td colspan="3">
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

         <!-- Formulaire modal -->
        <div id="formModal" class="fixed inset-0 flex items-center justify-center invisible bg-black bg-opacity-30 backdrop-blur-sm z-50">
            <div class="bg-white p-5 rounded shadow-lg w-96">
                <h2 class="text-lg font-bold mb-4 text-center text-blue-600">Ajouter un élève</h2>
                <form id="classForm" action="#" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="libelle" class="block text-sm font-medium text-gray-700">Libelle</label>
                        <input type="text" id="libelle_C" name="libelle_C" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required min="2000" max="2099">
                    </div>

                    <div class="flex justify-center space-x-4">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Enregistrer</button>
                        <button type="button" id="closeModalBtn" class="bg-red-600 text-white px-4 py-2 rounded">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
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

@endsection
