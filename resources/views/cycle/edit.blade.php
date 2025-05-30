@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4">
    <div class="max-w-md w-full bg-white p-8 rounded-xl shadow-md">
        <h2 class="text-center text-2xl font-bold text-gray-800 mb-6">Modifier le Cycle</h2>

        <form method="POST" action="{{ route('cycle.update', $cycle->cycle_id) }}" class="space-y-4">
            @csrf
            @method('PUT')

            <input type="text" name="libelle_C" value="{{ $cycle->libelle_C }}"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                   required>

            <button type="submit"
                    class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition">
                Mettre à jour
            </button>
        </form>
    </div>
</div>
@endsection
