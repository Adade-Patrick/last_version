@extends('layouts.app')

@section('title','connexion')

@section('content')




<section class="relative w-full h-screen bg-cover bg-center bg-no-repeat bg-fixed" style="background-image: url('/images/acceuil.jpg');">
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
                    <input type="text" name="name" placeholder="Nom d'utilisateur" required class="w-full px-4 py-3 rounded-lg bg-white/10 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 animate-pulse-slow">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!--password-->
                {{-- <div>
                    <input type="password" name="password" placeholder="Mot de passe" required  class="w-full px-4 py-3 rounded-lg bg-white/10 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 animate-pulse-slow">
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div> --}}
                <div class="relative">
                    <input id="password" type="password" name="password" placeholder="Mot de passe" required
                        class="w-full px-4 py-3 pr-10 rounded-lg bg-white/10 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 animate-pulse-slow">

                    <!-- Icône pour afficher/masquer -->
                    <button type="button" onclick="togglePasswordVisibility()"
                            class="absolute inset-y-0 right-3 flex items-center text-gray-300 hover:text-white focus:outline-none">
                        <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path id="eyePath" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>

                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <div class="flex items-start">
                    <a href="#" class="ms-auto text-sm text-red-600 hover:underline dark:text-red-500">Mot de passe oublié?</a>
                </div>
                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Se connecter</button>

            </form>
        </div>
    </div>
</section>


<script>
    function togglePasswordVisibility() {
        const input = document.getElementById("password");
        const icon = document.getElementById("eyeIcon");

        if (input.type === "password") {
            input.type = "text";
            icon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a10.05
                       10.05 0 011.272-2.592m1.746-2.121A9.956 9.956 0 0112 5c4.478
                       0 8.269 2.943 9.542 7a9.96 9.96 0 01-1.272 2.592M15 12a3
                       3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 3l18 18" />
            `;
        } else {
            input.type = "password";
            icon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268
                         2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477
                         0-8.268-2.943-9.542-7z" />
            `;
        }
    }
</script>

@endsection
