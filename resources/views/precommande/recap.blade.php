@extends('layouts.app')
@section('title', 'Récapitulatif — CNI Rendez-vous')

@section('content')
<div class="container-narrow py-12">

    {{-- Page Header --}}
    <div class="text-center mb-10">
        <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-400 flex items-center justify-center mx-auto mb-4 shadow-lg shadow-emerald-200">
            <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
            </svg>
        </div>
        <h1 class="text-2xl font-extrabold text-gray-900 mb-2">Récapitulatif de votre demande</h1>
        <p class="text-gray-500">Vérifiez vos informations avant de valider.</p>
    </div>

    {{-- Summary Sections --}}
    <div class="space-y-5 mb-8">

        {{-- Personal Info --}}
        <div class="card">
            <div class="card-header flex items-center gap-2">
                <svg class="w-5 h-5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                Informations personnelles
            </div>
            <div class="card-body">
                <dl class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                    @foreach([
                        ['Nom complet', ($data['nom'] ?? '-') . ' ' . ($data['prenom'] ?? '')],
                        ['Date de naissance', $data['date_naissance'] ?? '-'],
                        ['Lieu de naissance', $data['lieu_naissance'] ?? '-'],
                        ['Ville', $data['ville'] ?? '-'],
                        ['Email', $data['email'] ?? '-'],
                        ['Téléphone', $data['telephone'] ?? '-'],
                    ] as [$label, $value])
                    <div>
                        <dt class="text-xs font-semibold uppercase tracking-wide text-gray-400 mb-0.5">{{ $label }}</dt>
                        <dd class="text-gray-900 font-medium">{{ $value }}</dd>
                    </div>
                    @endforeach
                    <div class="md:col-span-2">
                        <dt class="text-xs font-semibold uppercase tracking-wide text-gray-400 mb-0.5">Adresse</dt>
                        <dd class="text-gray-900 font-medium">{{ $data['adresse'] ?? '-' }}</dd>
                    </div>
                </dl>
            </div>
        </div>

        {{-- Parents --}}
        <div class="card">
            <div class="card-header flex items-center gap-2">
                <svg class="w-5 h-5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0"/></svg>
                Informations des parents
            </div>
            <div class="card-body">
                <dl class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                    <div>
                        <dt class="text-xs font-semibold uppercase tracking-wide text-gray-400 mb-0.5">Père</dt>
                        <dd class="text-gray-900 font-medium">{{ ($data['nom_pere'] ?? '-') . ' ' . ($data['prenom_pere'] ?? '') }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-semibold uppercase tracking-wide text-gray-400 mb-0.5">Mère</dt>
                        <dd class="text-gray-900 font-medium">{{ ($data['nom_mere'] ?? '-') . ' ' . ($data['prenom_mere'] ?? '') }}</dd>
                    </div>
                </dl>
            </div>
        </div>

        {{-- Grandparents --}}
        <div class="card">
            <div class="card-header flex items-center gap-2">
                <svg class="w-5 h-5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                Informations des grands-parents
            </div>
            <div class="card-body">
                <dl class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                    <div>
                        <dt class="text-xs font-semibold uppercase tracking-wide text-gray-400 mb-0.5">Grand-père paternel</dt>
                        <dd class="text-gray-900 font-medium">{{ ($data['nom_gp_paternel'] ?? '-') . ' ' . ($data['prenom_gp_paternel'] ?? '') }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-semibold uppercase tracking-wide text-gray-400 mb-0.5">Grand-mère paternelle</dt>
                        <dd class="text-gray-900 font-medium">{{ ($data['nom_gm_paternel'] ?? '-') . ' ' . ($data['prenom_gm_paternel'] ?? '') }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-semibold uppercase tracking-wide text-gray-400 mb-0.5">Grand-père maternel</dt>
                        <dd class="text-gray-900 font-medium">{{ ($data['nom_gp_maternel'] ?? '-') . ' ' . ($data['prenom_gp_maternel'] ?? '') }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-semibold uppercase tracking-wide text-gray-400 mb-0.5">Grand-mère maternelle</dt>
                        <dd class="text-gray-900 font-medium">{{ ($data['nom_gm_maternel'] ?? '-') . ' ' . ($data['prenom_gm_maternel'] ?? '') }}</dd>
                    </div>
                </dl>
            </div>
        </div>

        {{-- Appointment --}}
        <div class="card">
            <div class="card-header flex items-center gap-2">
                <svg class="w-5 h-5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 4h10M5 11h14M5 19h14M5 15h14"/></svg>
                Rendez-vous sélectionné
            </div>
            <div class="card-body">
                @php
                    $centre = isset($data['centre_id']) ? App\Models\Centre::find($data['centre_id']) : null;
                    $creneau = isset($data['creneau_id']) ? App\Models\Creneau::find($data['creneau_id']) : null;
                @endphp
                <dl class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                    <div>
                        <dt class="text-xs font-semibold uppercase tracking-wide text-gray-400 mb-0.5">Centre</dt>
                        <dd class="text-gray-900 font-medium">{{ $centre ? $centre->nom . ' — ' . $centre->ville : '-' }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-semibold uppercase tracking-wide text-gray-400 mb-0.5">Date</dt>
                        <dd class="text-gray-900 font-medium">{{ $data['date_rendezvous'] ?? '-' }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-semibold uppercase tracking-wide text-gray-400 mb-0.5">Créneau</dt>
                        <dd class="text-gray-900 font-medium">
                            {{ $creneau ? \Carbon\Carbon::parse($creneau->heure_debut)->format('H:i') . ' — ' . \Carbon\Carbon::parse($creneau->heure_fin)->format('H:i') : '-' }}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>

    {{-- Action buttons --}}
    <div class="card">
        <div class="card-body">
            <p class="text-sm text-gray-600 mb-5 text-center">
                En soumettant cette demande, vous confirmez l'exactitude de toutes les informations fournies.
            </p>
            <form method="POST" action="{{ route('precommande.recap') }}">
                @csrf
                <div class="flex items-center justify-between">
                    <a href="{{ route('precommande.step4') }}" class="btn btn-ghost">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"/></svg>
                        Précédent
                    </a>
                    <button type="submit" class="btn btn-primary btn-lg">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                        Envoyer la demande
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
