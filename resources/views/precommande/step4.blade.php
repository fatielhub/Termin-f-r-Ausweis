@extends('layouts.app')
@section('title', 'Sélection du rendez-vous — CNI Rendez-vous')

@section('content')
<div class="container-narrow py-12">

    @include('precommande._step_header', ['currentStep' => 4, 'totalSteps' => 4, 'title' => 'Sélection du rendez-vous'])

    <div class="card">
        <div class="card-body">

            @if($errors->any())
                <div class="alert-danger mb-6">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <div>@foreach($errors->all() as $error)<p>{{ $error }}</p>@endforeach</div>
                </div>
            @endif

            <div class="alert-info mb-6">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <span>Choisissez un centre, une date et un créneau disponible pour votre rendez-vous.</span>
            </div>

            <form method="POST" action="{{ route('precommande.step4') }}">
                @csrf

                {{-- Centre --}}
                <div class="form-group">
                    <label class="form-label" for="centre_id">
                        <span class="inline-flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            Centre de traitement <span class="text-red-500">*</span>
                        </span>
                    </label>
                    <select id="centre_id" name="centre_id" class="form-select @error('centre_id') ring-2 ring-red-400 border-red-300 @enderror" required>
                        <option value="">— Sélectionnez un centre —</option>
                        @foreach(App\Models\Centre::all() as $centre)
                            <option value="{{ $centre->id }}" {{ old('centre_id') == $centre->id ? 'selected' : '' }}>
                                {{ $centre->nom }} — {{ $centre->ville }}
                            </option>
                        @endforeach
                    </select>
                    @error('centre_id')<p class="form-error">{{ $message }}</p>@enderror
                </div>

                {{-- Date --}}
                <div class="form-group">
                    <label class="form-label" for="date_rendezvous">
                        <span class="inline-flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 4h10M5 11h14M5 19h14M5 15h14"/></svg>
                            Date du rendez-vous <span class="text-red-500">*</span>
                        </span>
                    </label>
                    <input type="date" id="date_rendezvous" name="date_rendezvous"
                           class="form-input @error('date_rendezvous') ring-2 ring-red-400 border-red-300 @enderror"
                           min="{{ date('Y-m-d') }}" value="{{ old('date_rendezvous') }}" required>
                    @error('date_rendezvous')<p class="form-error">{{ $message }}</p>@enderror
                </div>

                {{-- Créneau --}}
                <div class="form-group">
                    <label class="form-label" for="creneau_id">
                        <span class="inline-flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Créneau horaire <span class="text-red-500">*</span>
                        </span>
                    </label>
                    <select id="creneau_id" name="creneau_id" class="form-select @error('creneau_id') ring-2 ring-red-400 border-red-300 @enderror" required>
                        <option value="">— Sélectionnez un créneau —</option>
                        @foreach(App\Models\Creneau::all() as $creneau)
                            <option value="{{ $creneau->id }}" {{ old('creneau_id') == $creneau->id ? 'selected' : '' }}>
                                {{ \Carbon\Carbon::parse($creneau->heure_debut)->format('H:i') }}
                                — {{ \Carbon\Carbon::parse($creneau->heure_fin)->format('H:i') }}
                            </option>
                        @endforeach
                    </select>
                    @error('creneau_id')<p class="form-error">{{ $message }}</p>@enderror
                </div>

                <div class="flex items-center justify-between pt-2 border-t border-gray-100 mt-2">
                    <a href="{{ route('precommande.step3') }}" class="btn btn-ghost">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"/></svg>
                        Précédent
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                        Voir le récapitulatif
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
