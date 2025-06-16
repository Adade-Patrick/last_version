@extends('layouts.app')

@section('content')


<div id="ModifyFormModal" class="fixed inset-0 flex items-center justify-center invisible bg-black bg-opacity-30 backdrop-blur-sm z-50">
    <div class="max-w-md w-full bg-white p-8 rounded-xl shadow-md">
        <h2 class="text-lg font-bold mb-4 text-center text-blue-600">
            {{ isset($cycle) ? 'Modifier le cycle' : 'Ajouter un cycle' }}
        </h2>
        <form id="anneeForm" action="{{ isset($cycle) ? route('cycle.update', $cycle->id) : route('cycle.store') }}" method="POST">
            @csrf
            @if(isset($cycle))
                @method('PUT')
            @endif
            <div class="mb-4">
                <label for="libelle" class="block text-sm font-medium text-gray-700">Libelle</label>
                <input type="text" id="libelle_C"  value="{{ $cycle->libelle_C }}" name="libelle_C" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required min="2000" max="2099">
            </div>
            <div class="flex justify-center space-x-4">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Enregistrer</button>
                <button type="button" id="closeModalBtn" class="bg-red-600 text-white px-4 py-2 rounded">Annuler</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('openModalBtn').addEventListener('click', function() {
        document.getElementById('ModifyFormModal').classList.remove('invisible');
    });

    document.getElementById('closeModalBtn').addEventListener('click', function() {
        document.getElementById('ModifyFormModal').classList.add('invisible');
    });
</script>

@endsection
