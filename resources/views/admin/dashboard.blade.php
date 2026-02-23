@extends('layouts.app')
@section('title', 'Tableau de bord — Administration CNI')

@section('content')

{{-- Admin top bar --}}
<div class="bg-gradient-to-r from-emerald-800 to-emerald-700 text-white">
    <div class="container-main py-6 flex items-center justify-between">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-white/20 flex items-center justify-center">
                <svg class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
            </div>
            <div>
                <h1 class="text-xl font-extrabold">Tableau de bord</h1>
                <p class="text-emerald-200 text-sm">Espace d'administration CNI Rendez-vous</p>
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

    {{-- Stats cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-10">
        @php
            $stats = [
                ['label' => 'Total demandes', 'value' => \App\Models\Precommande::count(), 'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2', 'color' => 'bg-blue-500', 'bg' => 'bg-blue-50 text-blue-600'],
                ['label' => 'En attente', 'value' => \App\Models\Precommande::where('statut', 'en_attente')->count(), 'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z', 'color' => 'bg-amber-500', 'bg' => 'bg-amber-50 text-amber-600'],
                ['label' => 'Validées', 'value' => \App\Models\Precommande::where('statut', 'validee')->count(), 'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z', 'color' => 'bg-emerald-500', 'bg' => 'bg-emerald-50 text-emerald-600'],
                ['label' => 'Rejetées', 'value' => \App\Models\Precommande::where('statut', 'rejetee')->count(), 'icon' => 'M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z', 'color' => 'bg-red-500', 'bg' => 'bg-red-50 text-red-600'],
            ];
        @endphp

        @foreach($stats as $stat)
            <div class="card-hover p-5 flex items-center gap-4">
                <div class="w-14 h-14 rounded-2xl {{ $stat['bg'] }} flex items-center justify-center flex-shrink-0">
                    <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $stat['icon'] }}"/></svg>
                </div>
                <div>
                    <div class="text-2xl font-extrabold text-gray-900">{{ $stat['value'] }}</div>
                    <div class="text-sm text-gray-500">{{ $stat['label'] }}</div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Quick actions --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-10">
        <a href="{{ route('admin.precommandes.index') }}" class="card-hover p-6 flex items-start gap-4 group">
            <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center flex-shrink-0 group-hover:bg-emerald-600 group-hover:text-white transition-all duration-300">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
            </div>
            <div>
                <h3 class="font-bold text-gray-900 group-hover:text-emerald-700 transition-colors">Gérer les précommandes</h3>
                <p class="text-sm text-gray-500 mt-1">Voir, valider ou rejeter les demandes.</p>
            </div>
        </a>

        <div class="card-hover p-6 flex items-start gap-4 opacity-60 cursor-not-allowed">
            <div class="w-12 h-12 rounded-xl bg-gray-100 text-gray-400 flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            </div>
            <div>
                <h3 class="font-bold text-gray-700">Centres</h3>
                <p class="text-sm text-gray-400 mt-1">Gestion des centres (à venir).</p>
            </div>
        </div>

        <div class="card-hover p-6 flex items-start gap-4 opacity-60 cursor-not-allowed">
            <div class="w-12 h-12 rounded-xl bg-gray-100 text-gray-400 flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div>
                <h3 class="font-bold text-gray-700">Créneaux</h3>
                <p class="text-sm text-gray-400 mt-1">Gestion des créneaux (à venir).</p>
            </div>
        </div>
    </div>

    {{-- Recent requests --}}
    <div class="card">
        <div class="card-header flex items-center justify-between">
            <span class="flex items-center gap-2">
                <svg class="w-5 h-5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                Demandes récentes
            </span>
            <a href="{{ route('admin.precommandes.index') }}" class="text-xs text-emerald-600 hover:underline font-semibold">Voir tout →</a>
        </div>
        <div class="table-wrapper rounded-none border-0 shadow-none">
            <table class="table">
                <thead>
                    <tr>
                        <th>Code suivi</th>
                        <th>Nom</th>
                        <th>Statut</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse(\App\Models\Precommande::latest()->limit(5)->get() as $p)
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
                            <td class="font-mono text-xs">{{ $p->code_suivi }}</td>
                            <td class="font-medium">{{ $p->nom }} {{ $p->prenom }}</td>
                            <td><span class="{{ $badgeClass }}">{{ $badgeLabel }}</span></td>
                            <td>
                                <a href="{{ route('admin.precommandes.show', $p->id) }}" class="btn btn-sm btn-outline">Voir</a>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="text-center text-gray-400 py-8">Aucune demande enregistrée.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection