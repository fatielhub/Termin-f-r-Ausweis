@extends('layouts.app')
@section('title', 'Suivi de demande — CNI Rendez-vous')

@section('content')
<div class="container-narrow py-12">

    <div class="text-center mb-10">
        <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-400 flex items-center justify-center mx-auto mb-4 shadow-lg shadow-emerald-200">
            <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
        </div>
        <h1 class="text-2xl font-extrabold text-gray-900 mb-2">Suivi de votre demande</h1>
        <p class="text-gray-500">Entrez votre numéro de demande pour suivre son avancement.</p>
    </div>

    {{-- Search Form --}}
    <div class="card mb-6">
        <div class="card-body">
            <form action="{{ route('suivi.demande') }}" method="GET">
                <div class="form-group">
                    <label class="form-label" for="numero_demande">Numéro de demande</label>
                    <div class="input-icon-wrapper">
                        <svg class="input-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/></svg>
                        <input type="text" id="numero_demande" name="numero_demande"
                               class="form-input pl-11"
                               placeholder="Ex: CNI-2024-XXXXX"
                               value="{{ request('numero_demande') }}"
                               required>
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
    @if(isset($demande))
        <div class="card animate-fade-in-up">
            <div class="card-header flex items-center gap-2">
                <svg class="w-5 h-5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                Détails de votre demande
            </div>
            <div class="card-body">
                <dl class="grid grid-cols-1 md:grid-cols-2 gap-5 text-sm">
                    <div>
                        <dt class="text-xs font-semibold uppercase tracking-wide text-gray-400 mb-0.5">Numéro de demande</dt>
                        <dd class="text-gray-900 font-mono font-semibold">{{ $demande->numero }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-semibold uppercase tracking-wide text-gray-400 mb-0.5">Statut</dt>
                        <dd>
                            @php
                                $cls = match($demande->statut) {
                                    'en_cours'  => 'badge-warning',
                                    'termine'   => 'badge-success',
                                    default     => 'badge-gray',
                                };
                            @endphp
                            <span class="{{ $cls }}">{{ ucfirst($demande->statut) }}</span>
                        </dd>
                    </div>
                    <div>
                        <dt class="text-xs font-semibold uppercase tracking-wide text-gray-400 mb-0.5">Date de la demande</dt>
                        <dd class="text-gray-800">{{ $demande->date_demande->format('d/m/Y') }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-semibold uppercase tracking-wide text-gray-400 mb-0.5">Type de demande</dt>
                        <dd class="text-gray-800">{{ $demande->type }}</dd>
                    </div>
                    <div class="md:col-span-2">
                        <dt class="text-xs font-semibold uppercase tracking-wide text-gray-400 mb-0.5">Centre de réception</dt>
                        <dd class="text-gray-800">{{ $demande->centre }}</dd>
                    </div>
                </dl>
            </div>
        </div>
    @endif

    @if(isset($error))
        <div class="alert-danger animate-fade-in-up">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <div>
                <p class="font-semibold">Dossier introuvable</p>
                <p class="text-sm">{{ $error }}</p>
            </div>
        </div>
    @endif

</div>
@endsection
