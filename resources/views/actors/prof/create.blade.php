@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Ajouter un nouveau professeur</h3>

    <form action="{{ route('actors.prof.store') }}" method="POST">
        @csrf

        @include('actors.prof._form', [
            'buttonText' => 'Créer',
            'classes' => $classes,
            'cycles' => $cycles,
            'annees' => $annees,
            'prof' => null
        ])

    </form>
</div>
@endsection
            