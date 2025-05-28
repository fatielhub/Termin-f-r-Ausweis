@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center">
    <div class="card shadow-lg p-4" style="max-width: 750px; width: 100%;">
        <h2 class="h4 mb-4 text-center text-success"><i class="bi bi-file-earmark-text"></i> Récapitulatif de la demande</h2>

        {{-- Informations personnelles --}}
        <div class="mb-4 border rounded p-3 bg-success bg-opacity-10">
            <h5 class="mb-3 text-success"><i class="bi bi-person-lines-fill"></i> Informations personnelles</h5>
            <div><strong>Nom :</strong> {{ $data['nom'] ?? '-' }}</div>
            <div><strong>Prénom :</strong> {{ $data['prenom'] ?? '-' }}</div>
            <div><strong>Date de naissance :</strong> {{ $data['date_naissance'] ?? '-' }}</div>
            <div><strong>Lieu de naissance :</strong> {{ $data['lieu_naissance'] ?? '-' }}</div>
            <div><strong>Email :</strong> {{ $data['email'] ?? '-' }}</div>
            <div><strong>Téléphone :</strong> {{ $data['telephone'] ?? '-' }}</div>
            <div><strong>Adresse :</strong> {{ $data['adresse'] ?? '-' }}</div>
        </div>

        {{-- Informations des parents --}}
        <div class="mb-4 border rounded p-3 bg-success bg-opacity-10">
            <h5 class="mb-3 text-success"><i class="bi bi-people-fill"></i> Informations des parents</h5>
            <div><strong>Père :</strong> {{ $data['nom_pere'] ?? '-' }} {{ $data['prenom_pere'] ?? '' }}</div>
            <div><strong>Mère :</strong> {{ $data['nom_mere'] ?? '-' }} {{ $data['prenom_mere'] ?? '' }}</div>
        </div>

        {{-- Informations des grands-parents --}}
        <div class="mb-4 border rounded p-3 bg-success bg-opacity-10">
            <h5 class="mb-3 text-success"><i class="bi bi-person-vcard-fill"></i> Informations des grands-parents</h5>
            <div><strong>Grand-père paternel :</strong> {{ $data['nom_gp_paternel'] ?? '-' }} {{ $data['prenom_gp_paternel'] ?? '' }}</div>
            <div><strong>Grand-mère paternelle :</strong> {{ $data['nom_gm_paternel'] ?? '-' }} {{ $data['prenom_gm_paternel'] ?? '' }}</div>
            <div><strong>Grand-père maternel :</strong> {{ $data['nom_gp_maternel'] ?? '-' }} {{ $data['prenom_gp_maternel'] ?? '' }}</div>
            <div><strong>Grand-mère maternelle :</strong> {{ $data['nom_gm_maternel'] ?? '-' }} {{ $data['prenom_gm_maternel'] ?? '' }}</div>
        </div>

        {{-- Rendez-vous --}}
        <div class="mb-4 border rounded p-3 bg-success bg-opacity-10">
            <h5 class="mb-3 text-success"><i class="bi bi-calendar-check-fill"></i> Rendez-vous</h5>
            <div><strong>Centre :</strong>
                @php
                    $centre = isset($data['centre_id']) ? App\Models\Centre::find($data['centre_id']) : null;
                @endphp
                {{ $centre ? $centre->nom . ' - ' . $centre->ville : '-' }}
            </div>
            <div><strong>Créneau :</strong>
                @php
                    $creneau = isset($data['creneau_id']) ? App\Models\Creneau::find($data['creneau_id']) : null;
                @endphp
                {{ $creneau ? $creneau->date . ' de ' . $creneau->heure_debut . ' à ' . $creneau->heure_fin : '-' }}
            </div>
        </div>

        {{-- Buttons --}}
        <form method="POST" action="{{ route('precommande.recap') }}">
            @csrf
            <div class="d-flex justify-content-between">
                <a href="{{ route('precommande.step4') }}" class="btn btn-outline-success rounded-pill">
                    <i class="bi bi-arrow-left"></i> Précédent
                </a>
                <button type="submit" class="btn btn-success rounded-pill px-4">
                    <i class="bi bi-send-check-fill"></i> Envoyer la demande
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
