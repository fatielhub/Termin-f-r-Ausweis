@extends('layouts.app')
@section('title', 'Suivre ma demande')
@section('content')
<div class="d-flex justify-content-center">
    <div class="card shadow-lg p-4" style="max-width: 500px; width: 100%;">
        <h2 class="h4 mb-4 text-center">Suivre ma demande</h2>
        <form method="GET" action="{{ route('precommande.suivi') }}">
            <div class="mb-3">
                <label class="form-label">Entrez votre code de suivi</label>
                <input type="text" name="code_suivi" class="form-control rounded-pill" placeholder="Votre code de suivi" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-success rounded-pill">Rechercher</button>
            </div>
        </form>
        @if(request('code_suivi'))
            <hr>
            @if($precommande)
                <div class="alert alert-success">
                    <strong>Statut :</strong> {{ ucfirst($precommande->statut) }}<br>
                    <strong>Nom :</strong> {{ $precommande->nom }}<br>
                    <strong>Centre :</strong> {{ $precommande->centre->nom ?? '-' }}<br>
                    <strong>Date RDV :</strong> {{ $precommande->creneau->date ?? '-' }}<br>
                    <strong>Heure :</strong> {{ $precommande->creneau->heure_debut ?? '-' }}
                </div>
            @else
                <div class="alert alert-danger">
                    Aucun dossier trouvé pour ce code de suivi.
                </div>
            @endif
        @endif
    </div>
</div>
@endsection 