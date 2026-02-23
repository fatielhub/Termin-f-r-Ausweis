@extends('layouts.app')
@section('title', 'Suivi de demande — CNI Rendez-vous')

@section('content')
<div class="container-narrow py-12">

    {{-- Header --}}
    <div class="text-center mb-10">
        <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-400 flex items-center justify-center mx-auto mb-4 shadow-lg shadow-emerald-200">
            <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
        </div>
        <h1 class="text-2xl font-extrabold text-gray-900 mb-2">Suivre ma demande</h1>
        <p class="text-gray-500">Entrez votre code de suivi pour consulter l'état de votre dossier.</p>
    </div>

    {{-- Search Form --}}
    <div class="card mb-6">
        <div class="card-body">
            <form method="GET" action="{{ route('precommande.suivi') }}">
                <div class="form-group">
                    <label class="form-label" for="code_suivi">Code de suivi</label>
                    <div class="input-icon-wrapper">
                        <svg class="input-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/></svg>
                        <input type="text" id="code_suivi" name="code_suivi"
                               class="form-input pl-11"
                               placeholder="Ex: CNI-XXXXXXXX"
                               value="{{ request('code_suivi') }}"
                               required autocomplete="off">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-full">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    Rechercher
                </button>
            </form>
        </div>
    </div>

    {{-- Results --}}
    @if(request('code_suivi'))
        @if($precommande)
            @php
                $statutConfig = [
                    'en_attente' => ['class' => 'badge-warning', 'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z', 'label' => 'En attente'],
                    'validee'    => ['class' => 'badge-success', 'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z', 'label' => 'Validée'],
                    'rejetee'    => ['class' => 'badge-danger', 'icon' => 'M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z', 'label' => 'Rejetée'],
                    'annulee'    => ['class' => 'badge-gray', 'icon' => 'M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636', 'label' => 'Annulée'],
                ];
                $statut = $statutConfig[$precommande->statut] ?? ['class' => 'badge-gray', 'icon' => 'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'label' => ucfirst($precommande->statut)];
            @endphp

            <div class="card animate-fade-in-up">
                <div class="card-header flex items-center justify-between">
                    <span class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                        Détails de votre dossier
                    </span>
                    <span class="{{ $statut['class'] }}">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $statut['icon'] }}"/></svg>
                        {{ $statut['label'] }}
                    </span>
                </div>
                <div class="card-body">
                    <dl class="grid grid-cols-1 md:grid-cols-2 gap-5 text-sm">
                        <div>
                            <dt class="text-xs font-semibold uppercase tracking-wide text-gray-400 mb-0.5">Nom</dt>
                            <dd class="text-gray-900 font-semibold">{{ $precommande->nom }} {{ $precommande->prenom }}</dd>
                        </div>
                        <div>
                            <dt class="text-xs font-semibold uppercase tracking-wide text-gray-400 mb-0.5">Code de suivi</dt>
                            <dd class="text-gray-900 font-mono font-semibold">{{ $precommande->code_suivi }}</dd>
                        </div>
                        <div>
                            <dt class="text-xs font-semibold uppercase tracking-wide text-gray-400 mb-0.5">Centre</dt>
                            <dd class="text-gray-900 font-medium">{{ $precommande->centre->nom ?? '—' }}</dd>
                        </div>
                        <div>
                            <dt class="text-xs font-semibold uppercase tracking-wide text-gray-400 mb-0.5">Date RDV</dt>
                            <dd class="text-gray-900 font-medium">{{ $precommande->creneau->date ?? '—' }}</dd>
                        </div>
                        <div>
                            <dt class="text-xs font-semibold uppercase tracking-wide text-gray-400 mb-0.5">Heure</dt>
                            <dd class="text-gray-900 font-medium">{{ $precommande->creneau->heure_debut ?? '—' }}</dd>
                        </div>
                        <div>
                            <dt class="text-xs font-semibold uppercase tracking-wide text-gray-400 mb-0.5">Statut</dt>
                            <dd>
                                <span class="{{ $statut['class'] }}">{{ $statut['label'] }}</span>
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        @else
            <div class="alert-danger animate-fade-in-up">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <div>
                    <p class="font-semibold">Dossier introuvable</p>
                    <p class="text-sm">Aucun dossier trouvé pour le code <strong>{{ request('code_suivi') }}</strong>. Vérifiez votre code et réessayez.</p>
                </div>
            </div>
        @endif
    @endif

</div>
@endsection