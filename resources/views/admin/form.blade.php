<body class="flex items-center justify-center min-h-screen bg-gray-100 p-6">
    @extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto mt-10 bg-white p-6 rounded-lg shadow-md py-10">
    <h2 class="text-2xl font-semibold text-center mb-4">Veuillez ajouter des informations supplémentaires</h2>

    @if ($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-600 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.form.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="adresse" class="block text-gray-700 font-medium mb-2">Adresse</label>
            <input type="text" id="adressse" name="adresse" value="telephone" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label for="telephone" class="block text-gray-700 font-medium mb-2">Téléphone </label>
            <input type="text" id="telephone" name="telephone" value="telephone" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="mb-4">
            <label for="specialite" class="block text-gray-700 font-medium mb-2">spécilaité </label>
            <input type="text" id="specialite" name="specialite" value="specialite" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Bouton de soumission -->
        <button type="submit"
            class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">
            Enregistrer
        </button>
    </form>
</div>
@endsection

</body>
