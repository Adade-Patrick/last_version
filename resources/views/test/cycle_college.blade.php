@extends('layouts.app')

@section('content')

@include('partials.navbar')
@include('partials.sidebar')


<div class="p-2 sm:ml-64  bg-no-repeat bg-cover bg-white bg-blend-multiply">
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

                <li>
                    <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Cycle</a>
                    </div>
                </li>


                <li aria-current="page">
                    <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Collège</span>
                    </div>
                </li>
            </ol>
        </nav>
    </main>
</div>

<div class="p-4 sm:ml-64  bg-no-repeat bg-cover  bg-with bg-blend-multiply">
    <main class="mt-0 mb-10">

        <section class="">

            <div class="px-4 mx-auto max-w-screen-xl text-center py-8 lg:py-10">
                <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-blue-600 md:text-5xl lg:text-6xl">Bienvenue au Collège</h1>
            </div>

            <button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-5 ">Modifier</button>

            <button type="button" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-5">Enregistrer</button>

            <button type="button" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-5">Supprimer</button>



            <div class="grid grid-cols-4 md:grid-cols-4 gap-5  ">
                <a href="{{ route('table_list_6eme')}}">
                    <img class="h-60 max-w-sm w-full" src="{{ asset('images/cycle_college/6eme.jpg') }}" alt="">
                </a>


                <a href="{{ route('table_list_5eme')}}">
                    <img class="h-60 max-w-sm w-full" src="{{ asset('images/cycle_college/5eme.jpg') }}" alt="">
                </a>


                <a href="{{ route('table_list_4eme')}}">
                    <img class="h-60 max-w-sm w-full" src="{{ asset('images/cycle_college/4eme.jpg') }}" alt="">
                </a>


                <a href="{{ route('table_list_3eme')}}">
                    <img class="h-60 max-w-sm w-full" src="{{ asset('images/cycle_college/3eme.jpg') }}" alt="">
                </a>


            </div>



        </section>
    </main>

</div>



@endsection

