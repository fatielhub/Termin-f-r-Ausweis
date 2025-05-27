@extends('layouts.app')
@section('title', 'Première demande de CNIE - Informations des parents')
@section('content')
<div class="d-flex justify-content-center">
    <div class="card shadow-lg p-4" style="max-width: 600px; width: 100%;">
        <div class="mb-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="h4 mb-0">Première demande de CNIE</h2>
                <span class="badge bg-success">Étape 2 sur 4</span>
            </div>
            <div class="progress" style="height: 6px;">
                <div class="progress-bar bg-success" style="width: 50%"></div>
            </div>
        </div>
        <form method="POST" action="{{ route('precommande.step2') }}">
            @csrf
            <div class="mb-3 row">
                <div class="col">
                    <label class="form-label">Nom du père</label>
                    <input type="text" name="nom_pere" class="form-control rounded-pill" required>
                </div>
                <div class="col">
                    <label class="form-label">Prénom du père</label>
                    <input type="text" name="prenom_pere" class="form-control rounded-pill" required>
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col">
                    <label class="form-label">Nom de la mère</label>
                    <input type="text" name="nom_mere" class="form-control rounded-pill" required>
                </div>
                <div class="col">
                    <label class="form-label">Prénom de la mère</label>
                    <input type="text" name="prenom_mere" class="form-control rounded-pill" required>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{ route('precommande.step1') }}" class="btn btn-outline-secondary rounded-pill">Précédent</a>
                <button type="submit" class="btn btn-success rounded-pill px-4">Suivant</button>
            </div>
        </form>
    </div>
</div>
@endsection 