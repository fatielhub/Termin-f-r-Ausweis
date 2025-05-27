@extends('layouts.app')
@section('title', 'Première demande de CNIE - Informations personnelles')
@section('content')
<div class="d-flex justify-content-center">
    <div class="card shadow-lg p-4" style="max-width: 600px; width: 100%;">
        <div class="mb-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="h4 mb-0">Première demande de CNIE</h2>
                <span class="badge bg-success">Étape 1 sur 4</span>
            </div>
            <div class="progress" style="height: 6px;">
                <div class="progress-bar bg-success" style="width: 25%"></div>
            </div>
        </div>
        <form method="POST" action="{{ route('precommande.step1') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control rounded-pill" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Prénom</label>
                <input type="text" name="prenom" class="form-control rounded-pill" required>
            </div>
            <div class="mb-3 row">
                <div class="col">
                    <label class="form-label">Date de naissance</label>
                    <input type="date" name="date_naissance" class="form-control rounded-pill" required>
                </div>
                <div class="col">
                    <label class="form-label">Lieu de naissance</label>
                    <input type="text" name="lieu_naissance" class="form-control rounded-pill" required>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Ville</label>
                <input type="text" name="ville" class="form-control rounded-pill" required>
            </div>
            <div class="mb-3 row">
                <div class="col">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control rounded-pill" required>
                </div>
                <div class="col">
                    <label class="form-label">Téléphone</label>
                    <input type="text" name="telephone" class="form-control rounded-pill" required>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Adresse</label>
                <textarea name="adresse" class="form-control rounded-4" rows="2" required></textarea>
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary rounded-pill">Précédent</a>
                <button type="submit" class="btn btn-success rounded-pill px-4">Suivant</button>
            </div>
        </form>
    </div>
</div>
@endsection 