@extends('layouts.app')

@section('content')

@include('partials.navbar')
@include('partials.sidebar')

<div class="fixed-div p-3 sm:ml-64 bg-no-repeat bg-cover bg-white bg-blend-multiply">
    <main class="mt-24 mb-0">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('super_admin.dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
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
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Gestion Cours</span>
                    </div>
                </li>
            </ol>
        </nav>
    </main>
</div>

<div class="p-2 sm:ml-64 bg-no-repeat bg-cover bg-gray-200 bg-blend-multiply">
    <main class="mt-5 mb-0">
        <h2 class="text-3xl text-center font-bold text-blue-600 mb-6">Bienvenue dans la liste des cours crée par des professeurs</h2>
        <div class="p-8 overflow">
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
                <div class="h-full p-8 overflow">
                    {{-- Formulaire de recherche et ajout --}}
                    <div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow-md">
                        <h2 class="text-2xl font-bold text-blue-600 mb-6">Rechercher un cours</h2>

                        <form method="GET" action="{{ route('traitements.prof.index') }}" class="mb-4">
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Rechercher un cours..."
                                class="px-4 py-2 border rounded-lg focus:ring focus:ring-indigo-200">
                            <button type="submit" class="bg-violet-600 text-white px-4 py-2 rounded hover:bg-blue-600 ml-2">
                                Rechercher
                            </button>
                        </form>
                    </div>
                </div>
            </div>


            <!-- Section cours -->
            <div class="mt-10 max-w-full mx-auto bg-white p-6 rounded-xl shadow-md">
                <h3 class="mb-4 text-3xl text-center font-bold text-blue-600 dark:text-white">Liste des cours</h3>

                <div class="flex justify-center overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400 rounded">
                            <thead class="text-xs text-white uppercase bg-blue-500 dark:bg-gray-700">
                                <tr>
                                    {{-- <th scope="col" class="px-6 py-3">Id</th> --}}

                                    <th scope="col" class="px-6 py-3">Titre</th>

                                    <th scope="col" class="px-6 py-3">Classe</th>

                                    <th scope="col" class="px-6 py-3">Matiere</th>

                                    <th scope="col" class="px-6 py-3">Professeur</th>

                                    <th scope="col" class="px-6 py-3">Date de création</th>

                                    <th scope="col" class="px-6 py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                @if($cours->isEmpty())
                                    <tr>
                                        <td colspan="7">Aucun cours trouvé</td>
                                    </tr>
                                @else
                                    @foreach($cours as $c)
                                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                                            {{-- <td class="px-6 py-4">{{ $c->cours->id }}</td> --}}

                                            <td class="px-6 py-4">{{ $c->titre }}</td>

                                            <td class="px-6 py-4">{{ $c->matiere->classe->libelle_Cl }}</td>

                                            <td class="px-6 py-4">{{ $c->matiere->libelle_M }}</td>

                                            <td class="px-6 py-4">{{ $c->prof->infoPerso->prenom }} {{ $c->prof->infoPerso->nom }}</td>

                                            <td class="px-6 py-4">{{ $c->created_at }}</td>

                                            <td class="px-1 py-2 flex justify-center">
                                                <p>Publier</p>

                                                    <!--button sup-->
                                                {{-- <form action="#" method="POST" class="px-1" >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-white hover:underline">
                                                    <div class="p-1 hover:bg-red-600 bg-red-500 rounded-lg">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" /></svg>
                                                    </div>
                                                    </button>

                                                </form>

                                                    <!--button voir-->
                                                <form action="#" method="POST" class="px-1">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-white hover:underline">
                                                        <div class="p-1 hover:bg-blue-600 bg-blue-500 rounded-lg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"> <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                        </svg>
                                                        </div>
                                                    </button>
                                                </form>

                                                    <!--button modif-->
                                                <form action="#" method="POST" class="px-1">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-white hover:underline">
                                                        <div class="p-1 hover:bg-green-600 bg-green-500 rounded-lg">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" >
                                                            </svg>
                                                        </div>
                                                    </button>
                                                </form> --}}
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


@endsection
