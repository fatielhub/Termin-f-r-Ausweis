@extends('layouts.app')
@section('title', 'Demande envoyée')
@section('content')
<div class="d-flex justify-content-center">
    <div class="card shadow-lg p-4 text-center" style="max-width: 500px; width: 100%;">
        <h2 class="h4 mb-4 text-success">Votre demande a été envoyée !</h2>
        <div class="alert alert-success">
            <strong>Votre code de suivi :</strong><br>
            <span class="fs-4 text-danger">{{ $code_suivi }}</span>
        </div>
        <p>Conservez ce code pour suivre l'état de votre demande.</p>
        <a href="/suivi" class="btn btn-outline-danger rounded-pill">Suivre ma demande</a>
        <a href="/" class="btn btn-link mt-3">Retour à l'accueil</a>
    </div>
</div>
@endsection 