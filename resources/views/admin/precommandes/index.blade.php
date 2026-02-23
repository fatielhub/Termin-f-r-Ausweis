@extends('layouts.app')
@section('title', 'Gestion des précommandes — Administration CNI')

@section('content')

{{-- Admin top bar --}}
<div class="bg-gradient-to-r from-emerald-800 to-emerald-700 text-white">
    <div class="container-main py-6 flex items-center justify-between">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.dashboard') }}" class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center hover:bg-white/30 transition-colors">
                <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"/></svg>
            </a>
            <div>
                <h1 class="text-xl font-extrabold">Précommandes</h1>
                <p class="text-emerald-200 text-sm">Gestion des demandes de rendez-vous</p>
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

<div class="container-main py-10">

    {{-- Flash --}}
    @if(session('success'))
        <div class="alert-success mb-6 animate-fade-in-up">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <div class="card">
        <div class="card-header flex items-center justify-between">
            <span class="flex items-center gap-2">
                <svg class="w-5 h-5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
                Toutes les précommandes
            </span>
            <span class="badge-success">{{ $precommandes->total() }} demande(s)</span>
        </div>

        <div class="table-wrapper rounded-none border-0 shadow-none">
            <table class="table">
                <thead>
                    <tr>
                        <th>Code de suivi</th>
                        <th>Nom complet</th>
                        <th>Centre</th>
                        <th>Date RDV</th>
                        <th>Statut</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($precommandes as $p)
                        @php
                            $badgeClass = match($p->statut) {
                                'validee'    => 'badge-success',
                                'rejetee'    => 'badge-danger',
                                'annulee'    => 'badge-gray',
                                default      => 'badge-warning',
                            };
                            $badgeLabel = match($p->statut) {
                                'validee'    => 'Validée',
                                'rejetee'    => 'Rejetée',
                                'annulee'    => 'Annulée',
                                default      => 'En attente',
                            };
                        @endphp
                        <tr>
                            <td class="font-mono text-xs text-gray-600">{{ $p->code_suivi }}</td>
                            <td class="font-semibold text-gray-900">{{ $p->nom }} {{ $p->prenom }}</td>
                            <td class="text-gray-600">{{ optional($p->centre)->nom ?? '—' }}</td>
                            <td class="text-gray-600">{{ optional($p->creneau)->date ?? '—' }}</td>
                            <td><span class="{{ $badgeClass }}">{{ $badgeLabel }}</span></td>
                            <td class="text-center">
                                <a href="{{ route('admin.precommandes.show', $p->id) }}" class="btn btn-sm btn-outline">Détails</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-gray-400 py-12">
                                <svg class="w-12 h-12 mx-auto mb-3 text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                                Aucune précommande enregistrée.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($precommandes->hasPages())
            <div class="px-6 py-4 border-t border-gray-100">
                {{ $precommandes->links() }}
            </div>
        @endif
    </div>
</div>
@endsection