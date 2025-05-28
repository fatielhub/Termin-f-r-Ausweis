@extends('layouts.app')

@section('content')
@section('title', 'Première demande de CNIE - Informations des grands-parents')
<div class="d-flex justify-content-center">
    <div class="card shadow-lg p-4" style="max-width: 700px; width: 100%;">
        <div class="mb-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="h4 mb-0">Première demande de CNIE</h2>
                <span class="badge bg-success">Étape 3 sur 4</span>
            </div>
            <div class="progress" style="height: 6px;">
                <div class="progress-bar bg-success" style="width: 75%"></div>
            </div>
        </div>
        <form method="POST" action="{{ route('precommande.step3') }}">
            @csrf
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Nom du grand-père paternel</label>
                    <input type="text" name="nom_gp_paternel" class="form-control rounded-pill" required>
                </div>
                <div class="col">
                    <label class="form-label">Prénom du grand-père paternel</label>
                    <input type="text" name="prenom_gp_paternel" class="form-control rounded-pill" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Nom de la grand-mère paternelle</label>
                    <input type="text" name="nom_gm_paternel" class="form-control rounded-pill" required>
                </div>
                <div class="col">
                    <label class="form-label">Prénom de la grand-mère paternelle</label>
                    <input type="text" name="prenom_gm_paternel" class="form-control rounded-pill" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Nom du grand-père maternel</label>
                    <input type="text" name="nom_gp_maternel" class="form-control rounded-pill" required>
                </div>
                <div class="col">
                    <label class="form-label">Prénom du grand-père maternel</label>
                    <input type="text" name="prenom_gp_maternel" class="form-control rounded-pill" required>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col">
                    <label class="form-label">Nom de la grand-mère maternelle</label>
                    <input type="text" name="nom_gm_maternel" class="form-control rounded-pill" required>
                </div>
                <div class="col">
                    <label class="form-label">Prénom de la grand-mère maternelle</label>
                    <input type="text" name="prenom_gm_maternel" class="form-control rounded-pill" required>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{ route('precommande.step2') }}" class="btn btn-outline-secondary rounded-pill">Précédent</a>
                <button type="submit" class="btn btn-success rounded-pill px-4">Suivant</button>
            </div>
        </form>
    </div>
</div>
@endsection