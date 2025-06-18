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

<div class="fixed-div p-3 sm:ml-64 bg-no-repeat bg-cover bg-gray-100 bg-blend-multiply">
    <main class="mt-5 mb-0">
        <div class="space-y-6">
            <!-- Page Header -->
            <div>
                <h1 class="text-2xl font-bold text-blue-800 dark:text-white">Parametres du compte</h1>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Modifier vos parametres du compte
                </p>
            </div>

            <!-- Settings Sections -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Profile Settings -->
                <div class="md:col-span-2">
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md">
                        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                            <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Informations personnelles</h2>
                            {{-- <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                Update your personal information and profile settings
                            </p> --}}
                        </div>

                        <form class="p-6 space-y-6">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300">
                                    Photo de profil
                                </label>
                                <div class="mt-2 flex items-center space-x-4">
                                    <div class="h-12 w-12 rounded-full bg-indigo-100 flex items-center justify-center">
                                        <label for="profile_photo_path" class="cursor-pointer">
                                        <img
                                            src="{{ Auth::user()->profile_photo_path ? asset('storage/' . Auth::user()->profile_photo_path) . '?' . time() : asset('images/logo_emonaya.jpg') }}"
                                            alt="Profile"
                                            class="w-12 h-13 rounded-full cursor-pointer"
                                            title="Changer l'image de profil"
                                            data-dropdown-toggle="userDropdown" data-dropdown-placement="bottom-start"/>
                                    </label>
                                    </div>
                                    <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:hover:bg-gray-600" onclick="document.getElementById('profile_photo_upload').click();">
                                        Changer la Photo
                                    </button>

                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        <div class="font-bold">Nom</div>
                                        <div class="font-medium truncate">{{ Auth::user()->admin->infoPerso->nom }}</div>
                                    </label>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        <div class="font-bold">Prénom</div>
                                        <div class="font-medium truncate">{{ Auth::user()->admin->infoPerso->prenom }}</div>
                                    </label>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        <div class="font-bold">Adresse Mail</div>
                                        <div class="font-medium truncate">{{ Auth::user()->email }}</div>
                                    </label>

                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        <div class="font-bold">Date de naissance</div>
                                        <div class="font-medium truncate">{{ Auth::user()->admin->infoPerso->date_N }}</div>
                                    </label>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        <div class="font-bold">Lieu de naissance</div>
                                        <div class="font-medium truncate">{{ Auth::user()->admin->infoPerso->date_N }}</div>
                                    </label>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        <div class="font-bold">Date de naissance</div>
                                        <div class="font-medium truncate">{{ Auth::user()->admin->infoPerso->lieu_N }}</div>
                                    </label>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        <div class="font-bold">Sexe</div>
                                        <div class="font-medium truncate">{{ Auth::user()->admin->infoPerso->sexe }}</div>
                                    </label>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        <div class="font-bold">Nationalité</div>
                                        <div class="font-medium truncate">{{ Auth::user()->admin->infoPerso->nationalite }}</div>
                                    </label>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        <div class="font-bold">Ville de résidence</div>
                                        <div class="font-medium truncate">{{ Auth::user()->admin->infoPerso->ville_residence }}</div>
                                    </label>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        <div class="font-bold">Téléphone</div>
                                        <div class="font-medium truncate">{{ Auth::user()->admin->infoPerso->ville_residence }}</div>
                                </div>
                            </div>

                            {{-- <div class="flex justify-end">
                                <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:bg-indigo-700 dark:hover:bg-indigo-600">
                                    Save Changes
                                </button>
                            </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>


@endsection
