@extends('layouts.app')
@section('title', 'Détail précommande — Administration CNI')

@section('content')

{{-- Admin top bar --}}
<div class="bg-gradient-to-r from-emerald-800 to-emerald-700 text-white">
    <div class="container-main py-6 flex items-center justify-between">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.precommandes.index') }}" class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center hover:bg-white/30 transition-colors" title="Retour à la liste">
                <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"/></svg>
            </a>
            <div>
                <h1 class="text-xl font-extrabold">Détail de la demande</h1>
                <p class="text-emerald-200 text-sm font-mono">{{ $precommande->code_suivi }}</p>
            </div>
        </div>
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn border-2 border-white/30 text-white hover:bg-white/10">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                Déconnexion
            </button>
        </form>
    </div>
</div>

<div class="container-narrow py-10">

    {{-- Flash --}}
    @if(session('success'))
        <div class="alert-success mb-6 animate-fade-in-up">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    {{-- Current status badge --}}
    @php
        $badgeClass = match($precommande->statut) {
            'validee'    => 'badge-success',
            'rejetee'    => 'badge-danger',
            'annulee'    => 'badge-gray',
            default      => 'badge-warning',
        };
        $badgeLabel = match($precommande->statut) {
            'validee'    => 'Validée',
            'rejetee'    => 'Rejetée',
            'annulee'    => 'Annulée',
            default      => 'En attente',
        };
    @endphp

    {{-- Personal Info --}}
    <div class="card mb-5">
        <div class="card-header flex items-center justify-between">
            <span class="flex items-center gap-2">
                <svg class="w-5 h-5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                Informations personnelles
            </span>
            <span class="{{ $badgeClass }}">{{ $badgeLabel }}</span>
        </div>
        <div class="card-body">
            <dl class="grid grid-cols-1 md:grid-cols-2 gap-5 text-sm">
                <div>
                    <dt class="text-xs font-semibold uppercase tracking-wide text-gray-400 mb-0.5">Nom complet</dt>
                    <dd class="font-semibold text-gray-900">{{ $precommande->nom }} {{ $precommande->prenom }}</dd>
                </div>
                <div>
                    <dt class="text-xs font-semibold uppercase tracking-wide text-gray-400 mb-0.5">Date de naissance</dt>
                    <dd class="text-gray-800">{{ $precommande->date_naissance }}</dd>
                </div>
                <div>
                    <dt class="text-xs font-semibold uppercase tracking-wide text-gray-400 mb-0.5">Lieu de naissance</dt>
                    <dd class="text-gray-800">{{ $precommande->lieu_naissance }}</dd>
                </div>
                <div>
                    <dt class="text-xs font-semibold uppercase tracking-wide text-gray-400 mb-0.5">Email</dt>
                    <dd class="text-gray-800">{{ $precommande->email }}</dd>
                </div>
                <div>
                    <dt class="text-xs font-semibold uppercase tracking-wide text-gray-400 mb-0.5">Téléphone</dt>
                    <dd class="text-gray-800">{{ $precommande->telephone }}</dd>
                </div>
                <div>
                    <dt class="text-xs font-semibold uppercase tracking-wide text-gray-400 mb-0.5">Adresse</dt>
                    <dd class="text-gray-800">{{ $precommande->adresse }}</dd>
                </div>
            </dl>
        </div>
    </div>

    {{-- Appointment Info --}}
    <div class="card mb-5">
        <div class="card-header flex items-center gap-2">
            <svg class="w-5 h-5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 4h10M5 11h14M5 19h14M5 15h14"/></svg>
            Rendez-vous
        </div>
        <div class="card-body">
            <dl class="grid grid-cols-1 md:grid-cols-2 gap-5 text-sm">
                <div>
                    <dt class="text-xs font-semibold uppercase tracking-wide text-gray-400 mb-0.5">Centre</dt>
                    <dd class="font-medium text-gray-900">{{ optional($precommande->centre)->nom ?? '—' }}</dd>
                </div>
                <div>
                    <dt class="text-xs font-semibold uppercase tracking-wide text-gray-400 mb-0.5">Date RDV</dt>
                    <dd class="text-gray-800">{{ optional($precommande->creneau)->date ?? '—' }}</dd>
                </div>
                <div>
                    <dt class="text-xs font-semibold uppercase tracking-wide text-gray-400 mb-0.5">Heure</dt>
                    <dd class="text-gray-800">{{ optional($precommande->creneau)->heure_debut ?? '—' }}</dd>
                </div>
            </dl>
        </div>
    </div>

    {{-- Update Status --}}
    <div class="card">
        <div class="card-header flex items-center gap-2">
            <svg class="w-5 h-5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
            Mettre à jour le statut
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.precommandes.update', $precommande) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="form-label" for="statut">Nouveau statut</label>
                    <select id="statut" name="statut" class="form-select" required>
                        @foreach(['en_attente' => 'En attente', 'validee' => 'Validée', 'rejetee' => 'Rejetée', 'annulee' => 'Annulée'] as $value => $label)
                            <option value="{{ $value }}" {{ $precommande->statut === $value ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex items-center gap-3">
                    <button type="submit" class="btn btn-primary">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        Mettre à jour
                    </button>
                    <a href="{{ route('admin.precommandes.index') }}" class="btn btn-ghost">
                        Retour à la liste
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection