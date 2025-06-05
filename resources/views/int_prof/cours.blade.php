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

        <div class="p-4">
            <h2 class="text-xl font-bold mb-4">Gestion des cours</h2>

            @if (session()->has('message'))
                <div class="mb-4 p-2 bg-green-100 text-green-700 rounded">
                    {{ session('message') }}
                </div>
            @endif



        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="py-2 px-4">id</th>
                    <th class="py-2 px-4">Nom</th>
                    <th class="py-2 px-4">Matière</th>
                    <th class="py-2 px-4">Description</th>
                    <th class="py-2 px-4">Actions</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                @if($cours->isEmpty())
                    <tr>
                        <td colspan="7">Aucun cours trouvé</td>
                    </tr>
                @else
                    @foreach($cours as $cour)
                        <tr class="odd:bg-white even:bg-gray-50 border-b dark:border-gray-700 border-gray-200">
                            <td class="px-6 py-4">{{ $cours->id }}</td>

                            <td class="px-6 py-4">{{ $cours->matiere->libelle_M }}</td>

                            <td class="px-6 py-4">{{ $cours->description }}</td>

                            <td class="px-6 py-4">{{ $matiere->created_at->format('d/m/Y') }}</td>


                            <td class="px-6 py-4">
                                <!--button sup-->
                                <form wire:submit.prevent="delete({{ $cours->id }})" class="inline-block">
                                    <button type="submit" class="text-white hover:underline">
                                    <div class="p-1 hover:bg-red-600 bg-red-500 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" /></svg>
                                    </div>
                                    </button>

                                </form>


                                <!--button modif-->
                                <form wire:submit.prevent="loadData({{ $cours->id }})" class="inline-block">
                                    <button type="submit" class=" text-white hover:underline">
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

    </main>
</div>

@endsection
