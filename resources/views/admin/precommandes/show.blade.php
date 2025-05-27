@extends('layouts.app')
@section('title', 'Détail précommande')
@section('content')
<div class="container" style="max-width:700px;">
    <h2 class="mb-4">Détail de la précommande</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="card mb-4 p-4">
        <div><strong>Nom :</strong> {{ $precommande->nom }} {{ $precommande->prenom }}</div>
        <div><strong>Date de naissance :</strong> {{ $precommande->date_naissance }}</div>
        <div><strong>Lieu de naissance :</strong> {{ $precommande->lieu_naissance }}</div>
        <div><strong>Email :</strong> {{ $precommande->email }}</div>
        <div><strong>Téléphone :</strong> {{ $precommande->telephone }}</div>
        <div><strong>Adresse :</strong> {{ $precommande->adresse }}</div>
        <div><strong>Centre :</strong> {{ optional($precommande->centre)->nom }}</div>
        <div><strong>Créneau :</strong> {{ optional($precommande->creneau)->date }} {{ optional($precommande->creneau)->heure_debut }}</div>
        <div><strong>Statut actuel :</strong> <span class="badge bg-secondary">{{ ucfirst($precommande->statut) }}</span></div>
    </div>
    <form method="POST" action="{{ route('admin.precommandes.update', $precommande) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Changer le statut</label>
            <select name="statut" class="form-select rounded-pill" required>
                <option value="en_attente" @if($precommande->statut=='en_attente') selected @endif>En attente</option>
                <option value="validee" @if($precommande->statut=='validee') selected @endif>Validée</option>
                <option value="rejetee" @if($precommande->statut=='rejetee') selected @endif>Rejetée</option>
                <option value="annulee" @if($precommande->statut=='annulee') selected @endif>Annulée</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success rounded-pill">Mettre à jour</button>
        <a href="{{ route('admin.precommandes.index') }}" class="btn btn-link">Retour à la liste</a>
    </form>
</div>
@endsection 