@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-white">
            <h4>Modifier l'élève</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('eleve.update', $eleve->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" name="nom" class="form-control" value="{{ $eleve->nom }}" required>
                </div>
                <div class="mb-3">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" name="prenom" class="form-control" value="{{ $eleve->prenom }}" required>
                </div>
                <div class="mb-3">
                    <label for="classe" class="form-label">Classe</label>
                    <input type="text" name="classe" class="form-control" value="{{ $eleve->classe }}" required>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('eleve.show', $eleve->id) }}" class="btn btn-secondary">Annuler</a>
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
