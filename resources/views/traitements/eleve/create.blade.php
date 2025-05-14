@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4>Ajouter un nouvel élève</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('traitements.eleve.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" name="nom" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" name="prenom" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="classe" class="form-label">Classe</label>
                    <input type="text" name="classe" class="form-control" required>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('traitements.eleve.index') }}" class="btn btn-secondary">Annuler</a>
                    <button type="submit" class="btn btn-success">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
