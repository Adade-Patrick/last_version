@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm rounded-3">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Détails de l'élève</h4>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label"><strong>Nom :</strong></label>
                <div class="form-control">{{ $eleve->nom }}</div>
            </div>

            <div class="mb-3">
                <label class="form-label"><strong>Prénom :</strong></label>
                <div class="form-control">{{ $eleve->prenom }}</div>
            </div>

            <div class="mb-3">
                <label class="form-label"><strong>Classe :</strong></label>
                <div class="form-control">{{ $eleve->classe }}</div>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('traitements.eleve.index') }}" class="btn btn-secondary">Retour</a>
                <a href="{{ route('traitements.eleve.edit', $eleve->id) }}" class="btn btn-warning">Modifier</a>
            </div>
        </div>
    </div>
</div>
@endsection
