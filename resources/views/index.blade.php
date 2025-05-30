@extends("layouts.app")
@section("title", "accueil")

@section('content')

<section class="relative w-full h-screen bg-cover bg-center bg-no-repeat bg-fixed"
         style="background-image: url('/images/acceuil.jpg');">
    <div class="absolute inset-0 bg-black bg-opacity-60 backdrop-blur-sm"></div>

    <div class="relative z-10 flex flex-col justify-center items-center h-full">
        <div class="bg-gradient-to-br from-white/10 to-white/5 backdrop-blur-md border border-white/20 rounded-3xl p-10 max-w-2xl text-center shadow-2xl animate-fade-in-up">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-6 animate-text-glow">
                Bienvenue sur notre Plateforme
            </h1>

            <div class="flex flex-col sm:flex-row gap-6 justify-center mt-8">
                <a href="{{ route('auth.form.login') }}" class="px-6 py-3 rounded-lg text-lg font-bold text-white bg-gradient-to-r from-blue-600 to-indigo-600 hover:scale-105 transition-transform duration-300 animate-pulse-slow">
                    Se connecter
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
