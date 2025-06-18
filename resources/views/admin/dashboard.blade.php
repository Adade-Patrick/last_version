@extends('layouts.app')

@section('content')

@include('partials.navbar')
@include('partials.sidebar')

<div class="p-4 sm:ml-64 bg-no-repeat bg-cover  bg-gray-200 bg-blend-multiply">
    <main class="mt-20 mb-20">
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-6">
            <!-- Welcome Banner -->
            <div class="relative overflow-hidden bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl shadow-lg mb-6">

                <div class="relative p-6">
                    <h2 class="text-2xl text-center font-bold text-white mb-2">Bienvenue sur votre Dashbord {{ Auth::user()->name }} !</h2>
                    <p class="text-blue-100 text-center">Voici un aperçu de votre tableau de bord</p>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <!-- Total Elèves -->
                <div class="bg-blue-500 dark:bg-gray-800 rounded-xl shadow-sm border border-blue-600 dark:border-gray-700 hover:border-blue-500 dark:hover:border-blue-500 transition-colors p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-white dark:bg-blue-500/10 p-3 rounded-lg">
                            <svg class="w-6 h-6 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M20 22H4V20C4 17.2386 6.23858 15 9 15H15C17.7614 15 20 17.2386 20 20V22Z"></path>
                            </svg>
                        </div>
                        {{-- <span class="text-sm font-medium text-green-600 bg-green-50 px-2.5 py-0.5 rounded-full">{{ $eleveVariation }}%</span> --}}
                    </div>
                    <h3 class="text-2xl font-bold text-white dark:text-white mb-1 text-center">{{ $totalEleves }}</h3>
                    <p class="text-sm text-white dark:text-gray-400 text-center">Total Élèves</p>
                </div>

                <!-- Total Professeurs -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-blue-600 dark:border-gray-700 hover:border-blue-500 dark:hover:border-blue-500 transition-colors p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-purple-600 dark:bg-purple-500/10 p-3 rounded-lg">
                            <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M11 14.0619V20H13V14.0619C16.9463 14.554 20 17.9204 20 22H4C4 17.9204 7.05369 14.554 11 14.0619Z"></path>
                            </svg>
                        </div>
                        {{-- <span class="text-sm font-medium text-green-600 bg-green-50 px-2.5 py-0.5 rounded-full">{{ $profVariation }}%</span> --}}
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-1 text-center">{{ $totalProfs }}</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400 text-center">Total Professeurs</p>
                </div>

                <!-- Total Classes -->
                <div class="bg-blue-500 dark:bg-gray-800 rounded-xl shadow-sm border border-blue-600 dark:border-gray-700 hover:border-blue-500 dark:hover:border-blue-500 transition-colors p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-orange-50 dark:bg-orange-500/10 p-3 rounded-lg">
                            <svg class="w-6 h-6 text-orange-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M13 21V23.5L10 21.5L7 23.5V21H6.5C4.567 21 3 19.433 3 17.5V5C3 3.34315 4.34315 2 6 2H20C20.5523 2 21 2.44772 21 3V20C21 20.5523 20.5523 21 20 21H13Z"></path>
                            </svg>
                        </div>
                        {{-- <span class="text-sm font-medium text-green-600 bg-green-50 px-2.5 py-0.5 rounded-full">{{ $classeVariation }}%</span> --}}
                    </div>
                    <h3 class="text-2xl font-bold text-white dark:text-white mb-1 text-center">{{ $totalClasses }}</h3>
                    <p class="text-sm text-white dark:text-gray-400 text-center">Total Classes</p>
                </div>

                <!-- Success Rate -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-blue-600 dark:border-gray-700 hover:border-blue-500 dark:hover:border-blue-500 transition-colors p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-green-50 dark:bg-green-500/10 p-3 rounded-lg">
                            <svg class="w-6 h-6 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M5 3V19H21V21H3V3H5ZM19.9393 5.93934L22.0607 8.06066L16 14.1213L13 11.121L9.06066 15.0607L6.93934 12.9393L13 6.87868L16 9.879L19.9393 5.93934Z"></path>
                            </svg>
                        </div>
                        {{-- <span class="text-sm font-medium text-green-600 bg-green-50 px-2.5 py-0.5 rounded-full">+2%</span> --}}
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-1 text-center">{{ $totalMatieres }}</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400 text-center">Total Matières créés</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
               <!-- Recent Activities -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-blue-600 dark:border-gray-700">
                    <div class="p-6 border-b border-gray-100 dark:border-gray-700">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Activités Récentes</h3>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            @foreach($recentActivities as $eleve)
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <img class="w-8 h-8 rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode($eleve->nom . ' ' . $eleve->prenom) }}" alt="{{ $eleve->nom }}">
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-gray-900 dark:text-white">
                                            {{ $eleve->nom }} {{ $eleve->prenom }} inscrit
                                        </p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">
                                            Il y a {{ $eleve->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Actions rapides -->
                <div class="bg-blue-500 dark:bg-gray-800 rounded-xl shadow-sm border border-blue-600 dark:border-gray-700">
                    <div class="p-6 border-b border-gray-100 dark:border-gray-700">
                        <h3 class="text-lg font-semibold text-white dark:text-white">Actions Rapides</h3>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-2 gap-4">
                            <!--Gestion élève-->
                            <a href="{{ route('traitements.eleve.index') }}" class="flex items-center p-4 bg-gray-50 dark:bg-gray-700/50 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                <div class="flex-shrink-0">
                                    <div class="p-2 bg-blue-500 rounded-lg">
                                        <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M20 22H4V20C4 17.2386 6.23858 15 9 15H15C17.7614 15 20 17.2386 20 20V22Z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-900 dark:text-white">Liste des inscriptions</p>
                                </div>
                            </a>

                            <!--Ajouter prof-->
                            <a href="{{ route('traitements.prof.index') }}" class="flex items-center p-4 bg-gray-50 dark:bg-gray-700/50 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                <div class="flex-shrink-0">
                                    <div class="p-2 bg-purple-600 rounded-lg">
                                        <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M11 14.0619V20H13V14.0619C16.9463 14.554 20 17.9204 20 22H4C4 17.9204 7.05369 14.554 11 14.0619Z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-900 dark:text-white">Ajouter un prof</p>
                                </div>
                            </a>

                            <!--Cours créés-->
                            <a href="{{ route('traitements.cours.index') }}" class="flex items-center p-4 bg-gray-50 dark:bg-gray-700/50 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                <div class="flex-shrink-0">
                                    <div class="p-2 bg-yellow-300 rounded-lg">
                                        <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M13 21V23.5L10 21.5L7 23.5V21H6.5C4.567 21 3 19.433 3 17.5V5C3 3.34315 4.34315 2 6 2H20C20.5523 2 21 2.44772 21 3V20C21 20.5523 20.5523 21 20 21H13Z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-900 dark:text-white">Cours créés </p>
                                </div>
                            </a>

                            <!--Gérer profil compte-->
                            <a href="{{ route('classe.index') }}" class="flex items-center p-4 bg-gray-50 dark:bg-gray-700/50 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                <div class="flex-shrink-0">
                                    <div class="p-2 bg-orange-500 rounded-lg">
                                        <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M13 21V23.5L10 21.5L7 23.5V21H6.5C4.567 21 3 19.433 3 17.5V5C3 3.34315 4.34315 2 6 2H20C20.5523 2 21 2.44772 21 3V20C21 20.5523 20.5523 21 20 21H13Z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-900 dark:text-white">Créer classe</p>
                                </div>
                            </a>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </main>
</div>

@endsection
