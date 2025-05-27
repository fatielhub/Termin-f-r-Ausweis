@extends('layouts.app')
@section('title', 'Type de demande')
@section('content')
<div class="d-flex justify-content-center">
    <div class="card shadow-lg p-4" style="max-width: 600px; width: 100%;">
        <h2 class="h4 mb-4 text-center">Type de demande</h2>
        <form method="GET" action="{{ route('precommande.step1') }}">
            <div class="row mb-4">
                <div class="col-6">
                    <button type="submit" name="type_demande" value="nouvelle" class="btn btn-outline-success w-100 py-4 rounded-4">
                        <div class="mb-2 fs-1">🆕</div>
                        <div class="fw-bold">Première demande de CNIE</div>
                        <div class="small text-muted">Demande initiale de la Carte Nationale d'Identité Électronique</div>
                    </button>
                </div>
                <div class="col-6">
                    <button type="submit" name="type_demande" value="renouvellement" class="btn btn-outline-success w-100 py-4 rounded-4">
                        <div class="mb-2 fs-1">🔄</div>
                        <div class="fw-bold">Renouvellement de CNIE</div>
                        <div class="small text-muted">Renouvellement de la Carte Nationale d'Identité Électronique</div>
                    </button>
                </div>
            </div>
            <div class="form-check mb-3 text-center">
                <input class="form-check-input" type="checkbox" id="cgu" required>
                <label class="form-check-label" for="cgu">
                    J'accepte les conditions d'utilisation et la politique de confidentialité <span class="text-success">*</span>
                </label>
            </div>
        </form>
    </div>
</div>
@endsection 