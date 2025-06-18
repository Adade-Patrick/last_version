@extends('layouts.app')

@section('content')

@include('partials.navbar')
@include('partials.sidebar')
@include('int_prof.modals.create')

<div class="fixed-div p-3 sm:ml-64 bg-no-repeat bg-cover bg-white bg-blend-multiply">
    <main class="mt-24 mb-0">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('int_prof.dashboard') }}" class="inline-flex items-center text-sm font-medium text-black hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
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
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Mes cours</span>
                    </div>
                </li>
            </ol>
        </nav>
    </main>
</div>

<div class="p-1 sm:ml-64 bg-no-repeat bg-cover  bg-white bg-blend-multiply">
    <main class="mt-15 mb-15">
        <div class="p-4 bg-gray-100 ">
        <h2 class="text-3xl text-center font-semibold text-blue-700 mb-6">Mes cours</h2>

        <button data-modal-target="create-cours-modal" data-modal-toggle="create-cours-modal" class="block text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
            <div class="flex">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>creer un cours
            </div>
        </button>


        <!--tableau cours-->
        <div class="mt-1 max-w-full mx-auto bg-white p-4 rounded-xl shadow-md">

                <div class="flex justify-center overflow-x-auto shadow-md sm:rounded-lg">

                    <!--Tableau-->
                    <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-white uppercase bg-blue-500 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">ID</th>
                                <th scope="col" class="px-6 py-3">Titre</th>
                                <th scope="col" class="px-6 py-3">Matiere</th>
                                <th scope="col" class="px-6 py-3">Description</th>
                                <th scope="col" class="px-6 py-3">Date de creation</th>
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>

                        <tbody id="tableBody">
                            @if($cours->isEmpty())
                                <tr>
                                    <td colspan="7">Aucun cours trouvé !</td>
                                </tr>
                            @else
                                @foreach($cours as $cour)
                                    <tr class="odd:bg-white even:bg-gray-50 border-b dark:border-gray-700 border-gray-200">
                                        <td class="px-6 py-4">{{ $cour->id }}</td>

                                        <td class="px-6 py-4">{{ $cour->titre }}</td>

                                        <td class="px-6 py-4">{{ $cour->matiere->libelle_M }} {{ $cour->matiere->classe->libelle_Cl }}</td>

                                        <td class="px-6 py-4">{{ $cour->description }}</td>


                                        <td class="px-6 py-4">{{ $cour->created_at->format('d/m/Y') }}</td>


                                        <td class="px-6 py-4">
                                            <!--button sup-->
                                            <form wire:submit.prevent="delete({{ $cour->id }})" class="inline-block">
                                                <button type="submit" class="text-white hover:underline" title="Supprimer">
                                                <div class="p-1 hover:bg-red-600 bg-red-500 rounded-lg">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" /></svg>
                                                </div>
                                                </button>

                                            </form>


                                            <!--button modif-->
                                            <form wire:submit.prevent="loadData({{ $cour->id }})" class="inline-block">
                                                <button type="submit" class=" text-white hover:underline" title="Modifer">
                                                    <div class="p-1 hover:bg-green-600 bg-green-500 rounded-lg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" >
                                                        </svg>
                                                    </div>
                                                </button>
                                            </form>

                                            <!--button voir-->
                                            <form action="{{route('int_prof.cours.show',[$cour->id])}}"  class="inline-block" title="Chapitre">
                                                <button type="submit" class=" text-white hover:underline">
                                                    <div class="p-1 hover:bg-blue-600 bg-blue-500 rounded-lg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                                                        </svg>
                                                    </div>
                                                </button>
                                            </form>

                                            <!--button publier-->
                                            {{-- <form action="#"  class="inline-block" title="publier">
                                                <button type="submit" class=" text-white hover:underline">
                                                    <div class="p-1 hover:bg-purple-600 bg-purple-500 rounded-lg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
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
