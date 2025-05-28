@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center">
    <div class="card shadow-lg p-4" style="max-width: 600px; width: 100%;">
        <div class="mb-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="h4 mb-0">Première demande de CNIE</h2>
                <span class="badge bg-success">Étape 4 sur 4</span>
            </div>
            <div class="progress" style="height: 6px;">
                <div class="progress-bar bg-success" style="width: 100%"></div>
            </div>
        </div>
        <form method="POST" action="{{ route('precommande.step4') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Centre</label>
                <select name="centre_id" class="form-select rounded-pill" required>
                    <option value="">Sélectionnez un centre</option>
                    @foreach(App\Models\Centre::all() as $centre)
                        <option value="{{ $centre->id }}">{{ $centre->nom }} - {{ $centre->ville }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Date du rendez-vous</label>
                <input type="date" name="date_rendezvous" class="form-control rounded-pill" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Créneau disponible</label>
                <select name="creneau_id" class="form-select rounded-pill" required>
                    <option value="">Sélectionnez un créneau</option>
                    @foreach(App\Models\Creneau::all() as $creneau)
                        <option value="{{ $creneau->id }}">
                            {{ \Carbon\Carbon::parse($creneau->date)->format('d/m/Y') }} de {{ \Carbon\Carbon::parse($creneau->heure_debut)->format('H:i') }} à {{ \Carbon\Carbon::parse($creneau->heure_fin)->format('H:i') }} ({{ $creneau->places_disponibles }} places)
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{ route('precommande.step3') }}" class="btn btn-outline-secondary rounded-pill">Précédent</a>
                <button type="submit" class="btn btn-success rounded-pill px-4">Terminer</button>
            </div>
        </form>
    </div>
</div>
@endsection