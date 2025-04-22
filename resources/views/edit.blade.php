@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier le rendez-vous</h1>

    <form action="{{ route('rendezvous.update', $rendezvous->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nom</label>
            <input type="text" name="nom" class="form-control" value="{{ $rendezvous->nom }}" required>
        </div>
        <div class="form-group">
            <label>Prénom</label>
            <input type="text" name="prenom" class="form-control" value="{{ $rendezvous->prenom }}" required>
        </div>
        <div class="form-group">
            <label>Téléphone</label>
            <input type="text" name="telephone" class="form-control" value="{{ $rendezvous->telephone }}" required>
        </div>
        <div class="form-group">
            <label>Date du rendez-vous</label>
            <input type="date" name="date" class="form-control" value="{{ $rendezvous->date }}" required>
        </div>
        <div class="form-group">
            <label>Heure</label>
            <input type="time" name="heure" class="form-control" value="{{ $rendezvous->heure }}" required>
        </div>
        <div class="form-group">
            <label>Centre</label>
            <input type="text" name="centre" class="form-control" value="{{ $rendezvous->centre }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Mettre à jour</button>
    </form>
</div>
@endsection
