@extends('layouts.app')

@section('content')

@include('partials.navbar')
@include('partials.sidebar')

<div class="fixed-div p-3 sm:ml-64 bg-no-repeat bg-cover bg-white bg-blend-multiply overfl">
    <main class="mt-24 mb-0">
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
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Créer matiere</span>
                    </div>
                </li>
            </ol>
        </nav>
    </main>
</div>

<div class="p-3 sm:ml-64 bg-no-repeat bg-cover  bg-gray-100 bg-blend-multiply">

    <h2 class="text-2xl font-semibold text-blue-600 mb-2">Créer une nouvelle matière</h2>
    <div class="p-8 overflow">
        <div class=" mx-auto bg-white p-4 rounded-xl shadow-md">
            @if (session('success'))
                <div class="mb-4 text-green-600">{{ session('success') }}</div>
            @endif

            <form action="{{ route('creer_matiere.store') }}" method="POST">
                @csrf

                <!-- Libelle du cours -->
                <div class="mb-4">
                    <label for="libelle_M" class="form-control block text-lg font-medium text-blue-600">Libellé </label>
                    <input type="text" name="libelle_M" id="libelle_M" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" required>
                </div>

                <!-- Sélection du cycle -->
                {{-- <div class="mb-6">
                    <label for="cycle" class="block text-lg font-medium text-blue-600">Cycle</label>
                    <select name="cycle_id" id="cycle" class="w-full border border-gray-300 p-2 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                        <option value="" disabled selected>
                            -- Sélectionnez un cycle --
                        </option>
                        @foreach($cycles as $cycle)
                            <option value="{{ $cycle->id }}">
                                {{ $cycle->libelle_C }}
                            </option>
                        @endforeach
                    </select>
                </div> --}}

                <!-- Categorie du cours -->
                <div class="mb-4">
                    <label for="libelle_cat" class="form-control block text-lg font-medium text-blue-600">Catégorie </label>
                    <input type="text" name="libelle_cat" id="libelle_cat" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" required>
                </div>

                <!-- Sélection de la classe -->
                <div class="mb-4">
                    <label for="classes_id" class="block text-lg font-medium text-blue-600">Classe</label>
                    <select name="classes_id" id="classes_id" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" required>
                        <option value="">-- Sélectionnez une classe --</option>
                        @foreach($classes as $classe)
                            <option value="{{ $classe->id }}">{{ $classe->libelle_Cl }}</option>
                        @endforeach
                    </select>
                    @error('classes_id')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!--prof-->
                <div class="mb-4">
                    <label for="prof_id" class="block text-lg font-medium text-blue-600">Professeur</label>
                    <select name="prof_id" id="prof_id" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" required>
                        <option value="">-- Associer un professeur --</option>
                        @foreach($profs as $prof)
                            <option value="{{ $prof->id }}">{{ $prof->nom }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex ">
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-500">Créer la matière</button>
                </div>
            </form>
        </div>
    </div>

    <!--tableau matière-->
    <div class="mt-1 max-w-full mx-auto bg-white p-4 rounded-xl shadow-md">
            <h3 class="mb-4 text-3xl text-center font-bold text-blue-600 dark:text-white">Liste des matières</h3>

            <div class="flex justify-center overflow-x-auto shadow-md sm:rounded-lg">

                <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-white uppercase bg-blue-500 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Libelle</th>
                            <th scope="col" class="px-6 py-3">Cycle</th>
                            <th scope="col" class="px-6 py-3">Categorie</th>
                            <th scope="col" class="px-6 py-3">Classe</th>

                            <th scope="col" class="px-6 py-3">Professeur</th>

                            <th scope="col" class="px-6 py-3">Date</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>

                    <tbody id="tableBody">
                        @if($matieres->isEmpty())
                            <tr>
                                <td colspan="7">Aucune matière trouvée</td>
                            </tr>
                        @else
                            @foreach($matieres as $matiere)
                                <tr class="odd:bg-white even:bg-gray-50 border-b dark:border-gray-700 border-gray-200">
                                    <td class="px-6 py-4">{{ $matiere->libelle_M }}</td>

                                    {{-- <td class="px-6 py-4">{{ $matiere->cycle->libelle_C }}</td> --}}

                                    <td class="px-6 py-4">{{ $matiere->categories->libelle_cat }}</td>

                                    <td class="px-6 py-4">{{ $matiere->classes->libelle_Cl }}</td>

                                    <td class="px-6 py-4">{{ $matiere->prof->info_perso->nom }}</td>

                                    <td class="px-6 py-4">{{ $matiere->created_at->format('d/m/Y') }}</td>


                                    <td class="px-6 py-4">
                                        <!--button sup-->
                                        <form action="{{ route('creer_matiere.destroy', $annee->id) }}" method="POST" class="inline-block">
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
                                        <form action="#" method="POST" class="inline-block">
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
                                        <form action="#" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-white hover:underline">
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
</div>



@endsection
