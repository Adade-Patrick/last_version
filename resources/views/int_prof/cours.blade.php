@extends('layouts.app')

@section('content')

@include('partials.navbar')
@include('partials.sidebar')


<div class="fixed-div p-3 sm:ml-64 bg-no-repeat bg-cover bg-white bg-blend-multiply">
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
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Cycle</span>
                    </div>
                </li>
            </ol>
        </nav>
    </main>
</div>

<div class="p-1 sm:ml-64 bg-no-repeat bg-cover  bg-white bg-blend-multiply">
    <main class="mt-15 mb-15">
        <div class="p-4 bg-gray-100 ">
        <h2 class="text-2xl font-semibold text-blue-700 mb-6">Mes cours</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6">
            <!-- Carte cours -->
            <div class="bg-white rounded-xl shadow p-4 border-t-4 border-blue-600">
                <h3 class="text-lg font-bold text-blue-700 mb-2">Mathématiques - 3ème A</h3>
                <p class="text-sm text-gray-700">26 élèves inscrits</p>
                <p class="text-sm text-gray-700 mb-4">4 modules · 12 leçons</p>
                <div class="flex gap-2">
                    <button class="bg-green-500 text-white px-4 py-1 rounded hover:bg-green-600">Gérer</button>
                    <button class="bg-gray-300 text-gray-700 px-4 py-1 rounded hover:bg-gray-400">Voir activité</button>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow p-4 border-t-4 border-red-500">
                <h3 class="text-lg font-bold text-red-700 mb-2">Physique - 2nde B</h3>
                <p class="text-sm text-gray-700">28 élèves inscrits</p>
                <p class="text-sm text-gray-700 mb-4">3 modules · 9 leçons</p>
                <div class="flex gap-2">
                    <button class="bg-green-500 text-white px-4 py-1 rounded hover:bg-green-600">Gérer</button>
                    <button class="bg-gray-300 text-gray-700 px-4 py-1 rounded hover:bg-gray-400">Voir activité</button>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow p-4 border-t-4 border-yellow-400">
                <h3 class="text-lg font-bold text-yellow-700 mb-2">SVT - 4ème C</h3>
                <p class="text-sm text-gray-700">30 élèves inscrits</p>
                <p class="text-sm text-gray-700 mb-4">5 modules · 15 leçons</p>
                <div class="flex gap-2">
                    <button class="bg-green-500 text-white px-4 py-1 rounded hover:bg-green-600">Gérer</button>
                    <button class="bg-gray-300 text-gray-700 px-4 py-1 rounded hover:bg-gray-400">Voir activité</button>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow p-4 border-t-4 border-purple-500">
                <h3 class="text-lg font-bold text-purple-700 mb-2">Chimie - 1ère D</h3>
                <p class="text-sm text-gray-700">24 élèves inscrits</p>
                <p class="text-sm text-gray-700 mb-4">4 modules · 12 leçons</p>
                <div class="flex gap-2">
                    <button class="bg-green-500 text-white px-4 py-1 rounded hover:bg-green-600">Gérer</button>
                    <button class="bg-gray-300 text-gray-700 px-4 py-1 rounded hover:bg-gray-400">Voir activité</button>
                </div>
            </div>
        </div>
        </div>
    </main>
</div>



@endsection
