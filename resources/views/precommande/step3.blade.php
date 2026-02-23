@extends('layouts.app')
@section('title', 'Informations des grands-parents — CNI Rendez-vous')

@section('content')
<div class="container-narrow py-12">

    @include('precommande._step_header', ['currentStep' => 3, 'totalSteps' => 4, 'title' => 'Informations des grands-parents'])

    <div class="card">
        <div class="card-body">

            @if($errors->any())
                <div class="alert-danger mb-6">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <div>@foreach($errors->all() as $error)<p>{{ $error }}</p>@endforeach</div>
                </div>
            @endif

            <form method="POST" action="{{ route('precommande.step3') }}">
                @csrf

                {{-- Paternal grandparents --}}
                <div class="mb-6">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-8 h-8 rounded-lg bg-indigo-100 text-indigo-600 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0"/></svg>
                        </div>
                        <h3 class="font-semibold text-gray-800">Grands-parents paternels</h3>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-5">
                        <div class="form-group">
                            <label class="form-label" for="nom_gp_paternel">Nom du grand-père paternel <span class="text-red-500">*</span></label>
                            <input type="text" id="nom_gp_paternel" name="nom_gp_paternel" value="{{ old('nom_gp_paternel') }}"
                                   class="form-input @error('nom_gp_paternel') ring-2 ring-red-400 border-red-300 @enderror" placeholder="Nom" required>
                            @error('nom_gp_paternel')<p class="form-error">{{ $message }}</p>@enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="prenom_gp_paternel">Prénom du grand-père paternel <span class="text-red-500">*</span></label>
                            <input type="text" id="prenom_gp_paternel" name="prenom_gp_paternel" value="{{ old('prenom_gp_paternel') }}"
                                   class="form-input @error('prenom_gp_paternel') ring-2 ring-red-400 border-red-300 @enderror" placeholder="Prénom" required>
                            @error('prenom_gp_paternel')<p class="form-error">{{ $message }}</p>@enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="nom_gm_paternel">Nom de la grand-mère paternelle <span class="text-red-500">*</span></label>
                            <input type="text" id="nom_gm_paternel" name="nom_gm_paternel" value="{{ old('nom_gm_paternel') }}"
                                   class="form-input @error('nom_gm_paternel') ring-2 ring-red-400 border-red-300 @enderror" placeholder="Nom" required>
                            @error('nom_gm_paternel')<p class="form-error">{{ $message }}</p>@enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="prenom_gm_paternel">Prénom de la grand-mère paternelle <span class="text-red-500">*</span></label>
                            <input type="text" id="prenom_gm_paternel" name="prenom_gm_paternel" value="{{ old('prenom_gm_paternel') }}"
                                   class="form-input @error('prenom_gm_paternel') ring-2 ring-red-400 border-red-300 @enderror" placeholder="Prénom" required>
                            @error('prenom_gm_paternel')<p class="form-error">{{ $message }}</p>@enderror
                        </div>
                    </div>
                </div>

                {{-- Maternal grandparents --}}
                <div class="mb-6">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-8 h-8 rounded-lg bg-rose-100 text-rose-600 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0"/></svg>
                        </div>
                        <h3 class="font-semibold text-gray-800">Grands-parents maternels</h3>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-5">
                        <div class="form-group">
                            <label class="form-label" for="nom_gp_maternel">Nom du grand-père maternel <span class="text-red-500">*</span></label>
                            <input type="text" id="nom_gp_maternel" name="nom_gp_maternel" value="{{ old('nom_gp_maternel') }}"
                                   class="form-input @error('nom_gp_maternel') ring-2 ring-red-400 border-red-300 @enderror" placeholder="Nom" required>
                            @error('nom_gp_maternel')<p class="form-error">{{ $message }}</p>@enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="prenom_gp_maternel">Prénom du grand-père maternel <span class="text-red-500">*</span></label>
                            <input type="text" id="prenom_gp_maternel" name="prenom_gp_maternel" value="{{ old('prenom_gp_maternel') }}"
                                   class="form-input @error('prenom_gp_maternel') ring-2 ring-red-400 border-red-300 @enderror" placeholder="Prénom" required>
                            @error('prenom_gp_maternel')<p class="form-error">{{ $message }}</p>@enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="nom_gm_maternel">Nom de la grand-mère maternelle <span class="text-red-500">*</span></label>
                            <input type="text" id="nom_gm_maternel" name="nom_gm_maternel" value="{{ old('nom_gm_maternel') }}"
                                   class="form-input @error('nom_gm_maternel') ring-2 ring-red-400 border-red-300 @enderror" placeholder="Nom" required>
                            @error('nom_gm_maternel')<p class="form-error">{{ $message }}</p>@enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="prenom_gm_maternel">Prénom de la grand-mère maternelle <span class="text-red-500">*</span></label>
                            <input type="text" id="prenom_gm_maternel" name="prenom_gm_maternel" value="{{ old('prenom_gm_maternel') }}"
                                   class="form-input @error('prenom_gm_maternel') ring-2 ring-red-400 border-red-300 @enderror" placeholder="Prénom" required>
                            @error('prenom_gm_maternel')<p class="form-error">{{ $message }}</p>@enderror
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between pt-2 border-t border-gray-100">
                    <a href="{{ route('precommande.step2') }}" class="btn btn-ghost">
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