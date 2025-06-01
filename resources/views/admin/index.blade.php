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

<div class="p-2 sm:ml-64 bg-no-repeat bg-cover bg-gray-200 bg-blend-multiply">
    <main class="mt-5 mb-5">
        {{-- <h2 class="text-3xl text-center font-bold text-blue-600 mb-6">Bienvenue dans la gestion des administrateurs</h2> --}}
        {{-- <div class="p-8 overflow">
            Formulaire de recherche et ajout
            <div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow-md">
                <h2 class="text-2xl font-bold text-blue-600 mb-6">Ajouter un admin</h2>

                <form method="GET" action="{{ route('admin.index') }}" class="mb-4">
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
        </div> --}}

        <div class="mt-4 max-w-full mx-auto bg-white p-8 rounded-xl shadow-md">
            <h3 class="mb-4 text-3xl text-center font-bold text-blue-600 dark:text-white">Liste des admins</h3>

            <div class="flex justify-center overflow-x-auto shadow-md sm:rounded-lg">

                <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-white uppercase bg-blue-500 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">ID</th>
                            <th scope="col" class="px-6 py-3">Nom</th>
                            <th scope="col" class="px-6 py-3">Prénom</th>
                            <th scope="col" class="px-6 py-3">Email</th>
                            <th scope="col" class="px-6 py-3">Téléphone</th>
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
                                    <td class="px-6 py-4">{{ $admin->user->email }}</td>
                                    <td class="px-6 py-4">{{ $admin->infoPerso->telephone ?? '-' }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>









@endsection
