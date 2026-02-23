@extends('layouts.app')
@section('title', 'Pré-demande CNI — CNI Rendez-vous')

@section('content')
<div class="container-narrow py-12">

    <div class="text-center mb-10">
        <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-400 flex items-center justify-center mx-auto mb-4 shadow-lg shadow-emerald-200">
            <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
            </svg>
        </div>
        <h1 class="text-2xl font-extrabold text-gray-900 mb-2">Pré-demande CNI</h1>
        <p class="text-gray-500">Remplissez ce formulaire pour commencer votre demande de carte nationale.</p>
    </div>

    <div class="card">
        <div class="card-body">

            @if($errors->any())
                <div class="alert-danger mb-6">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <div>@foreach($errors->all() as $error)<p>{{ $error }}</p>@endforeach</div>
                </div>
            @endif

            <form action="{{ route('precommande.recap') }}" method="POST">
                @csrf

                {{-- Type --}}
                <div class="form-group">
                    <label class="form-label" for="type_demande">Type de demande <span class="text-red-500">*</span></label>
                    <select id="type_demande" name="type_demande" class="form-select" required>
                        <option value="">— Sélectionnez un type —</option>
                        <option value="premiere" {{ old('type_demande') === 'premiere' ? 'selected' : '' }}>Première demande</option>
                        <option value="renouvellement" {{ old('type_demande') === 'renouvellement' ? 'selected' : '' }}>Renouvellement</option>
                        <option value="duplicata" {{ old('type_demande') === 'duplicata' ? 'selected' : '' }}>Duplicata</option>
                    </select>
                </div>

                <div class="border-t border-gray-100 my-6"></div>

                {{-- Personal Info --}}
                <h3 class="font-semibold text-gray-800 mb-4 flex items-center gap-2">
                    <svg class="w-4 h-4 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    Informations personnelles
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-5">
                    <div class="form-group">
                        <label class="form-label" for="nom">Nom <span class="text-red-500">*</span></label>
                        <input type="text" id="nom" name="nom" class="form-input" value="{{ old('nom') }}" placeholder="Votre nom" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="prenom">Prénom <span class="text-red-500">*</span></label>
                        <input type="text" id="prenom" name="prenom" class="form-input" value="{{ old('prenom') }}" placeholder="Votre prénom" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="date_naissance">Date de naissance <span class="text-red-500">*</span></label>
                        <input type="date" id="date_naissance" name="date_naissance" class="form-input" value="{{ old('date_naissance') }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="lieu_naissance">Lieu de naissance <span class="text-red-500">*</span></label>
                        <input type="text" id="lieu_naissance" name="lieu_naissance" class="form-input" value="{{ old('lieu_naissance') }}" placeholder="Ville" required>
                    </div>
                </div>

                <div class="border-t border-gray-100 my-6"></div>

                {{-- Address --}}
                <h3 class="font-semibold text-gray-800 mb-4 flex items-center gap-2">
                    <svg class="w-4 h-4 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    Adresse
                </h3>
                <div class="form-group">
                    <label class="form-label" for="adresse">Adresse complète <span class="text-red-500">*</span></label>
                    <input type="text" id="adresse" name="adresse" class="form-input" value="{{ old('adresse') }}" placeholder="Numéro, rue, quartier" required>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-5">
                    <div class="form-group">
                        <label class="form-label" for="ville">Ville <span class="text-red-500">*</span></label>
                        <input type="text" id="ville" name="ville" class="form-input" value="{{ old('ville') }}" placeholder="Votre ville" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="code_postal">Code postal <span class="text-red-500">*</span></label>
                        <input type="text" id="code_postal" name="code_postal" class="form-input" value="{{ old('code_postal') }}" placeholder="10000" required>
                    </div>
                </div>

                <div class="border-t border-gray-100 my-6"></div>

                {{-- Contact --}}
                <h3 class="font-semibold text-gray-800 mb-4 flex items-center gap-2">
                    <svg class="w-4 h-4 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    Coordonnées
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-5">
                    <div class="form-group">
                        <label class="form-label" for="telephone">Téléphone <span class="text-red-500">*</span></label>
                        <div class="input-icon-wrapper">
                            <svg class="input-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <input type="tel" id="telephone" name="telephone" class="form-input pl-11" value="{{ old('telephone') }}" placeholder="0600000000" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email">Email <span class="text-red-500">*</span></label>
                        <div class="input-icon-wrapper">
                            <svg class="input-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <input type="email" id="email" name="email" class="form-input pl-11" value="{{ old('email') }}" placeholder="exemple@mail.com" required>
                        </div>
                    </div>
                </div>

                <div class="border-t border-gray-100 my-6"></div>

                {{-- Centre --}}
                <div class="form-group">
                    <label class="form-label" for="centre">Centre de réception préféré <span class="text-red-500">*</span></label>
                    <select id="centre" name="centre" class="form-select" required>
                        <option value="">— Sélectionnez un centre —</option>
                        <option value="centre1" {{ old('centre') === 'centre1' ? 'selected' : '' }}>Centre 1 — Ville principale</option>
                        <option value="centre2" {{ old('centre') === 'centre2' ? 'selected' : '' }}>Centre 2 — Quartier nord</option>
                        <option value="centre3" {{ old('centre') === 'centre3' ? 'selected' : '' }}>Centre 3 — Quartier sud</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary btn-full btn-lg mt-2">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                    Continuer
                </button>
            </form>
        </div>
    </div>
</div>
@endsection