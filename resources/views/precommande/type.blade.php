@extends('layouts.app')

@section('title', 'Type de demande')

@section('content')
<div class="d-flex justify-content-center my-5">
    <div class="card shadow-lg p-4 border-0" style="max-width: 600px; width: 100%; border-radius: 20px;">
        <h2 class="h4 mb-4 text-center text-success fw-bold">Choisissez le type de demande</h2>

        <form method="GET" action="{{ route('precommande.step1') }}">
            <div class="row mb-4">
                <!-- Première demande -->
                <div class="col-md-6 mb-3 mb-md-0">
                    <button type="submit" name="type_demande" value="nouvelle"
                        class="btn btn-light border border-success shadow-sm w-100 py-4 rounded-4 text-start position-relative hover-shadow">
                        <div class="position-absolute top-0 end-0 m-3 text-success fs-4">
                            <i class="bi bi-person-plus"></i>
                        </div>
                        <div class="fw-bold text-success mb-1">Première Demande</div>
                        <div class="small text-muted">Demande initiale de la CNIE</div>
                    </button>
                </div>

                <!-- Renouvellement -->
                <div class="col-md-6">
                    <button type="submit" name="type_demande" value="renouvellement"
                        class="btn btn-light border border-success shadow-sm w-100 py-4 rounded-4 text-start position-relative hover-shadow">
                        <div class="position-absolute top-0 end-0 m-3 text-success fs-4">
                            <i class="bi bi-arrow-repeat"></i>
                        </div>
                        <div class="fw-bold text-success mb-1">Renouvellement</div>
                        <div class="small text-muted">Renouvellement de la CNIE</div>
                    </button>
                </div>
            </div>

            <div class="form-check mb-3 text-center">
                <input class="form-check-input" type="checkbox" id="cgu" required>
                <label class="form-check-label" for="cgu">
                    J'accepte les <a href="#" class="text-success text-decoration-underline">conditions d'utilisation</a> et la
                    <a href="#" class="text-success text-decoration-underline">politique de confidentialité</a>
                    <span class="text-danger">*</span>
                </label>
            </div>
        </form>
    </div>
</div>
@endsection

