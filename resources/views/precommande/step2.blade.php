@extends('layouts.app')
@section('title', 'Informations des parents — CNI Rendez-vous')

@section('content')
<div class="container-narrow py-12">

    @include('precommande._step_header', ['currentStep' => 2, 'totalSteps' => 4, 'title' => 'Informations des parents'])

    <div class="card">
        <div class="card-body">

            @if($errors->any())
                <div class="alert-danger mb-6">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <div>@foreach($errors->all() as $error)<p>{{ $error }}</p>@endforeach</div>
                </div>
            @endif

            <form method="POST" action="{{ route('precommande.step2') }}">
                @csrf

                {{-- Father --}}
                <div class="mb-6">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-8 h-8 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        </div>
                        <h3 class="font-semibold text-gray-800">Informations du père</h3>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-5">
                        <div class="form-group">
                            <label class="form-label" for="nom_pere">Nom du père <span class="text-red-500">*</span></label>
                            <input type="text" id="nom_pere" name="nom_pere" class="form-input @error('nom_pere') ring-2 ring-red-400 border-red-300 @enderror"
                                   value="{{ old('nom_pere') }}" placeholder="Nom" required>
                            @error('nom_pere')<p class="form-error">{{ $message }}</p>@enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="prenom_pere">Prénom du père <span class="text-red-500">*</span></label>
                            <input type="text" id="prenom_pere" name="prenom_pere" class="form-input @error('prenom_pere') ring-2 ring-red-400 border-red-300 @enderror"
                                   value="{{ old('prenom_pere') }}" placeholder="Prénom" required>
                            @error('prenom_pere')<p class="form-error">{{ $message }}</p>@enderror
                        </div>
                    </div>
                </div>

                {{-- Mother --}}
                <div class="mb-6">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-8 h-8 rounded-lg bg-pink-100 text-pink-600 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        </div>
                        <h3 class="font-semibold text-gray-800">Informations de la mère</h3>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-5">
                        <div class="form-group">
                            <label class="form-label" for="nom_mere">Nom de la mère <span class="text-red-500">*</span></label>
                            <input type="text" id="nom_mere" name="nom_mere" class="form-input @error('nom_mere') ring-2 ring-red-400 border-red-300 @enderror"
                                   value="{{ old('nom_mere') }}" placeholder="Nom" required>
                            @error('nom_mere')<p class="form-error">{{ $message }}</p>@enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="prenom_mere">Prénom de la mère <span class="text-red-500">*</span></label>
                            <input type="text" id="prenom_mere" name="prenom_mere" class="form-input @error('prenom_mere') ring-2 ring-red-400 border-red-300 @enderror"
                                   value="{{ old('prenom_mere') }}" placeholder="Prénom" required>
                            @error('prenom_mere')<p class="form-error">{{ $message }}</p>@enderror
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between pt-2 border-t border-gray-100">
                    <a href="{{ route('precommande.step1') }}" class="btn btn-ghost">
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