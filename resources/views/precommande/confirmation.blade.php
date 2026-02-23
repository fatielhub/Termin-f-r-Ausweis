@extends('layouts.app')
@section('title', 'Demande confirmée — CNI Rendez-vous')

@section('content')
<div class="container-narrow py-16">
    <div class="card text-center">
        <div class="card-body py-12">

            {{-- Success animation --}}
            <div class="w-24 h-24 bg-gradient-to-br from-emerald-500 to-teal-400 rounded-full flex items-center justify-center mx-auto mb-6 shadow-xl shadow-emerald-200">
                <svg class="w-12 h-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>

            <h1 class="text-2xl font-extrabold text-gray-900 mb-2">Demande envoyée avec succès !</h1>
            <p class="text-gray-500 mb-8">Votre demande de rendez-vous CNIE a bien été enregistrée.</p>

            {{-- Tracking code --}}
            <div class="bg-gradient-to-br from-emerald-50 to-teal-50 border border-emerald-200 rounded-2xl p-6 mb-8 mx-auto max-w-xs">
                <p class="text-sm text-gray-600 mb-2 font-medium">Votre code de suivi</p>
                <div class="text-3xl font-extrabold text-emerald-700 tracking-widest font-mono">
                    {{ $code_suivi }}
                </div>
                <p class="text-xs text-gray-500 mt-3">
                    <svg class="w-3.5 h-3.5 inline mr-1 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                    Conservez ce code précieusement
                </p>
            </div>

            {{-- Info box --}}
            <div class="alert-info mb-8 text-left">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <div class="text-sm">
                    <p class="font-semibold mb-1">Que faire maintenant ?</p>
                    <ul class="list-disc list-inside space-y-1 text-gray-600">
                        <li>Présentez-vous au centre à l'heure convenue</li>
                        <li>Apportez les pièces justificatives requises</li>
                        <li>Utilisez votre code pour suivre votre dossier</li>
                    </ul>
                </div>
            </div>

            {{-- Actions --}}
            <div class="flex flex-col sm:flex-row gap-3 justify-center">
                <a href="{{ route('precommande.suivi') }}" class="btn btn-primary btn-lg">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    Suivre ma demande
                </a>
                <a href="{{ route('home') }}" class="btn btn-ghost btn-lg">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    Retour à l'accueil
                </a>
            </div>
        </div>
    </div>
</div>
@endsection