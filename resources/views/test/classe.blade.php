@extends('layouts.app')

@section('content')

@include('partials.navbar')
@include('partials.sidebar')

<div class="p-3 sm:ml-64  bg-no-repeat bg-cover bg-white bg-blend-multiply">
    <main class="mt-14 mb-0 ">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="test" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
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
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Classe</span>
                    </div>
                </li>
            </ol>
        </nav>
    </main>
</div>
    
<div class="p-10 sm:ml-64 bg-no-repeat bg-cover bg-white bg-blend-multiply">
    <div class="mt-0">
        <h3 class="mb-2 text-3xl text-center font-bold tracking-tight text-blue-600 dark:text-white">Liste des classes</h3>

        <div class="m-0 flex justify-end px-20">
            <button id="openModalBtn" class="group cursor-pointer outline-none hover:rotate-90 duration-300" title="Ajouter une classe">
                <svg class="stroke-blue-600 fill-none group-hover:fill-blue-400 group-active:stroke-blue-300 group-active:fill-blue-600 group-active:duration-0 duration-300" viewBox="0 0 24 24" height="50px" width="50px" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-width="1.5" d="M12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22Z"></path>
                    <path stroke-width="1.5" d="M8 12H16"></path>
                    <path stroke-width="1.5" d="M12 16V8"></path>
                </svg>
            </button>
        </div>

        <div class="flex justify-center overflow-x-auto">
            <div class="relative shadow-md sm:rounded-lg w-full md:w-3/4">
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
                <!--Tableau-->
                <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-black uppercase bg-blue-500 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">Id</th>
                                <th scope="col" class="px-6 py-3">Libelle</th>
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                        @if($classes->isEmpty())
                        <tr>
                            <td colspan="3">Aucune classe trouvée</td>
                        </tr>
                        @else
                        @foreach($classes as $classe)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                        <td class="px-6 py-4">{{ $classe->id }}</td>
                        <td class="px-6 py-4">{{ $classe->libelle }}</td>
                        <td class="px-6 py-4">
                            <form action="{{ route('classes.destroy', $classe->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')

                                <!-- Bouton pour ouvrir le modal -->
                                <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline" onclick="openModal()">Supprimer</button>

                                <!-- Modal -->
                                <div id="deleteModal" class="fixed inset-0 flex items-center justify-center invisible">
                                    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                                        <h2 class="text-lg font-semibold mb-4">Confirmation</h2>
                                        <p>Êtes-vous sûr de vouloir supprimer cette Classe ?</p>
                                        <div class="flex justify-end mt-4">
                                            <button class="px-4 py-2 bg-gray-300 rounded mr-2" onclick="closeModal()">Annuler</button>
                                            <button id="confirmDelete" class="px-4 py-2 bg-red-600 text-white rounded">Supprimer</button>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    function openModal() {
                                        document.getElementById('deleteModal').classList.remove('invisible');
                                    }

                                    function closeModal() {
                                        document.getElementById('deleteModal').classList.add('invisible');
                                    }

                                    document.getElementById('confirmDelete').addEventListener('click', function() {
                                        if (confirm('Confirmez-vous la suppression ?')) {
                                            alert('Classe supprimer !');
                                            closeModal();
                                        }
                                    });

                                    document.getElementById('cancelButton').addEventListener('click', function() {
                                        closeModal();
                                    });
                                </script>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                        </tbody>
                </table>
            </div>
        </div>

        <!-- Formulaire modal -->
        <div id="formModal" class="fixed inset-0 flex items-center justify-center invisible">
            <div class="bg-white p-5 rounded shadow-lg w-96">
                <h2 class="text-lg font-bold mb-4 text-center">Ajouter une Classe</h2>
                <form id="classForm" action="{{ route('classes.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="libelle" class="block text-sm font-medium text-gray-700">Libelle</label>
                        <input type="text" id="libelle" name="libelle" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required min="2000" max="2099">
                    </div>

                    <div class="flex justify-center space-x-4">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Enregistrer</button>
                        <button type="button" id="closeModalBtn" class="bg-red-600 text-white px-4 py-2 rounded">Annuler</button>
                    </div>
                </form>

                  <!--active l'évenement-->
                <script>
                    document.getElementById('openModalBtn').addEventListener('click', function() {
                        document.getElementById('formModal').classList.remove('invisible');
                    });

                    document.getElementById('closeModalBtn').addEventListener('click', function() {
                        document.getElementById('formModal').classList.add('invisible');
                    });
                </script>
            </div>
        </div>
    </div>
</div>
@endsection







