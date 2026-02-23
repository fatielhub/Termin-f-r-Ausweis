@extends('layouts.app')
@section('title', 'Informations personnelles — CNI Rendez-vous')

@section('content')
<div class="container-narrow py-12">

    {{-- Step Header --}}
    @include('precommande._step_header', ['currentStep' => 1, 'totalSteps' => 4, 'title' => 'Informations personnelles'])

    <div class="card">
        <div class="card-body">

            @if($errors->any())
                <div class="alert-danger mb-6">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <div>@foreach($errors->all() as $error)<p>{{ $error }}</p>@endforeach</div>
                </div>
            @endif

            <form method="POST" action="{{ route('precommande.step1') }}">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-5">
                    <div class="form-group">
                        <label class="form-label" for="nom">Nom <span class="text-red-500">*</span></label>
                        <input type="text" id="nom" name="nom" class="form-input @error('nom') ring-2 ring-red-400 border-red-300 @enderror"
                               value="{{ old('nom') }}" placeholder="Ex: BENALI" required>
                        @error('nom')<p class="form-error">{{ $message }}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="prenom">Prénom <span class="text-red-500">*</span></label>
                        <input type="text" id="prenom" name="prenom" class="form-input @error('prenom') ring-2 ring-red-400 border-red-300 @enderror"
                               value="{{ old('prenom') }}" placeholder="Ex: Ahmed" required>
                        @error('prenom')<p class="form-error">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-5">
                    <div class="form-group">
                        <label class="form-label" for="date_naissance">Date de naissance <span class="text-red-500">*</span></label>
                        <input type="date" id="date_naissance" name="date_naissance" class="form-input @error('date_naissance') ring-2 ring-red-400 border-red-300 @enderror"
                               value="{{ old('date_naissance') }}" required>
                        @error('date_naissance')<p class="form-error">{{ $message }}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="lieu_naissance">Lieu de naissance <span class="text-red-500">*</span></label>
                        <input type="text" id="lieu_naissance" name="lieu_naissance" class="form-input @error('lieu_naissance') ring-2 ring-red-400 border-red-300 @enderror"
                               value="{{ old('lieu_naissance') }}" placeholder="Ex: Casablanca" required>
                        @error('lieu_naissance')<p class="form-error">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="ville">Ville de résidence <span class="text-red-500">*</span></label>
                    <input type="text" id="ville" name="ville" class="form-input @error('ville') ring-2 ring-red-400 border-red-300 @enderror"
                           value="{{ old('ville') }}" placeholder="Ex: Rabat" required>
                    @error('ville')<p class="form-error">{{ $message }}</p>@enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-5">
                    <div class="form-group">
                        <label class="form-label" for="email">Adresse Email <span class="text-red-500">*</span></label>
                        <div class="input-icon-wrapper">
                            <svg class="input-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <input type="email" id="email" name="email" class="form-input pl-11 @error('email') ring-2 ring-red-400 border-red-300 @enderror"
                                   value="{{ old('email') }}" placeholder="exemple@mail.com" required>
                        </div>
                        @error('email')<p class="form-error">{{ $message }}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="telephone">Téléphone <span class="text-red-500">*</span></label>
                        <div class="input-icon-wrapper">
                            <svg class="input-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <input type="tel" id="telephone" name="telephone" class="form-input pl-11 @error('telephone') ring-2 ring-red-400 border-red-300 @enderror"
                                   value="{{ old('telephone') }}" placeholder="0600000000" required>
                        </div>
                        @error('telephone')<p class="form-error">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="adresse">Adresse complète <span class="text-red-500">*</span></label>
                    <textarea id="adresse" name="adresse" rows="3" class="form-textarea @error('adresse') ring-2 ring-red-400 border-red-300 @enderror"
                              placeholder="Numéro, rue, quartier..." required>{{ old('adresse') }}</textarea>
                    @error('adresse')<p class="form-error">{{ $message }}</p>@enderror
                </div>

                <div class="flex items-center justify-between pt-2 border-t border-gray-100 mt-2">
                    <a href="{{ url()->previous() }}" class="btn btn-ghost">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"/></svg>
                        Précédent
                    </a>
                    <button type="submit" class="btn btn-primary">
                        Suivant
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection