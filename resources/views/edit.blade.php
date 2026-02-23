@extends('layouts.app')
@section('title', 'Modifier le rendez-vous — CNI Rendez-vous')

@section('content')
<div class="container-narrow py-12">

    <div class="text-center mb-8">
        <h1 class="text-2xl font-extrabold text-gray-900 mb-2">Modifier le rendez-vous</h1>
        <p class="text-gray-500">Mettez à jour les informations de votre rendez-vous.</p>
    </div>

    <div class="card">
        <div class="card-body">

            @if($errors->any())
                <div class="alert-danger mb-6">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <div>@foreach($errors->all() as $error)<p>{{ $error }}</p>@endforeach</div>
                </div>
            @endif

            <form action="{{ route('rendezvous.update', $rendezvous->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-5">
                    <div class="form-group">
                        <label class="form-label" for="nom">Nom <span class="text-red-500">*</span></label>
                        <input type="text" id="nom" name="nom" class="form-input" value="{{ $rendezvous->nom }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="prenom">Prénom <span class="text-red-500">*</span></label>
                        <input type="text" id="prenom" name="prenom" class="form-input" value="{{ $rendezvous->prenom }}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="telephone">Téléphone <span class="text-red-500">*</span></label>
                    <div class="input-icon-wrapper">
                        <svg class="input-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        <input type="tel" id="telephone" name="telephone" class="form-input pl-11" value="{{ $rendezvous->telephone }}" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-5">
                    <div class="form-group">
                        <label class="form-label" for="date">Date du rendez-vous <span class="text-red-500">*</span></label>
                        <input type="date" id="date" name="date" class="form-input" value="{{ $rendezvous->date }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="heure">Heure <span class="text-red-500">*</span></label>
                        <input type="time" id="heure" name="heure" class="form-input" value="{{ $rendezvous->heure }}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="centre">Centre <span class="text-red-500">*</span></label>
                    <div class="input-icon-wrapper">
                        <svg class="input-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <input type="text" id="centre" name="centre" class="form-input pl-11" value="{{ $rendezvous->centre }}" required>
                    </div>
                </div>

                <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                    <a href="{{ url()->previous() }}" class="btn btn-ghost">Annuler</a>
                    <button type="submit" class="btn btn-primary">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        Mettre à jour
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
