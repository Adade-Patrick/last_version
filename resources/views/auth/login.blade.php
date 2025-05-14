@extends('layouts.app')

@section('title','connexion')

@section('content')




<section class="relative w-full h-screen bg-cover bg-center bg-no-repeat bg-fixed" style="background-image: url('https://flowbite.s3.amazonaws.com/docs/jumbotron/conference.jpg');">
    <div class="absolute inset-0 bg-black bg-opacity-60 backdrop-blur-sm"></div>

    <div class="relative z-10 flex flex-col justify-center items-center  h-full">
        <div class=" max-w-sm w-full bg-gradient-to-br from-white/10 to-white/5 backdrop-blur-md border border-white/20 rounded-3xl px-10 py-5 text-center shadow-2xl animate-fade-in-up">

            <form class="space-y-6" action="{{ route('auth.login') }}" method="POST">
                @csrf
                <h1 class="text-3xl font-extrabold text-white text-center mb-8 animate-text-glow">Connectez-vous</h1>

                @if($errors->any())
                    <div class="bg-red-100 border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Erreur !</strong>
                        <span class="block sm:inline">{{$errors->first()}}</span>
                    </div>
                @endif
                <div>
                    <input type="email" name="email" placeholder="email" required class="w-full px-4 py-3 rounded-lg bg-white/10 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 animate-pulse-slow">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <input type="password" name="password" placeholder="password" required  class="w-full px-4 py-3 rounded-lg bg-white/10 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 animate-pulse-slow">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-start">
                    <a href="#" class="ms-auto text-sm text-red-600 hover:underline dark:text-red-500">Mot de passe oublié?</a>
                </div>
                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Se connecter</button>
                {{-- <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                    Pas de compte? <a href="" class="text-blue-700 hover:underline dark:text-blue-500">Créer un compte</a>
                </div> --}}
            </form>
        </div>
    </div>
</section>

@endsection
