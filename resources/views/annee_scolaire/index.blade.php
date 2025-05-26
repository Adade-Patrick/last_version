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
                    <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
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
<div class="p-2 sm:ml-64 bg-no-repeat bg-cover bg-gray-200 bg-blend-multiply">
    <h2 class="text-3xl text-center font-bold text-blue-600 mb-6">Bienvenue dans la gestion d'année scolaire</h2>
    <main class="mt-5 mb-0">
        <div>
                @if (session()->has('success'))
                        <div class="text-green-600 text-center p-2">{{ session('success') }}</div>
                @endif
            </div>
        <div class="h-full p-8 overflow">
            {{-- Formulaire de recherche et ajout --}}
            <div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow-md">

                <h2 class="text-2xl font-bold text-blue-600 mb-6">Ajouter une année scolaire</h2>

                <form method="GET" action="{{ route('annee_scolaire.index') }}" class="mb-4">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Rechercher un cycle..."
                        class="px-4 py-2 border rounded-lg focus:ring focus:ring-indigo-200">
                    <button type="submit" class="bg-violet-600 text-white px-4 py-2 rounded hover:bg-blue-600 ml-2">
                        Rechercher
                    </button>
                </form>

                <button id="openModalBtn" class="mb-4 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition" onclick="openModal()">
                    + Ajouter une Année
                </button>
            </div>
        </div>

        {{-- Tableau des années --}}
        <div class="mt-10 max-w-full mx-auto bg-white p-6 rounded-xl shadow-md">
            <h3 class="mb-4 text-3xl text-center font-bold text-blue-600 dark:text-white">Liste Année scolaire</h3>

            <div class="flex justify-center overflow-x-auto shadow-md sm:rounded-lg">


                    <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400 rounded">
                        <thead class="text-xs text-white uppercase bg-blue-500 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3">Id</th>
                                <th class="px-6 py-3">Libellé</th>
                                <th class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($annees as $annee)
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <td class="px-6 py-4">{{ $annee->id }}</td>
                                    <td class="px-6 py-4">{{ $annee->libelle_A }}</td>
                                    <td class="px-6 py-4">
                                        <!--button sup-->
                                        <form action="{{ route('annee.destroy', $annee->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="py-4">Aucune année scolaire trouvée</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
            </div>
        </div>

        {{-- Modal : Ajout d'une année --}}
        <div id="formModal" class="fixed inset-0 flex items-center justify-center invisible bg-black bg-opacity-30 backdrop-blur-sm z-50">
            <div class="max-w-md w-full bg-white p-8 rounded-xl shadow-md">
                <h2 class="text-lg font-bold mb-4 text-center text-blue-600">Ajouter une année scolaire</h2>
                <form id="anneeForm" action="{{ route('annee_scolaire.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="libelle_A" class="block text-sm font-medium text-gray-700">Libellé</label>
                        <input type="text" id="libelle_A" name="libelle_A" class="mt-1 block w-full border border-gray-300 rounded-md p-2 shadow-sm" required min="2000" max="2099">
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

{{-- Scripts pour modale --}}
<script>
    const formModal = document.getElementById('formModal');
    document.getElementById('openModalBtn').addEventListener('click', () => {
        formModal.classList.remove('invisible');
    });

    document.getElementById('closeModalBtn').addEventListener('click', () => {
        formModal.classList.add('invisible');
    });
</script>

@endsection
