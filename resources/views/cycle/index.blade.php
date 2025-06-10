@extends('layouts.app')

@section('content')

@include('partials.navbar')
@include('partials.sidebar')

<div class="fixed-div p-3 sm:ml-64 bg-no-repeat bg-cover bg-white bg-blend-multiply">
    <main class="mt-24 mb-0">
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
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Cycle</span>
                    </div>
                </li>
            </ol>
        </nav>
    </main>
</div>

<div class="p-2 sm:ml-64 bg-no-repeat bg-cover bg-gray-200 bg-blend-multiply">
    <main class="mt-5 mb-0">
        <h2 class="text-3xl text-center font-bold text-blue-600 mb-6">Bienvenue dans la gestion de cycle</h2>
        <div class="p-8 overflow">
            <!-- Cycle -->
            <div class="max-w-xl mx-auto bg-white p-2 px-8 rounded-xl shadow-md">
                <h2 class="text-2xl font-bold text-blue-600 mb-6">
                    Ajouter un cycle
                </h2>

                <form method="GET" action="{{ route('cycle.index') }}" class="mb-4 overflow">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Rechercher un cycle..."
                        class="px-4 py-2 border rounded-lg focus:ring focus:ring-indigo-200">
                    <button type="submit" class="bg-violet-600 text-white px-4 py-2 rounded hover:bg-blue-600 ml-2">
                        Rechercher
                    </button>
                </form>

                <!--Button-->
                <button id="openModalBtn" class="mb-4 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition" onclick="openModal()">
                + Ajouter un Cycle
                </button>


            </div>

            <!-- Section cycle -->
            <div class="mt-10 max-w-full mx-auto bg-white p-6 rounded-xl shadow-md">
                <h3 class="mb-4 text-3xl text-center font-bold text-blue-600 dark:text-white">Liste cycle</h3>

                <div class="flex justify-center overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400 rounded">
                        <thead class="text-xs text-white uppercase bg-blue-500 dark:bg-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-3">Id</th>
                                <th scope="col" class="px-6 py-3">Libelle</th>
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @if($cycles->isEmpty())
                                <tr>
                                    <td colspan="7">Aucun cycle trouvé</td>
                                </tr>
                            @else
                                @foreach($cycles as $cycle)
                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                                        <td class="px-6 py-4">{{ $cycle->id }}</td>
                                        <td class="px-6 py-4">{{ $cycle->libelle_C }}</td>
                                        <td class="px-1 py-2">
                                            <!--button sup-->
                                            <form action="{{ route('cycle.destroy', $cycle->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-white hover:underline">
                                                <div class="p-1 hover:bg-red-600 bg-red-500 rounded-lg" title="Supprimer">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" /></svg>
                                                </div>
                                                </button>

                                            </form>

                                            <!--button modif-->
                                            <form action="{{ route('cycle.edit', $cycle->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('GET')
                                                <button type="submit" class="text-white hover:underline" title="Modifier">
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
        </div>
    </main>
</div>

<!-- Formulaire modal -->
<div id="formModal" class="fixed inset-0 flex items-center justify-center invisible bg-black bg-opacity-30 backdrop-blur-sm z-50">
    <div class="max-w-md w-full bg-white p-8 rounded-xl shadow-md">
        <h2 class="text-lg font-bold mb-4 text-center text-blue-600">Ajouter un cycle</h2>
        <form id="anneeForm" action="{{ route('cycle.store') }}" method="POST">
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

<script>
    document.getElementById('openModalBtn').addEventListener('click', function() {
        document.getElementById('formModal').classList.remove('invisible');
    });

    document.getElementById('closeModalBtn').addEventListener('click', function() {
        document.getElementById('formModal').classList.add('invisible');
    });
</script>


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
