@extends('layouts.app')

@section('content')

@include('partials.navbar')
@include('partials.sidebar')

{{-- Navigation --}}
<div class="fixed-div p-3 sm:ml-64 bg-no-repeat bg-cover bg-white bg-blend-multiply">
    <main class="mt-24 mb-0">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-3 h-3 me-2.5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M19.707 9.293l-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414z"/>
                        </svg>
                        Tableau de bord
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-3 h-3 text-gray-400 mx-1 rtl:rotate-180" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Année scolaire</span>
                    </div>
                </li>
            </ol>
        </nav>
    </main>
</div>

{{-- Contenu principal --}}
<div class="p-2 sm:ml-64 bg-no-repeat bg-cover bg-white bg-blend-multiply">
<main class="mt-1 mb-0">
        <div class="h-full p-8 overflow">
        <!--Zone erreur-->
            <div class="max-w-xl mx-auto bg-white p-1 rounded-xl">
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
                <h2 class="text-2xl font-bold text-blue-600 mb-6">Classes</h2>

                <form method="GET" action="{{ route('classe.index') }}" class="mb-4">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Rechercher un cycle..."
                        class="px-4 py-2 border rounded-lg focus:ring focus:ring-indigo-200">
                    <button type="submit" class="bg-violet-600 text-white px-4 py-2 rounded hover:bg-blue-600 ml-2">
                        Rechercher
                    </button>
                </form>

                <button id="openModalBtn" class="mb-4 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition" onclick="openModal()">
                    + Ajouter une Classe
                </button>

                <ul class="divide-y divide-gray-200">
                    @foreach ($classes as $classe)
                        <li class="py-3 flex justify-between items-center">
                            <span class="text-gray-800">{{ $classes->libelle_Cl }}</span>
                            <div class="flex space-x-2">
                                <a href="{{ route('classe.edit', $classes->classe_id) }}" class="text-blue-500 hover:underline">Modifier</a>
                                <form action="{{ route('annee.destroy', $classes->classes_id) }}" method="POST" onsubmit="return confirm('Supprimer cette année ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline">Supprimer</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!--Zone Tableau-->
       <div class="mt-6 max-w-3xl mx-auto bg-white p-6 rounded-xl shadow-md">
            <h3 class="mb-4 text-3xl text-center font-bold text-blue-600 dark:text-white">Liste des Classes</h3>

            <div class="flex justify-center overflow-x-auto shadow-md sm:rounded-lg">
                    <!--Tableau-->
                    <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-white uppercase bg-blue-500 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Id</th>
                                    <th scope="col" class="px-6 py-3">Libelle</th>
                                    <th scope="col" class="px-6 py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                            @if($classes->isEmpty())
                            <tr>
                                <td colspan="3">Aucune classe trouvée</td>
                            </tr>
                            @else
                            @foreach($classes as $classe)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                            <td class="px-6 py-4">{{ $classe->id }}</td>
                            <td class="px-6 py-4">{{ $classe->libelle_Cl }}</td>
                            <td class="px-6 py-4">
                                <form action="{{ route('classe.destroy', $classe->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')

                                    <!-- Bouton pour ouvrir le modal -->
                                    <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline" onclick="openModal()">Supprimer</button>

                                    <!-- Modal -->
                                    <div id="deleteModal" class="fixed inset-0 flex items-center justify-center invisible">
                                        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                                            <h2 class="text-lg font-semibold mb-4">Confirmation</h2>
                                            <p>Êtes-vous sûr de vouloir supprimer cette Classe ?</p>
                                            <div class="flex justify-end mt-4">
                                                <button class="px-4 py-2 bg-gray-300 rounded mr-2" onclick="closeModal()">Annuler</button>
                                                <button id="confirmDelete" class="px-4 py-2 bg-red-600 text-white rounded">Supprimer</button>
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        function openModal() {
                                            document.getElementById('deleteModal').classList.remove('invisible');
                                        }

                                        function closeModal() {
                                            document.getElementById('deleteModal').classList.add('invisible');
                                        }

                                        document.getElementById('confirmDelete').addEventListener('click', function() {
                                            if (confirm('Confirmez-vous la suppression ?')) {
                                                alert('Classe supprimer !');
                                                closeModal();
                                            }
                                        });

                                        document.getElementById('cancelButton').addEventListener('click', function() {
                                            closeModal();
                                        });
                                    </script>
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
                <h2 class="text-lg font-bold mb-4 text-center text-blue-600">Ajouter une Classe</h2>
                <form id="classForm" action="{{ route('classe.store') }}" method="POST">
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

                  <!--active l'évenement-->
                <script>
                    document.getElementById('openModalBtn').addEventListener('click', function() {
                        document.getElementById('formModal').classList.remove('invisible');
                    });

                    document.getElementById('closeModalBtn').addEventListener('click', function() {
                        document.getElementById('formModal').classList.add('invisible');
                    });
                </script>
            </div>
        </div>
    </div>
</div>
@endsection







