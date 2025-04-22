@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Prendre un rendez-vous</h1>

    <form action="{{ route('rendezvous.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nom</label>
            <input type="text" name="nom" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Prénom</label>
            <input type="text" name="prenom" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Téléphone</label>
            <input type="text" name="telephone" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Date du rendez-vous</label>
            <input type="date" name="date" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Heure</label>
            <input type="time" name="heure" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Centre</label>
            <input type="text" name="centre" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success mt-3">Enregistrer</button>
    </form>
</div>
@endsection
