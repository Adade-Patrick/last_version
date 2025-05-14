<body class="flex items-center justify-center min-h-screen bg-gray-100 p-6">
    @extends('layouts.app')

    @section('content')

    <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
        <a href="{{ route('enregistrement') }}">
            <button class="cursor-pointer transition-all bg-blue-600 text-white px-2 py-0 rounded-lg
            border-blue-600
            border-b-[2px] hover:brightness-110 hover:-translate-y-[1px] hover:border-b-[6px]
            active:border-b-[2px] active:brightness-90 active:translate-y-[2px]">
              Retour
            </button>
        </a>
        <!--message d'erreur-->
        @if($errors->any())
            <div class="bg-red-100 border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Erreur !</strong>
                <span class="block sm:inline">{{$errors->first()}}</span>
            </div>
        @endif

        <form class="space-y-6" method="POST" action="" >
            @csrf
            <h5 class="text-xl font-medium text-blue-600 dark:text-white">Informations supplémentaires</h5>
            <div>
                <label for="adresse" class="block mb-2 text-sm font-medium text-blue-600 dark:text-white">Adresse</label>
                <input type="text" name="adresse" id="adresse" value="{{old('adresse')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Veuillez entrer votre adresse"  />
                @error('adresse')
                <span class="text-red-500 text-sm">{{$message}}</span>
                @enderror
            </div>
            <div>
                <label for="telephone" class="block mb-2 text-sm font-medium text-blue-600 dark:text-white">Téléphone</label>
                <input type="text" name="telephone" id="telephone" value="{{old('telephone')}}" placeholder="Veuillez entrer votre numéro de téléphone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"  />
                @error('telephone')
                <span class="text-red-500 text-sm">{{$message}}</span>
                @enderror
            </div>

            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Valider</button>

        </form>
    </div>


    @endsection
</body>
